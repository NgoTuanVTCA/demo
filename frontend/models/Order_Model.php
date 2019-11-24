<?php
class Order_Model extends Base_Model
{
	protected $table = 'orders';

	public function get_order_by_user($id)
	{
		$query = "select * from `{$this->table}` where user_id = :user_id";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':user_id' => $id
		]);
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}
}
