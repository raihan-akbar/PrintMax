<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cust extends CI_Controller {
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

            redirect(base_url('cust/item/'.$product_token));
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
}
