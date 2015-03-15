<?php
new Index();

class Index
{
	public function __construct()
	{
		$this->index();
	}

	public function index()
	{
		include '../view/header.php';
		include '../view/index.php';
		include '../view/footer.php';
	}
}