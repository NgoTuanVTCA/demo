<?php
class Product_size_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	// show all posts
	public function index()
	{
		$products = $this->model->product->find();
		$categories = $this->model->category->find();
		$brands = $this->model->brand->find();
		$product_sizes = $this->model->product_size->find();
		$sizes = $this->model->size->find();
		$this->view->load('product_size/index', [
			'products' => $products,
			'categories' => $categories,
			'brands' => $brands,
			'product_sizes' => $product_sizes,
			'sizes' => $sizes
		]);
	}

	// show post detail
	public function show()
	{ }
}
