<?php
class Product_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// trang danh sach san pham
		$products = $this->model->product->find();
		$this->view->load('product/index', [
			'products' => $products,
		]);
	}

	public function show()
	{
		// trang chi tiet san pham

		$id = getGetParameter('id');
		
		$product = $this->model->product->find_by_id($id);
		$category = $this->model->category->find_by_id($product['categories_id']);
		$product_size = $this->model->product_size->find_by_product_size_id($product['id']);
		$sizes = $this->model->size->find();
		$comments = $this->model->comment->find();
		$users = $this->model->user->find();
		$this->view->load('product/show', [
			'product' => $product,
			'comments' => $comments,
			'category' => $category,
			'users' => $users,
			'sizes' => $sizes,
			'product_size' => $product_size

		]);
	}

	public function cart()
	{
		$this->view->load('product/cart');
	}


	public function add()
	{
		// trang them san pham
		// hien thi form them san pham
		$this->view->load('product/add');
	}

	public function store()
	{
		// xu li them san pham

		$name = getParameter('name');
		$price = getParameter('price');
		$filename = getParameter($_FILES['image']);

		$errors = [];

		if (!$name) {
			$errors['name'] = 'Vui long nhap name';
		}
		if (!$price) {
			$errors['price'] = 'Vui long nhap price';
		}

		if (count($errors) > 0) {
			$this->view->load('product/add', [
				'errors' => $errors
			]);
		} else {
			$product = $this->model->product->create([
				'name' => $name,
				'price' => $price
			]);

			if ($product) {
				redirect('product/index');
			} else {
				$this->view->load('product/add', [
					'error_message' => 'Khong them duoc'
				]);
			}
		}
	}


	public function edit()
	{
		// trang sua san pham
		// hien thi form sua san pham
	}

	public function update()
	{
		// xu li sua san pham

	}
}
