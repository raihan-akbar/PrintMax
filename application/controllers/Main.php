<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mod');
		$this->load->library('user_agent');
		date_default_timezone_set("Asia/Jakarta");
	}

	public function xxx()
	{
		$this->load->view('ops/xxx');
	}

	public function index()
	{
		
		if ($this->session->userdata('agent_token') != null) {
			$agent_token = $this->session->userdata('agent_token');
			// Get App of User
			if ($this->agent->is_browser()) {
				$app = $this->agent->browser() . ' ' . $this->agent->version();
			} elseif ($this->agent->is_robot()) {
				$app = $this->agent->robot();
			} elseif ($this->agent->is_mobile()) {
				$app = $this->agent->mobile();
			} else {
				$app = 'Unidentified User Agent';
			}

			// Get Ip of User
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip = $_SERVER['REMOTE_ADDR'];
			}

			// Get Platform of User
			$platform = $this->agent->platform();

			$agent_check = $this->Mod->get('agent', array('agent_token' => $agent_token))->num_rows();
			if ($agent_check != 1) {
				$platform = $this->agent->platform();
				$data = array(
					"agent_register" => date('Y-m-d'),
					"agent_token" => $agent_token,
					"agent_platform" => $platform,
					"agent_app" => $app,
					"agent_ip" => $ip
				);
				$this->Mod->add($data, 'agent');
			}
		}

		if ($this->session->userdata('agent_token') != null) {
			$cart_check = $this->Mod->get('agent_cart', array('agent_token' => $agent_token))->num_rows();
			if ($cart_check != 0) {
				$data_session = array('cart_ping' => true);
				$this->session->set_userdata($data_session);
			} else {
				$data_session = array('cart_ping' => false);
				$this->session->set_userdata($data_session);
			}
		}

		$data['getProduct'] = $this->Mod->get('product', array('product_state !=' => '0'))->result();
		$data['getAgentCart'] = $this->Mod->getAgentCart()->result();

		$this->load->view('public/home', $data);
	}

	public function contact()
	{
		
		if ($this->session->userdata('agent_token') != null) {
			$agent_token = $this->session->userdata('agent_token');
			// Get App of User
			if ($this->agent->is_browser()) {
				$app = $this->agent->browser() . ' ' . $this->agent->version();
			} elseif ($this->agent->is_robot()) {
				$app = $this->agent->robot();
			} elseif ($this->agent->is_mobile()) {
				$app = $this->agent->mobile();
			} else {
				$app = 'Unidentified User Agent';
			}

			// Get Ip of User
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip = $_SERVER['REMOTE_ADDR'];
			}

			// Get Platform of User
			$platform = $this->agent->platform();

			$agent_check = $this->Mod->get('agent', array('agent_token' => $agent_token))->num_rows();
			if ($agent_check != 1) {
				$platform = $this->agent->platform();
				$data = array(
					"agent_register" => date('Y-m-d'),
					"agent_token" => $agent_token,
					"agent_platform" => $platform,
					"agent_app" => $app,
					"agent_ip" => $ip
				);
				$this->Mod->add($data, 'agent');
			}
		}

		if ($this->session->userdata('agent_token') != null) {
			$cart_check = $this->Mod->get('agent_cart', array('agent_token' => $agent_token))->num_rows();
			if ($cart_check != 0) {
				$data_session = array('cart_ping' => true);
				$this->session->set_userdata($data_session);
			} else {
				$data_session = array('cart_ping' => false);
				$this->session->set_userdata($data_session);
			}
		}

		$data['getProduct'] = $this->Mod->get('product', array('product_id !=' => '0'))->result();
		$data['getAgentCart'] = $this->Mod->getAgentCart()->result();

		$this->load->view('public/contact', $data);
	}

	public function guide()
	{
		
		if ($this->session->userdata('agent_token') != null) {
			$agent_token = $this->session->userdata('agent_token');
			// Get App of User
			if ($this->agent->is_browser()) {
				$app = $this->agent->browser() . ' ' . $this->agent->version();
			} elseif ($this->agent->is_robot()) {
				$app = $this->agent->robot();
			} elseif ($this->agent->is_mobile()) {
				$app = $this->agent->mobile();
			} else {
				$app = 'Unidentified User Agent';
			}

			// Get Ip of User
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip = $_SERVER['REMOTE_ADDR'];
			}

			// Get Platform of User
			$platform = $this->agent->platform();

			$agent_check = $this->Mod->get('agent', array('agent_token' => $agent_token))->num_rows();
			if ($agent_check != 1) {
				$platform = $this->agent->platform();
				$data = array(
					"agent_register" => date('Y-m-d'),
					"agent_token" => $agent_token,
					"agent_platform" => $platform,
					"agent_app" => $app,
					"agent_ip" => $ip
				);
				$this->Mod->add($data, 'agent');
			}
		}

		if ($this->session->userdata('agent_token') != null) {
			$cart_check = $this->Mod->get('agent_cart', array('agent_token' => $agent_token))->num_rows();
			if ($cart_check != 0) {
				$data_session = array('cart_ping' => true);
				$this->session->set_userdata($data_session);
			} else {
				$data_session = array('cart_ping' => false);
				$this->session->set_userdata($data_session);
			}
		}

		$data['getProduct'] = $this->Mod->get('product', array('product_id !=' => '0'))->result();
		$data['getAgentCart'] = $this->Mod->getAgentCart()->result();

		$this->load->view('public/guide', $data);
	}


	public function home()
	{
		redirect(base_url('/'));
	}
	

	public function add_agent_token($agent_token = null)
	{
		if ($agent_token == null) {
			redirect(base_url('/'));
		} else {
			$data_session = array(
				'agent_token' => $agent_token
			);

			$this->session->set_userdata($data_session);
			redirect(base_url('/'));
		}
	}

	public function sess_agent_token($agent_token = null)
	{
		if ($agent_token == null) {
			redirect(base_url('/'));
		} else {
			$data_session = array(
				'agent_token' => $agent_token
			);

			$this->session->set_userdata($data_session);
			redirect(base_url('/'));
		}
	}

	public function signin()
	{
		if ($this->session->userdata('auth') == true) {
			redirect(base_url('cms/'));
		} else {
			$this->load->view('public/signin');
		}
	}

	public function signout()
	{
		$this->session->sess_destroy();
		redirect(base_url('signin'));
	}

	public function missing()
	{
		if ($this->session->userdata('auth') == true) {
			redirect(base_url('cms/'));
		} else {
			$this->load->view('public/0xmissing');
		}
	}
}

/* End of file Main.php */