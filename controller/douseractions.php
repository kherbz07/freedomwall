<?
require_once '../model/model_user.php';
new User();

class User
{
	private $user_model;

	public function __construct()
	{
		$user_model = new Model_user();

		if (isset($_POST['action']))
		{
			$action = $_POST['action'];
			callAction($action);
		}
	}

	public function callAction($action)
	{
		if ($action == 'recommendUser')
		{
			recommendUser();
		}
	}

	public function recommendUser()
	{
		$username = $_POST['username'];
		if ($this->user_model->isExistingUser($username))
		{
			
		}
		else
		{

		}
		$tmp_users = $this->user_model->getUserLike($this->getBase($username));
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