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

	public function getProduct()
	{
		$where = "menu_access LIKE '%$role_id%'";
		return $this->Mod->get('product', $where);

	}

	public function getVariant1($product_token)
	{
		$where = "product_token = '$product_token'";
		$count = $this->Mod->get('product_variant_1', $where)->num_rows();
		if ($count > 1) {
			return $this->db->query("SELECT * FROM `product_variant_1` WHERE `product_token` = '$product_token' AND `product_variant_1_name` != 'Default' ");
		} else {
			return $this->Mod->get('product_variant_1', $where);

		}
	}

	public function getVariant2($product_token)
	{
		$where = "product_token = '$product_token'";
		$count = $this->Mod->get('product_variant_2', $where)->num_rows();
		if ($count > 1) {
			return $this->db->query("SELECT * FROM `product_variant_2` WHERE `product_token` = '$product_token' AND `product_variant_2_name` != 'Default' ");
		} else {
			return $this->Mod->get('product_variant_2', $where);

		}
	}
}

/* End of file Mod.php */
