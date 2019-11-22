<?php
class Product_size_Model extends Base_Model
{
	protected $table = 'product_size';

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
