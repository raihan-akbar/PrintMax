<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cms extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('auth') != true) {
			$this->session->set_flashdata(
				"flash",
				"<script>
				window.onload=function(){
				swal({title: 'Security Check', text: 'Silahkan Login Untuk Melanjutkan', icon: 'warning', button: 'Close',})};
				</script>"
			);

			redirect(base_url('/signin/'));
		}
		$this->load->model('Mod');
		date_default_timezone_set("Asia/Jakarta");
	}


	public function index()
	{
		$data['getMenu'] = $this->Mod->getMenu()->result();

		$data_session = array('menu_active' => '1');
		$this->session->set_userdata($data_session);

		$this->load->view('cms/index', $data);
	}

	public function order()
	{
		$data['getMenu'] = $this->Mod->getMenu()->result();
		$data['getBook'] = $this->db->where(['book_status !=' => 'Pending'])->where(['book_status !=' => 'Pending'])->order_by('book_id', 'DESC')->get('book')->result();
		// $data['getBookDetails'] = $this->Mod->getBookDetails()->result();
		$data['dataRaw'] = $this->Mod->getBookWithDetails();
        // $this->output->enable_profiler(TRUE);


		$data_session = array('menu_active' => '2');
		$this->session->set_userdata($data_session);

		$this->load->view('cms/order', $data);
	}

	public function product($product_token = null)
	{
		if ($product_token != null) {
			$where = "product_token = '$product_token'";

			$data['getMenu'] = $this->Mod->getMenu()->result();
			$productTokenCheck = $this->Mod->get('product', $where)->num_rows();
			if ($productTokenCheck != 1) {
				redirect(base_url('cms/product/'));
			}

			$data['getProduct'] = $this->Mod->get('product', $where)->result();

			// $data['getVariant1'] = $this->Mod->get('product_variant_1', $where)->result();
			// $data['getVariant2'] = $this->Mod->get('product_variant_2', $where)->result();
			// getVariant1($product_token)
			$data['getVariant1'] = $this->Mod->getVariant1($product_token)->result();
			$data['getVariant2'] = $this->Mod->getVariant2($product_token)->result();

			$data['getImage'] = $this->Mod->get('product_image', $where)->result();

			$this->load->view('cms/product[details]', $data);
		} else {
			$data['getMenu'] = $this->Mod->getMenu()->result();
			$where = "product_state = '1' ORDER BY product_id DESC";
			$data['getProduct'] = $this->Mod->get('product', $where)->result();


			$data_session = array('menu_active' => '3');
			$this->session->set_userdata($data_session);
			// $this->output->enable_profiler(TRUE);

			$this->load->view('cms/product', $data);
		}
	}

	public function user()
	{
		$data['getMenu'] = $this->Mod->getMenu()->result();
		$where_user_list = "user.role_id=role.role_id";
		$data['getUserList'] = $this->Mod->get('user,role', $where_user_list)->result();

		$data_session = array('menu_active' => '4');
		$this->session->set_userdata($data_session);

		$this->load->view('cms/user', $data);
	}

	public function make_order()
	{
		$data['getMenu'] = $this->Mod->getMenu()->result();
		$where = "product_state != '0' ORDER BY product_id DESC";
		$data['getProduct'] = $this->Mod->get('product', $where)->result();
		$data['getUserCart'] = $this->Mod->getUserCart()->result();


		$data_session = array('menu_active' => '2');
		$this->session->set_userdata($data_session);

		$this->load->view('cms/make_order', $data);
	}

	public function invoice()
	{
		$data['getMenu'] = $this->Mod->getMenu()->result();
		$data['getBook'] = $this->Mod->get('book', array('book_id !=' => '0'))->result();
		// $data['getBookDetails'] = $this->Mod->getBookDetails()->result();
		$data['getBookDetails'] = $this->Mod->getBookWithDetails();


		$data_session = array('menu_active' => '6');
		$this->session->set_userdata($data_session);

		$this->load->view('cms/invoice', $data);
	}

	public function catch_invoice($book_token = null){
		if ($book_token == null) {
			redirect(base_url('cms/invoice/'));
		}
		else {
			$data_session = array(
				'invoice_token' => $book_token
			);

			$this->session->set_userdata($data_session);
			redirect(base_url('cms/generate_invoice/'));
		}
	}

	public function catch_summary()
	{
		$start_date =  $this->input->post('start_date');
		$end_date =  $this->input->post('end_date');

		if ($start_date == null || $end_date == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
				window.onload=function(){
				swal({title: 'Error', text: 'Tanggal tidak boleh kosong', icon: 'error', button: 'Close',})};
				</script>"
			);
			redirect(base_url('cms/invoice/'));
		}
		
		if ($start_date && $end_date) {
			$start_datetime = $start_date . ' 00:00:00';
			$end_datetime   = $end_date . ' 23:59:59';
		} else {
			$start_datetime = date('Y-m-d 00:00:00', strtotime('-30 days'));
			$end_datetime   = date('Y-m-d 23:59:59');
		}

		$data_session = array(
			'sum_start_date' => $start_date,
			'sum_end_date' => $end_date,
			'sum_start_datetime' => $start_datetime,
			'sum_end_datetime' => $end_datetime
		);

		$this->session->set_userdata($data_session);
		redirect(base_url('cms/generate_summary/'));


		$data['title'] = "PrintMax - Summary Report";
		$this->load->library('pdfgenerator');
		$paper = 'A4';
		$orientation = "potrait";
		$html = $this->load->view('cms/parts/invoice_frame', $data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function generate_invoice()
	{
		$invoice_token = $this->session->userdata('invoice_token');
		if ($invoice_token == null) {
			redirect(base_url('cms/invoice/'));
		}
		
		$this->load->library('pdfgenerator');
		$data['title'] = "PrintMax - ".$invoice_token;
		$file_pdf = $data['title'];
		$paper = 'A4';
		$orientation = "potrait";
		
		$html = $this->load->view('cms/parts/invoice_frame', $data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function generate_summary()
	{
		$start_date = $this->session->userdata('sum_start_date');
		$end_date = $this->session->userdata('sum_end_date');

		if ($start_date == null) {
			redirect(base_url('cms/invoice/'));
		}
		else if ($end_date == null) {
			redirect(base_url('cms/invoice/'));
		}

		$data['title'] = "PrintMax - Summary Report";
		$this->load->library('pdfgenerator');
		$file_pdf = $data['title'];
		$paper = 'A4';
		$orientation = "potrait";

		$html = $this->load->view('cms/parts/summary_frame', $data, true);
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

	public function frame_summary()
	{
		$data['title'] = "PrintMax - Summary Report";
		$this->load->library('pdfgenerator');
		$file_pdf = $data['title'];
		$paper = 'A4';
		$orientation = "potrait";

		// $html = $this->load->view('cms/parts/summary_frame', $data, true);
		// $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
		$this->load->view('cms/parts/summary_frame');
	}
}

/* End of file Cms.php */