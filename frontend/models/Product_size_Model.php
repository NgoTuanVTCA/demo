<?php
class Product_Size_Model extends Base_Model
{
	protected $table = 'product_size';

	function update_product_quantity($id)
	{
		$query = "SELECT SUM(quantity_stock) FROM `{$this->table}` WHERE `product_id` = :id;";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':id' => $id
		]);
	}

	function delete_by_product_id($product_id)
	{
		$query = "DELETE FROM `{$this->table}` WHERE `product_id` = :product_id";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':product_id' => $product_id
		]);
	}

	function find_by_product_size_id($id)
	{
		$query = "select * from `{$this->table}` where product_id = :id";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':id' => $id
		]);
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}
}
