<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cust extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod');
        $this->load->library('user_agent');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function item($product_token = null)
    {

		
        $where = array('product_token' => $product_token);
        $item_check = $this->Mod->get('product', $where)->num_rows();

        if ($product_token == null) {
            redirect(base_url('/'));
        } else if ($item_check == 0) {
            redirect(base_url('/'));
        } else {
            $data['product_img'] = $this->Mod->get('product_image', $where)->result();;
            $data['item'] = $this->Mod->get('product', $where)->result();
            $data['getVariant1'] = $this->Mod->getVariant1($product_token)->result();
            $data['getVariant2'] = $this->Mod->getVariant2($product_token)->result();
            $data['getAgentCart'] = $this->Mod->getAgentCart()->result();
            $this->load->view('public/item', $data);
        }
    }

    public function add_cart($product_token = null)
    {
        $product_name = $this->session->userdata('product_name');
        $agent_token = $this->session->userdata('agent_token');
        $variant_1 = $this->input->post('variant_1');
        $variant_2 = $this->input->post('variant_2');
        $qty = $this->input->post('qty');


        if ($product_token == null) {
            $this->session->set_flashdata(
                "flash",
                "<script>
						window.onload=function(){
							swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
            );

            redirect(base_url('/'));
        } else {
            $data = array(
                'product_token' => $product_token,
                'agent_token' => $agent_token,
                'product_variant_1_id' => $variant_1,
                'product_variant_2_id' => $variant_2,
                'agent_cart_qty' => $qty
            );

            $this->Mod->add($data, 'agent_cart');
            $this->session->set_flashdata(
                "flash",
                "<script>
			window.onload=function(){
			swal('Added to Cart','$product_name'+' Now in your cart','success')};
			</script>"
            );

            redirect(base_url('cust/item/' . $product_token));
        }
    }

    public function cart()
    {
        $agent_token = $this->session->userdata('agent_token');
        $data['agentCart'] = $this->Mod->get('agent_cart', array('agent_token' => $agent_token))->result();
        $data['getAgentCart'] = $this->Mod->getAgentCart()->result();

        $this->load->view('public/cart', $data);
    }
    public function remove_agent_cart($agent_cart_id)
    {
        if ($agent_cart_id == null) {
            $this->session->set_flashdata(
                "flash",
                "<script>
						window.onload=function(){
							swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
            );

            redirect(base_url('cms/make_order/'));
        } else {
            $where = array('agent_cart_id' => $agent_cart_id);
            $this->Mod->del($where, 'agent_cart');
            $this->session->set_flashdata(
                "flash",
                "<script>
						window.onload=function(){
							swal({title: 'Success!', text: 'Data Removed from Cart.', icon: 'success', button: 'Close',})};
							</script>"
            );
            redirect(base_url('/'));
        }
    }

    public function make_order()
    {
        $agent_token = $this->session->userdata('agent_token');
        $customer_name = $this->input->post('customer_name');
        $customer_phone = $this->input->post('customer_phone');
        $data['getAgentCart'] = $this->Mod->getAgentCart()->result();
        $cart_product = $this->Mod->getAgentCart()->result();
        $variant_1_price = $this->input->post('variant_1_price_mark');
        $variant_2_price = $this->input->post('variant_2_price_mark');

        if (empty($cart_product)) {
            $this->session->set_flashdata(
                "flash",
                "<script>
						window.onload=function(){
							swal({title: 'Empty Cart!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
            );

            redirect(base_url('/'));
        }

        $total_price = 0;
        $price_of_product = 0;
        foreach ($cart_product as $item) {
            $price_of_product = $item->product_price + $variant_1_price + $variant_2_price;
            $qty = $item->agent_cart_qty;
            $total_price += $price_of_product * $qty;
        }
        $book_token = strtoupper(bin2hex(random_bytes(4))) . date('Ymd') . strtoupper(bin2hex(random_bytes(4)));
        // $key = bin2hex(random_bytes(4 / 2)) . "-" . bin2hex(random_bytes(4 / 2)) . "-" . bin2hex(random_bytes(4 / 2)) . "-" . bin2hex(random_bytes(4 / 2));
        $key = random_int(000, 999) . date('y') . "-" . random_int(0, 9) . date('md');
        $book_key = strtoupper($key);

        $data_book = [
            'book_token' => $book_token,
            'book_paid' => '0',
            'customer_name' => $customer_name,
            'customer_phone' => '62' . $customer_phone,
            'price_total' => $total_price,
            'book_status' => 'Pending',
            'user_token' => "XXXXXXXXXXXXXX",
            'book_date' => date('Y-m-d H:i:s'),
            'book_key' => $book_key,

        ];

        $this->Mod->add($data_book, 'book');

        foreach ($cart_product as $item) {
            $data_product = [
                'book_token' => $book_token,
                'product_token' => $item->product_token,
                'product_variant_1_id' => $item->product_variant_1_id,
                'product_variant_2_id' => $item->product_variant_2_id,
                'book_product_qty' => $item->agent_cart_qty,
                'product_variant_1_price_mark' => $item->product_variant_1_price_mark,
                'product_variant_2_price_mark' => $item->product_variant_2_price_mark,
                'book_product_price' => $item->product_price,
                'book_product_status' => "Pending",
                'book_key' => $book_key,
            ];

            $this->Mod->add($data_product, 'book_product');
        }
        $this->Mod->del(array('agent_token' => $agent_token), 'agent_cart');

        $this->session->set_flashdata(
            "flash",
            "<script>
						window.onload=function(){
							swal('Your Order Booked','Book ID: '+'$book_key','success')};
							</script>"
        );

        redirect(base_url('cust/track/' . $book_key));
    }

    public function track($book_key = null)
    {
        if ($book_key == null) {
            $this->session->set_flashdata(
                "flash",
                "<script>
						window.onload=function(){
							swal({title: 'Empty Order!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
            );
            redirect(base_url('/'));
        }


        $data['book'] = $this->Mod->get('book', array('book_key' => $book_key))->result();
        $data['getAgentBook'] = $this->Mod->getAgentBook($book_key)->result();
        $data['getAgentBookProduct'] = $this->Mod->getAgentBook($book_key)->result();
        $data['getAgentCart'] = $this->Mod->getAgentCart()->result();

        if (empty($data['book'])) {
            $this->session->set_flashdata(
                "flash",
                "<script>
						window.onload=function(){
							swal({title: 'Empty Order!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
            );
            redirect(base_url('/'));
        }

        foreach ($data['book'] as $b) {
            if ($b->book_status == "Cancel") {
                $this->session->set_flashdata(
                    "flash",
                    "<script>
                            window.onload=function(){
                                swal({title: 'Order is Cancelled', text: 'This Order is Cancelled, Please do re-order.', icon: 'error', button: 'Close',})};
                                </script>"
                );
            }
        }

        $this->output->enable_profiler(TRUE);

        $this->load->view('public/track', $data);
    }

    public function find_order(){
        $book_key = $this->input->post('book_key');
        $data['book'] = $this->Mod->get('book', array('book_key' => $book_key))->num_rows();
        if ($data['book'] != 1) {
            $this->session->set_flashdata(
                "flash",
                "<script>
						window.onload=function(){
							swal({title: 'Order Not Found', text: 'Check Again Your ID and Try Again.', icon: 'error', button: 'Close',})};
							</script>"
            );
            redirect(base_url('/'));
        } else {
            redirect(base_url('cust/track/').$book_key);
        }
    }

    public function send_confirm($book_key = null)
    {
        if ($book_key == null) {
            $this->session->set_flashdata(
                "flash",
                "<script>
						window.onload=function(){
							swal({title: 'Empty Cart!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
            );
            redirect(base_url('/'));
        }

        $getBook = $this->db->where(['book_key' => $book_key])->get('book')->result();
        foreach ($getBook as $gb) {
            $customer_name = $gb->customer_name;
            $book_key = $gb->book_key;
            $track_link = base_url('cust/track/') . $book_key;
            $date = date('d, F Y');
            $link = "https://wa.me/" . "6281215616512" . "?text=PrintMax%20Order%20Confirmation%0AOrder%20ID%20%3A%20" . $book_key . "%0AAtas%20Nama%20%3A%20" . $customer_name . "%0ATanggal%20Order%20%3A%20" . $date . "%0A%0AOrder%20Track%20%3A%0A" . $track_link . "";
        }
        redirect($link);
    }

    public function catch_invoice($book_token = null)
    {
        if ($book_token == null) {
            redirect(base_url('/'));
        } else {
            $data_session = array(
                'invoice_token' => $book_token
            );

            $this->session->set_userdata($data_session);
            redirect(base_url('cust/generate_invoice/'));
        }
    }

    public function generate_invoice()
    {
        $invoice_token = $this->session->userdata('invoice_token');
        if ($invoice_token == null) {
            redirect(base_url('/'));
        }

        $this->load->library('pdfgenerator');
        $data['title'] = "PrintMax - " . $invoice_token;
        $file_pdf = $data['title'];
        $paper = 'A4';
        $orientation = "potrait";

        $html = $this->load->view('cms/parts/invoice_frame', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function invoice_frame()
    {
        // $data['getBook'] = $this->Mod->get('book', array('book_id !=' => '0'))->result();
        // $data['getBookDetails'] = $this->Mod->getBookDetails()->result();
        $book_token = $this->session->userdata('invoice_token');
        // $data['getInvoice'] = $this->Mod->getInvoice($book_token)->result();

        $this->load->view('cms/parts/invoice_frame');
    }
}
