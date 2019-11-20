<?php
class Order_Controller extends Base_Controller
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


	public function transaction_history()
	{
		// show transation history

		if (!$_SESSION['email']) {
			redirect('home/login');
		}
		$this->view->load('order/transaction');
	}
}
