<?php
class Product_Model extends Base_Model
{
	protected $table = 'products';

	function find_limit_by_time()
	{
		$query = "select * from {$this->table} where created_at >= current_timestamp - interval 7 day and current_timestamp limit 6";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}
}
