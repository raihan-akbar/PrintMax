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

	

	public function getInvoice($book_token)
	{
		return $this->db->query(" SELECT * FROM book,book_product,product,product_variant_1,product_variant_2 WHERE book.book_token=book_product.book_token AND book_product.product_token=product.product_token AND book_product.product_variant_1_id=product_variant_1.product_variant_1_id AND book_product.product_variant_2_id=product_variant_2.product_variant_2_id AND book_product.book_token='$book_token' ");
	}

	public function getAgentCart()
	{
		$agent_token = $this->session->userdata('agent_token');

		return $this->db->query(" SELECT * FROM agent_cart,product,product_variant_1,product_variant_2 WHERE agent_cart.product_token = product.product_token AND agent_cart.agent_token = '$agent_token' AND agent_cart.product_variant_1_id = product_variant_1.product_variant_1_id AND agent_cart.product_variant_2_id = product_variant_2.product_variant_2_id");
	}

	public function getAgentBook($book_key)
	{
		$book_key = $this->session->userdata('book_key');

		return $this->db->query("SELECT * FROM book,book_product,product,product_variant_1,product_variant_2 WHERE book.book_token=book_product.book_token AND book_product.product_token=product.product_token AND book_product.product_variant_1_id=product_variant_1.product_variant_1_id AND book_product.product_variant_2_id=product_variant_2.product_variant_2_id AND book.book_key='$book_key' ");
	}

	public function getBookWithDetails()
	{
		$this->db->select('
			book.*, 
			book_product.*, 
			product.product_name,
			product_variant_1.product_variant_1_name,
			product_variant_2.product_variant_2_name
		');
		$this->db->from('book');
		$this->db->join('book_product', 'book.book_token = book_product.book_token', 'left');
		$this->db->join('product', 'book_product.product_token = product.product_token', 'left');
		$this->db->join('product_variant_1', 'book_product.product_variant_1_id = product_variant_1.product_variant_1_id', 'left');
		$this->db->join('product_variant_2', 'book_product.product_variant_2_id = product_variant_2.product_variant_2_id', 'left');

		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file Mod.php */
