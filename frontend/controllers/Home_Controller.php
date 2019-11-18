<?php
class Home_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// show home

		$products = $this->model->product->find_limit_by_time();
		$this->view->load('home/index', [
			'products' => $products
		]);
	}

	public function transaction_history()
	{
		// show transation history

		if (!$_SESSION['email']) {
			redirect('home/login');
		}
		$this->view->load('home/transaction');
	}
}
