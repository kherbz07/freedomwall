<?php
require_once '../model/model_wall.php';
require_once '../model/model_user.php';
new Wall();

class Wall
{
	private $wall_model;
	private $user_model;

	public function __construct()
	{
		$this->wall_model = new Model_wall();
		$this->user_model = new Model_user();

		if (isset($_POST['action']))
		{
			$action = $_POST['action'];
			$this->callAction($action);
		}
	}

	public function callAction($action)
	{
		if ($action == 'postMessage')
		{
			$this->postMessage();
		}
	}

	public function postMessage()
	{
		$username = $_POST['username'];
		$message = $_POST['message'];

		if ($username != '' && $message != '')
		{
			if (!$this->user_model->isExistingUser($username))
			{
				$this->wall_model->addWall($username, $message);
			}
		}
	}

	public function getWall()
	{
		$username = '';
		$from = 0;
		if (isset($_POST['username']))
		{
			$username = $_POST['username'];
		}
		if (isset($_POST['from']))
		{
			$from = $_POST['from'];
		}
		$wall = $this->wall_model->getWall();
	}
}