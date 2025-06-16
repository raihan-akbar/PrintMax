<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sys extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mod');
		$this->load->library('form_validation');
		date_default_timezone_set("Asia/Jakarta");
	}

	public function auth()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$where = "user.role_id=role.role_id AND user_email='$email' AND user_status='Active'";
		$user_check = $this->Mod->get('user,role', $where)->num_rows();

		if ($user_check == true) {
			$get_user = $this->Mod->get('user,role', $where)->result();
			foreach ($get_user as $i) {
				$full_password = "$2y$08$" . $i->user_password;
				if (password_verify($password, $full_password)) {
					if ($i->user_status != "Active") {
						$this->session->set_flashdata(
							"flash",
							"<script>
						window.onload=function(){
						swal({title: 'Gagal!', text: 'Status User Tidak Aktif, Silahkan Hubungi Admin.', icon: 'warning', button: 'Close',})};
						</script>"
						);

						redirect(base_url('/signin/'));
					} else {

						$data_session = array(
							'auth' => true,
							'user_token' => $i->user_token,
							'role_id' => $i->role_id,
							'user_name' => $i->user_name,
							'role_name' => $i->role_name,
							'user_email' => $i->user_email
						);

						$this->session->set_userdata($data_session);

						redirect(base_url('cms/'));
					}
				} else {
					$this->session->set_flashdata('flash', 'Password Salah!');
					redirect(base_url('signin/'));
				}
			}
		} else {
			$this->session->set_flashdata('flash', 'Akun Tidak Terdaftar');
			redirect(base_url('signin/'));
		}
	}

	public function unauth()
	{
		$this->session->sess_destroy();
		redirect(base_url('signin/'));
	}

	public function add_product()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required|numeric');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata(
				"flash",
				"<script>
			window.onload=function(){
			swal({title: 'Failed!', text: 'Try Again, Insert all required data.', icon: 'warning', button: 'Close',})};
			</script>"
			);

			redirect(base_url('cms/product'));
		} else {

			$product_name = $this->input->post('name');
			$product_price = $this->input->post('price');
			$product_desc = $this->input->post('description');
			$product_token = strtolower(bin2hex(random_bytes(8)));

			$data = array(
				'product_name' => $product_name,
				'product_price' => $product_price,
				'product_desc' => $product_desc,
				'product_token' => $product_token
			);

			if (empty($_FILES['thumbnails']['name'])) {
				$thumbnails = $this->add_product_thumbnails($product_token);
				$data['product_thumbnails'] = "default.jpg";
			} else if (!empty($_FILES['thumbnails']['name'])) {
				$thumbnails = $this->add_product_thumbnails($product_token);
				$data['product_thumbnails'] = $thumbnails;
			}

			$this->Mod->add($data, 'product');
			$this->add_product_null_variant($product_token);
			$this->session->set_flashdata(
				"flash",
				"<script>
			window.onload=function(){
			swal('Product Saved','$product_name'+' data is successful saved','success')};
			</script>"
			);

			redirect(base_url('cms/product/'));
		}
	}

	private function add_product_thumbnails($product_token)
	{
		$config['upload_path'] = './src/item/_thumbnails';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		// $config['max_size']  = '100';
		// $config['max_width']  = '1024';
		// $config['max_height']  = '768';
		$config['file_name'] = strtolower(bin2hex($product_token));

		$config['encrypt_name'] = false;


		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('thumbnails')) {
			// error = array('error' => this->upload->display_errors());
			return "default.jpg";
		} else {
			return $this->upload->data('file_name');
		}
	}

	private function add_product_null_variant($product_token)
	{
		//Variant 1 && Variant 2 Should not be Empty! 
		//So this func is for Automatically Add Variant 1 && Variant 2 Dummy in DB

		$variant1 = array(
			'product_token' => $product_token,
			'product_variant_1_name' => "Default",
			'product_variant_1_price_mark' => "0"
		);

		$variant2 = array(
			'product_token' => $product_token,
			'product_variant_2_name' => "Default",
			'product_variant_2_price_mark' => "0"
		);

		$this->Mod->add($variant1, 'product_variant_1');
		$this->Mod->add($variant2, 'product_variant_2');
	}

	public function add_product_image($product_token = null)
	{
		if ($product_token == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
						swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
						</script>"
			);

			redirect(base_url('cms/product/'));
		}

		$token_check = $this->Mod->get('product', array('product_token' => $product_token))->num_rows();

		if ($token_check != 1) {
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
						swal({title: 'Failed!', text: 'Product is Not Found / Missing / Broken.', icon: 'error', button: 'Close',})};
						</script>"
			);

			redirect(base_url('cms/product/'));
		}

		$image = $this->input->post('image');

		if (empty($_FILES['image']['name'])) {
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
						swal({title: 'Failed', text: 'Process Failed, Please Try Again your Action.', icon: 'warning', button: 'Close',})};
						</script>"
			);

			redirect(base_url('cms/product/' . $product_token));
		} else if (!empty($_FILES['image']['name'])) {
			$data['product_image'] = $image;
			$config['upload_path'] = './src/item';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			// $config['max_size']  = '100';
			// $config['max_width']  = '1024';
			// $config['max_height']  = '768';
			$image_name_generate = strtolower($product_token . '' . bin2hex(random_bytes(4)));
			$image_token_generate = strtolower(bin2hex(random_bytes(8)));
			$config['file_name'] = $image_name_generate;
			$config['encrypt_name'] = false;


			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image')) {
				$this->session->set_flashdata(
					"flash",
					"<script>
							window.onload=function(){
							swal({title: 'Failed', text: 'Process Failed, Please Try Again your Action.', icon: 'warning', button: 'Close',})};
							</script>"
				);

				redirect(base_url('cms/product/' . $product_token));
			} else {
				$product_image_name = $this->upload->data('file_name');
				$data = array(
					'product_token' => $product_token,
					'product_image_name' => $product_image_name,
					'product_image_token' => $image_token_generate
				);

				$this->session->set_flashdata(
					"flash",
					"<script>
							window.onload=function(){
							swal({title: 'Upload Success', text: 'Image is Successfully Uploaded', icon: 'success', button: 'Close',})};
							</script>"
				);

				$this->Mod->add($data, 'product_image');
				redirect(base_url('cms/product/' . $product_token));

				return $this->upload->data('file_name');
			}
		}
	}

	public function remove_product_image($key = null)
	{
		if ($key == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
						swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
						</script>"
			);

			redirect(base_url('cms/product/'));
		} else {
			if (!preg_match('/-/', $key)) {
				$this->session->set_flashdata(
					"flash",
					"<script>
					window.onload=function(){
						swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
						</script>"
				);

				redirect(base_url('cms/product/'));
			} else {
				$piece = explode('-', $key);
				$piece_0 = array($piece[0]); //Product Token Piece
				$product_token = implode('', $piece_0);
				$piece_1 = array($piece[1]); //Image Token Piece
				$image_token = implode('', $piece_1);

				$product_check = $this->Mod->get('product', array('product_token' => $product_token))->num_rows();
				$image_check = $this->Mod->get('product_image', array('product_image_token' => $image_token))->num_rows();

				if ($product_check == true && $image_check == true) {
					$image_data = $this->Mod->get('product_image, product', array('product_image_token' => $image_token))->result();
					foreach ($image_data as $i) {
						unlink('./src/item/' . $i->product_image_name);
						$this->Mod->del(array('product_image_token' => $image_token), 'product_image');

						$this->session->set_flashdata(
							"flash",
							"<script>
							window.onload=function(){
								swal({title: 'Success', text: 'Image is Deleted from $i->product_name.', icon: 'success', button: 'Close',})};
								</script>"
						);

						redirect(base_url('cms/product/' . $product_token));
					}
				} else {
					$this->session->set_flashdata(
						"flash",
						"<script>
						window.onload=function(){
							swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
					);

					redirect(base_url('cms/product/'));
				}
			}
		}
	}

	public function remove_product_thumbnails($product_token = null)
	{
		if ($product_token == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
						swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
						</script>"
			);

			redirect(base_url('cms/product/' . $product_token));
		} else {
			$product_check = $this->Mod->get('product', array('product_token' => $product_token))->num_rows();

			if ($product_check != true) {
				$this->session->set_flashdata(
					"flash",
					"<script>
							window.onload=function(){
							swal({title: 'Error', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
				);

				redirect(base_url('cms/product/' . $product_token));
			} else {
				$product_data = $this->Mod->get('product', array('product_token' => $product_token))->result();
				foreach ($product_data as $i) {
					if ($i->product_thumbnails == 'default.jpg') {
						$this->session->set_flashdata(
							"flash",
							"<script>
									window.onload=function(){
									swal({title: 'Sorry', text: '$i->product_name Thumbnails is Already Default.', icon: 'info', button: 'Close',})};
									</script>"
						);

						redirect(base_url('cms/product/' . $product_token));
					} else {
						unlink('./src/item/_thumbnails/' . $i->product_thumbnails);
						$this->Mod->upd(array('product_token' => $product_token), array('product_thumbnails' => 'default.jpg'), 'product');
						$this->session->set_flashdata(
							"flash",
							"<script>
									window.onload=function(){
									swal({title: 'Success', text: '$i->product_name Thumbnails is Default Now.', icon: 'success', button: 'Close',})};
									</script>"
						);

						redirect(base_url('cms/product/' . $product_token));
					}
				}
			}
		}
	}

	public function change_product_thumbnails($product_token = null)
	{
		if ($product_token == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
						swal({title: 'Error', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
						</script>"
			);

			redirect(base_url('cms/product/'));
		} else {
			$product_check = $this->Mod->get('product', array('product_token' => $product_token))->num_rows();

			if ($product_check != true) {
				$this->session->set_flashdata(
					"flash",
					"<script>
							window.onload=function(){
							swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
				);

				redirect(base_url('cms/product/'));
			} else {
				$config['upload_path'] = './src/item/_thumbnails';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				// $config['max_size']  = '100';
				// $config['max_width']  = '1024';
				// $config['max_height']  = '768';
				$config['file_name'] = strtolower(bin2hex($product_token));

				$config['encrypt_name'] = false;


				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('thumbnails')) {
					// error = array('error' => this->upload->display_errors());
					return "default.jpg";
				} else {
					$thumbnails_data = $this->Mod->get('product', array('product_token' => $product_token))->result();
					foreach ($thumbnails_data as $i) {
						if ($i->product_thumbnails != 'default.jpg') {
							unlink('./src/item/_thumbnails/' . $i->product_thumbnails);
						}
					}

					$thumbnails = $this->upload->data('file_name');
					// $data['product_thumbnails'] = $thumbnails;
					$data = array('product_thumbnails' => $thumbnails);
					// where data table
					$this->Mod->upd(array('product_token' => $product_token), $data, 'product');

					$this->session->set_flashdata(
						"flash",
						"<script>
								window.onload=function(){
								swal({title: 'Success', text: '$i->product_name Thumbnails is Default Now.', icon: 'success', button: 'Close',})};
								</script>"
					);

					redirect(base_url('cms/product/' . $product_token));
				}
			}
		}
	}

	public function update_product()
	{
		$product_token = $this->input->post('token');
		$product_name = $this->input->post('name');
		$product_price = $this->input->post('price');
		$product_desc = $this->input->post('description');

		$data = array(
			'product_name' => $product_name,
			'product_price' => $product_price,
			'product_desc' => $product_desc,
		);


		$this->Mod->upd(array('product_token' => $product_token), $data, 'product');

		$this->session->set_flashdata(
			"flash",
			"<script>
			window.onload=function(){
			swal('Success','$product_name'+' data is successful updated','success')};
			</script>"
		);

		redirect(base_url('cms/product/' . $product_token));
	}


	// User Set Section
	public function add_user()
	{
		$user_name = $this->input->post('name');
		$user_email = $this->input->post('email');
		$user_phone = $this->input->post('phone');
		$raw = $this->input->post('password');
		$role_id = $this->input->post('role');
		$user_status = "Active";
		$user_token = strtoupper(bin2hex(random_bytes(2))) . date('Ymd') . strtoupper(bin2hex(random_bytes(2)));
		$option = ['cost' => 8];
		$hash = password_hash($raw, PASSWORD_BCRYPT, $option);
		$piece = explode('$', $hash);
		$piece_1 = array($piece[3]);
		$encrypt = implode('', $piece_1);
		$password = $encrypt;

		$data = array(
			'user_name' => $user_name,
			'user_email' => $user_email,
			'user_phone' => $user_phone,
			'role_id' => $role_id,
			'user_password' => $password,
			'user_status' => $user_status,
			'password_reset' => "0000-00-00",
			'user_token' => $user_token
		);

		$this->Mod->add($data, 'user');
		$this->session->set_flashdata(
			"flash",
			"<script>
			window.onload=function(){
			swal('Success','$user_name'+' data is successful saved','success')};
			</script>"
		);

		redirect(base_url('cms/user/'));
	}

	public function update_user()
	{
		$user_token = $this->input->post('token');
		$user_name = $this->input->post('name');
		$user_email = $this->input->post('email');
		$user_phone = $this->input->post('phone');
		$role_id = $this->input->post('role');

		$data = array(
			'user_name' => $user_name,
			'user_email' => $user_email,
			'user_phone' => $user_phone,
			'role_id' => $role_id
		);


		$this->Mod->upd(array('user_token' => $user_token), $data, 'user');

		$this->session->set_flashdata(
			"flash",
			"<script>
			window.onload=function(){
			swal('Success','$user_name'+' data is successful updated','success')};
			</script>"
		);

		redirect(base_url('cms/user/'));
	}

	public function update_user_password()
	{
		$user_token = $this->input->post('token');
		$user_name = $this->input->post('name');
		$raw = $this->input->post('password');

		$option = ['cost' => 8];
		$hash = password_hash($raw, PASSWORD_BCRYPT, $option);
		$piece = explode('$', $hash);
		$piece_1 = array($piece[3]);
		$encrypt = implode('', $piece_1);
		$password = $encrypt;

		$data = array('user_password' => $password,);

		$this->Mod->upd(array('user_token' => $user_token), $data, 'user');

		$this->session->set_flashdata(
			"flash",
			"<script>
			window.onload=function(){
			swal('Success','$user_name'+' Password is successful updated','success')};
			</script>"
		);

		redirect(base_url('cms/user/'));
	}

	public function add_variant_1()
	{
		$variant_name = $this->input->post('variant_name');
		$variant_price = $this->input->post('variant_price');
		$product_token = $this->input->post('token');
		$product_name = $this->input->post('product_name');

		$data = array(
			'product_token' => $product_token,
			'product_variant_1_name' => $variant_name,
			'product_variant_1_price_mark' => $variant_price,
			'visible' => '1'
		);

		$this->Mod->add($data, 'product_variant_1');
		$this->session->set_flashdata(
			"flash",
			"<script>
			window.onload=function(){
			swal('Success','$product_name'+' variant 1 data is successful saved','success')};
			</script>"
		);

		redirect(base_url('cms/product/' . $product_token));
	}

	public function update_variant_1($variant_id = null)
	{
		$variant_name = $this->input->post('variant_name');
		$variant_price = $this->input->post('variant_price');
		$product_token = $this->input->post('token');

		$product_token = $this->input->post('token');
		if ($variant_id == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
				window.onload=function(){
				swal('Error',''Please Try Again, Your Action Had an Issue','success')};
				</script>"
			);

			redirect(base_url('cms/product/' . $product_token));
		} else if ($product_token == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
				window.onload=function(){
				swal('Error',''Please Try Again, Your Action Had an Issue','success')};
				</script>"
			);

			redirect(base_url('cms/product/'));
		} else {
			$data = array(
				'product_variant_1_name' => $variant_name,
				'product_variant_1_price_mark' => $variant_price
			);

			$this->Mod->upd(array('product_variant_1_id' => $variant_id), $data, 'product_variant_1');

			$this->session->set_flashdata(
				"flash",
				"<script>
			window.onload=function(){
			swal('Success','$variant_name'+' is successful updated','success')};
			</script>"
			);

			redirect(base_url('cms/product/' . $product_token));
		}
	}

	public function remove_variant_1($key = null)
	{
		if ($key == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
						swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
						</script>"
			);

			redirect(base_url('cms/product/'));
		} else {
			if (!preg_match('/-/', $key)) {
				$this->session->set_flashdata(
					"flash",
					"<script>
					window.onload=function(){
						swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
						</script>"
				);

				redirect(base_url('cms/product/'));
			} else {
				$piece = explode('-', $key);
				$piece_0 = array($piece[0]); //Product Token Piece
				$product_token = implode('', $piece_0);
				$piece_1 = array($piece[1]); //Image Token Piece
				$variant_id = implode('', $piece_1);

				$product_check = $this->Mod->get('product', array('product_token' => $product_token))->num_rows();
				$variant_check = $this->Mod->get('product_variant_1', array('product_variant_1_id' => $variant_id))->num_rows();

				if ($product_check == true && $variant_check == true) {
					$data = array(
						'visible' => '0',
					);


					$this->Mod->upd(array('product_variant_1_id' => $variant_id), $data, 'product_variant_1');

					$this->session->set_flashdata(
						"flash",
						"<script>
							window.onload=function(){
								swal({title: 'Success', text: 'Data Removed from Variant 1.', icon: 'success', button: 'Close',})};
								</script>"
					);

					redirect(base_url('cms/product/' . $product_token));
				} else {
					$this->session->set_flashdata(
						"flash",
						"<script>
						window.onload=function(){
							swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
					);

					redirect(base_url('cms/product/'));
				}
			}
		}
	}

	public function add_variant_2()
	{
		$variant_name = $this->input->post('variant_name');
		$variant_price = $this->input->post('variant_price');
		$product_token = $this->input->post('token');
		$product_name = $this->input->post('product_name');

		$data = array(
			'product_token' => $product_token,
			'product_variant_2_name' => $variant_name,
			'product_variant_2_price_mark' => $variant_price,
			'visible' => '1'
		);

		$this->Mod->add($data, 'product_variant_2');
		$this->session->set_flashdata(
			"flash",
			"<script>
			window.onload=function(){
			swal('Success','$product_name'+' variant21 data is successful saved','success')};
			</script>"
		);

		redirect(base_url('cms/product/' . $product_token));
	}

	public function update_variant_2($variant_id = null)
	{
		$variant_name = $this->input->post('variant_name');
		$variant_price = $this->input->post('variant_price');
		$product_token = $this->input->post('token');

		if ($variant_id == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
				window.onload=function(){
				swal('Error',''Please Try Again, Your Action Had an Issue','success')};
				</script>"
			);

			redirect(base_url('cms/product/' . $product_token));
		} else if ($product_token == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
				window.onload=function(){
				swal('Error',''Please Try Again, Your Action Had an Issue','success')};
				</script>"
			);

			redirect(base_url('cms/product/'));
		} else {
			$data = array(
				'product_variant_2_name' => $variant_name,
				'product_variant_2_price_mark' => $variant_price
			);

			$this->Mod->upd(array('product_variant_2_id' => $variant_id), $data, 'product_variant_2');

			$this->session->set_flashdata(
				"flash",
				"<script>
			window.onload=function(){
			swal('Success','$variant_name'+' is successful updated','success')};
			</script>"
			);

			redirect(base_url('cms/product/' . $product_token));
		}
	}

	public function remove_variant_2($key = null)
	{
		if ($key == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
						swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
						</script>"
			);

			redirect(base_url('cms/product/'));
		} else {
			if (!preg_match('/-/', $key)) {
				$this->session->set_flashdata(
					"flash",
					"<script>
					window.onload=function(){
						swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
						</script>"
				);

				redirect(base_url('cms/product/'));
			} else {
				$piece = explode('-', $key);
				$piece_0 = array($piece[0]); //Product Token Piece
				$product_token = implode('', $piece_0);
				$piece_1 = array($piece[1]); //Image Token Piece
				$variant_id = implode('', $piece_1);

				$product_check = $this->Mod->get('product', array('product_token' => $product_token))->num_rows();
				$variant_check = $this->Mod->get('product_variant_2', array('product_variant_2_id' => $variant_id))->num_rows();

				if ($product_check == true && $variant_check == true) {
					$data = array(
						'visible' => '0',
					);


					$this->Mod->upd(array('product_variant_2_id' => $variant_id), $data, 'product_variant_2');

					$this->session->set_flashdata(
						"flash",
						"<script>
							window.onload=function(){
								swal({title: 'Success', text: 'Data Removed from Variant 1.', icon: 'success', button: 'Close',})};
								</script>"
					);

					redirect(base_url('cms/product/' . $product_token));
				} else {
					$this->session->set_flashdata(
						"flash",
						"<script>
						window.onload=function(){
							swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
					);

					redirect(base_url('cms/product/'));
				}
			}
		}
	}

	public function add_make_order_cart($product_token = null)
	{
		$product_name = $this->session->userdata('product_name');
		$user_token = $this->session->userdata('user_token');
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

			redirect(base_url('cms/make_order/'));
		} else {
			$data = array(
				'product_token' => $product_token,
				'user_token' => $user_token,
				'product_variant_1_id' => $variant_1,
				'product_variant_2_id' => $variant_2,
				'user_cart_qty' => $qty
			);

			$this->Mod->add($data, 'user_cart');
			$this->session->set_flashdata(
				"flash",
				"<script>
			window.onload=function(){
			swal('Added to Cart','$product_name'+' Now in your cart','success')};
			</script>"
			);

			redirect(base_url('cms/make_order/'));
		}
	}

	public function remove_user_cart($user_cart_id)
	{
		if ($user_cart_id == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
							swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
			);

			redirect(base_url('cms/make_order/'));
		} else {
			$where = array('user_cart_id' => $user_cart_id);
			$this->Mod->del($where, 'user_cart');
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
							swal({title: 'Success!', text: 'Data Removed from Cart.', icon: 'success', button: 'Close',})};
							</script>"
			);
			redirect(base_url('cms/make_order/'));
		}
	}

	public function add_user_book()
	{
		$user_token = $this->session->userdata('user_token');
		$customer_name = $this->input->post('customer_name');
		$customer_phone = $this->input->post('customer_phone');
		// $cart_product = $this->db->get_where('user_cart', ['user_token' => $user_token])->result();
		$cart_product = $this->Mod->getUserCart()->result();
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

			redirect(base_url('cms/make_order/'));
		}

		$total_price = 0;
		$price_of_product = 0;
		foreach ($cart_product as $item) {
			$price_of_product = $item->product_price + $variant_1_price + $variant_2_price;
			$qty = $item->user_cart_qty;
			$total_price += $price_of_product * $qty;
		}
		$book_token = strtoupper(bin2hex(random_bytes(4))) . date('Ymd') . strtoupper(bin2hex(random_bytes(4)));
		// $key = bin2hex(random_bytes(4 / 2)) . "-" . bin2hex(random_bytes(4 / 2)) . "-" . bin2hex(random_bytes(4 / 2)) . "-" . bin2hex(random_bytes(4 / 2));
		$key = random_int(000, 999) . date('y') . "-" . random_int(0, 9) . date('md');

		$book_key = strtoupper($key);
		$data_book = [
			'book_token' => $book_token,
			'book_paid' => '1',
			'customer_name' => $customer_name,
			'customer_phone' => '62' . $customer_phone,
			'price_total' => $total_price,
			'book_status' => 'Progress',
			'user_token' => $user_token,
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
				'book_product_qty' => $item->user_cart_qty,
				'product_variant_1_price_mark' => $item->product_variant_1_price_mark,
				'product_variant_2_price_mark' => $item->product_variant_2_price_mark,
				'book_product_price' => $item->product_price,
				'book_product_status' => "Pending",
				'book_key' => $key,
			];

			$this->Mod->add($data_product, 'book_product');
		}
		$this->Mod->del(array('user_token' => $user_token), 'user_cart');



		$this->session->set_flashdata(
			"flash",
			"<script>
						window.onload=function(){
							swal('Your Order Booked','Book ID: '+'$book_key','success')};
							</script>"
		);

		redirect(base_url('cms/order/'));
	}

	public function cust_chat($book_token = null)
	{
		if ($book_token == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
							swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
			);

			redirect(base_url('cms/order/'));
		}

		$book = $this->Mod->get('book', array('book_token' => $book_token))->result();

		if (empty($book)) {
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
							swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
			);

			redirect(base_url('cms/order/'));
		}

		foreach ($book as $b) {
			$track_link = base_url('cust/track/') . $b->book_key;
			$customer_name = $b->customer_name;
			$customer_phone = $b->customer_phone;
			$book_key = $b->book_key;
			$total_price = number_format($b->price_total, 0, ',', '.');
			$book_paid = null;
			$link = null;
			if ($b->book_paid == 1) {
				$book_paid = "Paid";
			} else {
				$book_paid = "Unpaid";
			}

			$user_name = $this->session->userdata('user_name');

			$book_status = $b->book_status;

			if ($book_status == "Pending") {
				$link = "https://wa.me/" . $customer_phone . "?text=PrintMax%20Order%0ANama%20%3A%20" . $customer_name . "%0AHarga%20%3A%20" . $total_price . "%0APembayaran%20%3A%20" . $book_paid . "%0AID%20%3A%20" . $book_key . "%0A%0ACek%20Link%20Berikut%20Untuk%20Detail%20Pembelian%3A%0A" . $track_link . "%0A%0A-- " . $user_name . "";
				redirect($link);
			} else if ($book_status == "Progress") {
				$link = "https://wa.me/" . $customer_phone . "?text=PrintMax%20Order%0ANama%20%3A%20" . $customer_name . "%0AHarga%20%3A%20" . $total_price . "%0APembayaran%20%3A%20" . $book_paid . "%0AID%20%3A%20" . $book_key . "%0A%0ACek%20Link%20Berikut%20Untuk%20Detail%20Pembelian%3A%0A" . $track_link . "%0A%0A-- " . $user_name . "";
				redirect($link);
			} else if ($book_status == "Finish") {
				$link = "https://wa.me/" . $customer_phone . "?text=PrintMax%20Order%0AOrder%20ID%20%3A%20" . $book_key . "%0APembayaran%20%3A%20" . $book_paid . "%0A" . $customer_name . "%20Pesanan%20Anda%20Telah%20Selesai%0A%0ACek%20Link%20Berikut%20Untuk%20Detail%20Pembelian%3A%0A" . $track_link . "%0A%0A--%20" . $user_name . "";
				redirect($link);
			}
			else {
				$this->session->set_flashdata(
					"flash",
					"<script>
							window.onload=function(){
								swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
								</script>"
				);

				redirect(base_url('cms/order/'));
			}
		}
	}

	public function accept_order($book_key = null)
	{
		if ($book_key == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
							swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
			);

			redirect(base_url('cms/order/'));
		}

		$data = array(
			'book_status' => "Progress",
			'book_paid' => "1",
		);

		$this->Mod->upd(array('book_key' => $book_key), $data, 'book');

		$data_product = array(
			'book_product_status' => "Pending",
		);

		$data_user = array(
			'user_token' => $this->session->userdata('user_token'),
		);

		$this->Mod->upd(array('book_key' => $book_key), $data_product, 'book_product');
		$this->Mod->upd(array('book_key' => $book_key), $data_user, 'book');
		$this->session->set_flashdata(
			"flash",
			"<script>
					window.onload=function(){
						swal({title: 'Success!', text: 'Data Move to Order and Set to On Progress!', icon: 'success', button: 'Close',})};
						</script>"
		);
		redirect(base_url('cms/order/'));
	}

	public function cancel_order($book_key = null)
	{
		if ($book_key == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
							swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
			);

			redirect(base_url('cms/order/'));
		}

		$data = array(
			'book_status' => "Cancel",
		);

		$this->Mod->upd(array('book_key' => $book_key), $data, 'book');

		$this->session->set_flashdata(
			"flash",
			"<script>
					window.onload=function(){
						swal({title: 'Success!', text: 'Data Cancelled and Status Set to Cancel', icon: 'success', button: 'Close',})};
						</script>"
		);
		redirect(base_url('cms/order/'));
	}

	public function pending_order($book_key = null)
	{
		if ($book_key == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
							swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
			);

			redirect(base_url('cms/order/'));
		}

		$data = array(
			'book_status' => "Pending",
		);

		$this->Mod->upd(array('book_key' => $book_key), $data, 'book');

		$this->session->set_flashdata(
			"flash",
			"<script>
					window.onload=function(){
						swal({title: 'Success!', text: 'Data Move to Pending Status', icon: 'success', button: 'Close',})};
						</script>"
		);
		redirect(base_url('cms/order/'));
	}

	public function finish_order($book_key = null)
	{
		if ($book_key == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
							swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
			);

			redirect(base_url('cms/order/'));
		}

		$data = array(
			'book_status' => "Finish",
		);

		$this->Mod->upd(array('book_key' => $book_key), $data, 'book');

		$this->session->set_flashdata(
			"flash",
			"<script>
					window.onload=function(){
						swal({title: 'Success!', text: 'Order Data Status Now Set to Finish', icon: 'success', button: 'Close',})};
						</script>"
		);
		redirect(base_url('cms/order/'));
	}

	public function remove_product($product_token = null)
	{
		if ($product_token == null) {
			$this->session->set_flashdata(
				"flash",
				"<script>
						window.onload=function(){
						swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
						</script>"
			);

			redirect(base_url('cms/product/'));
		} else {
			$product_check = $this->Mod->get('product', array('product_token' => $product_token))->num_rows();

			if ($product_check != true) {
				$this->session->set_flashdata(
					"flash",
					"<script>
							window.onload=function(){
							swal({title: 'Error!', text: 'Process Failed, Please Try Again your Action.', icon: 'error', button: 'Close',})};
							</script>"
				);

				redirect(base_url('cms/product/'));
			} else {

				$data = array('product_state' => "0",);

				$this->Mod->upd(array('product_token' => $product_token), $data, 'product');

				$this->session->set_flashdata(
					"flash",
					"<script>
							window.onload=function(){
							swal({title: 'Success!', text: 'Product Data Deleted Successfully.', icon: 'success', button: 'Close',})};
							</script>"
				);

				redirect(base_url('cms/product/'));
			}
		}

	}
}/* End of file Sys.php */