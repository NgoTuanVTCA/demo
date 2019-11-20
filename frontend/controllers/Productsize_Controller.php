<?php
class Productsize_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->model->load('Post', 'post');
	}

	// show all posts
	public function index()
	{ }

	// show post detail
	public function show()
	{ }
}
