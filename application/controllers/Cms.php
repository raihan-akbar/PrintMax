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
		$data['getBook'] = $this->Mod->get('book', array('book_id !=' => '0'))->result();

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
			$where = "product_id != '0' ORDER BY product_id DESC";
			$data['getProduct'] = $this->Mod->get('product', $where)->result();


			$data_session = array('menu_active' => '3');
			$this->session->set_userdata($data_session);

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
		$where = "product_id != '0' ORDER BY product_id DESC";
		$data['getProduct'] = $this->Mod->get('product', $where)->result();
		$data['getUserCart'] = $this->Mod->getUserCart()->result();



		$data_session = array('menu_active' => '2');
		$this->session->set_userdata($data_session);

		$this->load->view('cms/make_order', $data);
	}

}

/* End of file Cms.php */
