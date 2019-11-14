<?php
class User_Model extends Base_Model
{
	protected $table = 'users';

	// lấy user theo email
	public function get_by_email($email)
	{
		$query = "select * from `{$this->table}` where email = " . ':email' . "";
		$sth = $this->db->prepare($query);
		$sth->execute([
			':email' => $email
		]);
		$data = $sth->fetch(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}

	public function update_by_id($id, $name, $address, $phone_number)
	{

		if (!$id || !$name || !$phone_number || !$address) {
			return;
		}
		$upadated_at = get_update_time();

		$query = "upadate {$this->table} set name = :name, address = :address, phone_number = :phone_number where id = :id";
		try {
			$this->db->beginTransaction();
			$sth = $this->db->prepare($query);
			$sth->execute([
				':id' => $id,
				':name' => $name,
				':address' => $address,
				':phone_number' => $phone_number
			]);
			$this->db->commit();
			return true;
		} catch (PDOException $e) {
			$this->db->rollbakc();
			exit("Error!: " . $e->getMessage());
		}
		return false;
	}
}
