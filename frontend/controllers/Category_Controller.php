<?php
class Category_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	// show all posts
	public function index()
	{ }

	// show post detail
	public function show_product()
	{
		$id = getParameter('id');
		$category = $this->model->category->find_by_id($id);
		$products = $this->model->product->find();
		$this->view->load('category/show_product', [
			'category' => $category,
			'products' => $products
		]);
	}
}
