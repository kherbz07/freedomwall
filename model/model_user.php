<?php
require_once "../include/PDOConnector.php";

class Model_user extends PDOConnector
{
	public function getUserWhereId($id)
	{
		$stmt = $this->dbh->prepare('SELECT * FROM tbl_user WHERE id=?;');
		$stmt->bindValue(1, $username, PDO::PARAM_STR);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($rows) > 0)
		{
			return $rows[0];
		}
		else
		{
			return false;
		}
	}

	public function addUser($username)
	{
		$stmt = $this->dbh->prepare('INSERT INTO tbl_user(username) VALUES (?);');
		$stmt->bindValue(1, $username, PDO::PARAM_STR);
		$stmt->execute();

		return $this->dbh->lastInsertId();
	}

	public function isExistingUser($username)
	{
		$stmt = $this->dbh->prepare('SELECT * FROM tbl_user WHERE username = ?');
		$stmt->bindValue(1, $username, PDO::PARAM_STR);
		$stmt->execute();

		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(count($rows) > 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
}