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

	public function getWall($from)
	{
		$stmt = $this->dbh->prepare('SELECT * FROM tbl_wall ORDER BY id DESC LIMIT ' . $from . ',10;');
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $rows;
	}

	public function getPost($username)
	{
		$stmt = $this->dbh->prepare('SELECT * FROM tbl_wall WHERE username=?;');
		$stmt->bindValue(1, $username, PDO::PARAM_STR);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $rows;
	}
}