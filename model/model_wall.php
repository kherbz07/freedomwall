<?php
require_once "../include/PDOConnector.php";

class Model_wall extends PDOConnector
{
	public function __construct()
	{
		$this->connect();
	}

	public function addWall($user_id, $message)
	{
		$stmt = $this->dbh->prepare('INSERT INTO tbl_wall(user_id, message) VALUES (?, ?);');
		$stmt->bindValue(1, $user_id, PDO::PARAM_INT);
		$stmt->bindValue(2, $message, PDO::PARAM_STR);
		$stmt->execute();

		return $this->dbh->lastInsertId();
	}
}