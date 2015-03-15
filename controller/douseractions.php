<?php
require_once '../model/model_user.php';
new User();

class User
{
	private $user_model;

	public function __construct()
	{
		$this->user_model = new Model_user();

		if (isset($_POST['action']))
		{
			$action = $_POST['action'];
			$this->callAction($action);
		}
	}

	public function callAction($action)
	{
		if ($action == 'recommendUser')
		{
			$this->recommendUser();
		}
	}

	public function recommendUser()
	{
		$username = $_POST['username'];
		$recommend = '';
		
		if ($this->user_model->isExistingUser($username))
		{
			$tmp_users = $this->user_model->getUserLike($this->getBase($username));
			
			$flag = true;
			$ctr = 0;
			$base = $this->getBase($username);

			while($flag)
			{
				$isFound = false;

				for ($i = 0; $i < count($tmp_users); $i++)
				{
					if ($username == $tmp_users[$i]['username'])
					{
						$username = $base;
						if ($ctr > 0)
							$username .= $ctr;
						$ctr++;
						$isFound = true;
						break;
					}
				}

				if (!$isFound)
				{
					$flag = false;
				}
			}
			if ($ctr > 0)
			{
				$recommend = $username;
			}
		}

		echo '{"recommend":"' . $recommend . '"}';
	}

	public function getBase($username)
	{
		$flag = true;
		$count = strlen($username);
		for ($i = 0; $i < $count && $flag; $i++)
		{
			if (ctype_digit($username[$i]))
			{
				$flag = false;
				$username = substr($username, 0, ($i));
			}
		}
		return $username;
	}
}