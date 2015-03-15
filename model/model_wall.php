<?php
require_once "../include/PDOConnector.php";

class Model_wall extends PDOConnector
{
	public function __construct()
	{
		$this->connect();
	}

	public function addWall($username, $message)
	{
		$stmt = $this->dbh->prepare('INSERT INTO tbl_wall(username, message) VALUES (?, ?);');
		$stmt->bindValue(1, $username, PDO::PARAM_STR);
		$stmt->bindValue(2, $message, PDO::PARAM_STR);
		$stmt->execute();

		return $this->dbh->lastInsertId();
	}

	public function getWall($username = '', $from = 0)
	{
		$query = 'SELECT * FROM tbl_wall';
		if ($username != '')
		{
			$query .= ' WHERE username = ?';
		}
		$query .= ' LIMIT ?, 25;';
		$stmt = $this->dbh->prepare($query);
		if ($username != '')
		{
			$stmt->bindValue(1, $username, PDO::PARAM_STR);
			$stmt->bindValue(2, $from, PDO::PARAM_INT);
		}
		else
		{
			$stmt->bindValue(1, $from, PDO::PARAM_INT);
		}
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $rows;
	}
}