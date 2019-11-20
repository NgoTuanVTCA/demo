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

		$products = $this->model->product->find_by_new_products();
		$this->view->load('home/index', [
			'products' => $products
		]);
	}
}
