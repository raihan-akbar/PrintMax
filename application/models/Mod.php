<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod extends CI_Model
{

	public function get($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function add($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function del($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function upd($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function getMenu()
	{
		$role_id = $this->session->userdata('role_id');
		$where = "menu_access LIKE '%$role_id%'";
		return $this->Mod->get('menu', $where);

	}

	

	public function getVariant1($product_token)
	{
		$where = "product_token = '$product_token'";
		$count = $this->Mod->get('product_variant_1', $where)->num_rows();
		if ($count > 1) {
			return $this->db->query("SELECT * FROM `product_variant_1` WHERE `product_token` = '$product_token' AND `visible` = '1' ");
		} else {
			return $this->Mod->get('product_variant_1', $where);

		}
	}

	public function getVariant2($product_token)
	{
		$where = "product_token = '$product_token'";
		$count = $this->Mod->get('product_variant_2', $where)->num_rows();
		if ($count > 1) {
			return $this->db->query("SELECT * FROM `product_variant_2` WHERE `product_token` = '$product_token' AND `visible` = '1' ");
		} else {
			return $this->Mod->get('product_variant_2', $where);

		}
	}

	public function getUserCart()
	{
		$user_token = $this->session->userdata('user_token');

		return $this->db->query(" SELECT * FROM user_cart,product,product_variant_1,product_variant_2 WHERE user_cart.product_token = product.product_token AND user_cart.user_token = '$user_token' AND user_cart.product_variant_1_id = product_variant_1.product_variant_1_id AND user_cart.product_variant_2_id = product_variant_2.product_variant_2_id");

	}

	public function getBookDetails(){
		return $this->db->query("SELECT * FROM book,book_product,product,product_variant_1,product_variant_2,user  ");
	}
}

/* End of file Mod.php */
