<?php
require_once "../include/PDOConnector.php";

class Model_user extends PDOConnector
{
	public function __construct()
	{
		$this->connect();
	}

	public function getUserLike($username)
	{
		$stmt = $this->dbh->prepare('SELECT username FROM tbl_wall WHERE username LIKE ?;');
		$stmt->bindValue(1, $username . '%', PDO::PARAM_STR);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $rows;
	}

	public function isExistingUser($username)
	{
		$stmt = $this->dbh->prepare('SELECT username FROM tbl_wall WHERE username = ?');
		$stmt->bindValue(1, $username, PDO::PARAM_STR);
		$stmt->execute();

		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(count($rows) > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}