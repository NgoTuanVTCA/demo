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
	public function search()
	{

		// search products

		$name = getPostParameter('name');
		$pageno = getParameter('pageno');

		if (getParameter('pageno')) {
			$pageno = getParameter('pageno');
		} else {
			$pageno = 1;
		}

		$no_of_records_per_page = 12;
		$offset = ($pageno - 1) * $no_of_records_per_page;
		
		$products = $this->model->product->pagination($name,$offset, $no_of_records_per_page);
		$total_pages = count($products);
		$this->view->load('home/search_product', [
			'pageno' => $pageno,
			'total_pages' => $total_pages,
			'products' => $products
		]);
	}
}
