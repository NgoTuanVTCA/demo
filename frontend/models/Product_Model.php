<?php
class Product_Model extends Base_Model
{
	protected $table = 'products';

	// find new product by time
	function find_by_new_products()
	{
		$query = "select * from {$this->table} order by id desc";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}

	// count by category
	function count_by_category($category_id, $no_of_records_per_page)
	{
		$count_sql = "select count(*) as total from `{$this->table}` where categories_id = :categories_id";
		$sth = $this->db->prepare($count_sql);
		$sth->execute([
			':categories_id' => $category_id
		]);
		$rows = $sth->fetchAll();
		$sth->closeCursor();

		$total_rows = $rows[0]['total'];

		$total_pages = ceil($total_rows / $no_of_records_per_page);
		return $total_pages;
	}

	// pagination by category
	function pagination_by_category($category_id, $offset, $no_of_records_per_page)
	{
		$query = "select * from `{$this->table}` where `categories_id`= :categories_id limit $no_of_records_per_page offset $offset";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':categories_id' => $category_id
		]);
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}

	function pagination($name,$offset, $no_of_records_per_page){
		$query = "select * from `{$this->table}` where 	`name` like '%".$name."%' limit $no_of_records_per_page offset $offset";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}

	// search products
	function search_products($name)
	{
		$query = "select * from `{$this->table}` where `name` like '%$name%' ";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}
}
