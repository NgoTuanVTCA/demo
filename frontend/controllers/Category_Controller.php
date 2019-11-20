<?php
class Category_Controller extends Base_Controller
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
	{
		$id = getParameter('id');
		$data = [
			'post' => $this->model->post->find_by_id($id)
		];
		$this->view->load('post/show', $data);
	}
}
