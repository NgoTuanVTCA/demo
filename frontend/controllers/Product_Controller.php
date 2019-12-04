<?php
class Product_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		// trang danh sach san pham
		
	    if(empty($_SESSION['role']) || $_SESSION['role'] != 1){
	        redirect('home/index');
	    }
		$this->layout->set('auth_layout');
		$products = $this->model->product->find();
		$categories = $this->model->category->find();
		$brands = $this->model->brand->find();
		$product_sizes = $this->model->product_size->find();
		$sizes = $this->model->size->find();
		$this->view->load('product/index', [
			'products' => $products,
			'sizes' => $sizes,
			'categories' => $categories,
			'product_sizes' => $product_sizes,
			'brands' => $brands
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

	function add()
	{
		// trang them san pham
		// hien thi form them san pham
		
	    if(empty($_SESSION['role']) || $_SESSION['role'] != 1){
	        redirect('home/index');
	    }
	    
		$id = getParameter('id');
		$categories = $this->model->category->find();
		$brands = $this->model->brand->find();
		$this->layout->set('auth_layout');
		$this->view->load('product/add', [
			'categories' => $categories,
			'brands' => $brands
		]);
	}

	function store()
	{

		// xu li them san pham
		$name = getPostParameter('name');
		$price = getPostParameter('price');
		$ImageName = getPostParameter('image');
		$category  = getPostParameter('category');
		$brand = getPostParameter('brand');
		$category_id = $category[0];
		$brand_id = $brand[0];
		$target_dir = "";
		if ($category_id == 1) {
			$target_dir = "vest";
		} elseif ($category_id == 2) {
			$target_dir = "so_mi";
		} elseif ($category_id == 3) {
			$target_dir = "caravat";
		} elseif ($category_id == 4) {
			$target_dir = "no";
		} elseif ($category_id == 5) {
			$target_dir = "khan_cai_vest";
		} elseif ($category_id == 6) {
			$target_dir = "giay_da";
		} elseif ($category_id == 7) {
			$target_dir = "ao_da";
		} elseif ($category_id == 8) {
			$target_dir = "quan_au";
		}

		$target_file = $target_dir . '/' . $ImageName;
		$uploadOk = 0;


		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			echo "<p>FILE UPLOADED TO: $target_file</p>";
		} else {
			echo "<p>MOVE UPLOADED FILE FAILED!</p>";
			var_dump(error_get_last());
		}
		$errors = [];

		// echo($target_file);
		if (count($errors) > 0) {
			$this->view->load('product/add', [
				'errors' => $errors
			]);
		} else {

			$product = $this->model->product->create([
				'name' => $name,
				'price' => $price,
				'image' => $target_file,
				'categories_id' => $category_id,
				'brand_id' =>  $brand_id
			]);
			if ($product) {
				redirect("product/edit_size?id={$product['id']}");
			} else {
				$this->view->load('product/add', [
					'error_message' => 'Khong them duoc'
				]);
			}
		}
	}
	function edit_size()
	{

		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$this->layout->set('auth_layout');
		$data = $this->model->product->find_last_product_inserted();
		$product = $this->model->product->find_by_id($data[0]['id']);
		$this->view->load('product/edit_size', [
			'product' => $product
		]);
	}
	function update_size()
	{
		$product_id = $_SESSION['id'];
		$size_id = getPostParameter('size_name');
		$quantity_stock = getPostParameter('quantity');
		echo $product_id;
		$errors = [];
		if (count($errors) > 0) {
			$this->view->load('product/add', [
				'errors' => $errors
			]);
		} else {
			$product_size = $this->model->product_size->create([
				'product_id' => $product_id,
				'size_id' => $size_id,
				'quantity_stock' =>  $quantity_stock
			]);

			$product = $this->model->product->update_by_id($product_id, [
				'quantity' => $quantity_stock
			]);
			if ($product_size && $product) {
				redirect('product/index');
			} else {
				$this->view->load('product/edit_size', [
					'error_message' => 'Khong them duoc'
				]);
			}
		}
	}
	function edit()
	{
		// trang sua san pham
		// hien thi form sua san pham

		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$id = getParameter('id');
		$product = $this->model->product->find_by_id($id);
		$categories = $this->model->category->find();
		$brands = $this->model->brand->find();
		$product_sizes = $this->model->product_size->find();
		$sizes = $this->model->size->find();
		$this->layout->set('auth_layout');
		$this->view->load('product/edit', [
			'product' => $product,
			'sizes' => $sizes,
			'categories' => $categories,
			'product_sizes' => $product_sizes,
			'brands' => $brands
		]);
	}

	function update()
	{
		// xu li sua san pham
		$id = getParameter('id');
		$name = getPostParameter('name');
		$price = getPostParameter('price');
		$ImageName = getPostParameter('image');
		$category  = getPostParameter('category');
		$brand = getPostParameter('brand');
		$category_id = $category[0];
		$brand_id = $brand[0];

		$errors = [];
		$target_dir = "";
		if ($category_id == 1) {
			$target_dir = "vest";
		} elseif ($category_id == 2) {
			$target_dir = "so_mi";
		} elseif ($category_id == 3) {
			$target_dir = "caravat";
		} elseif ($category_id == 4) {
			$target_dir = "no";
		} elseif ($category_id == 5) {
			$target_dir = "khan_cai_vest";
		} elseif ($category_id == 6) {
			$target_dir = "giay_da";
		} elseif ($category_id == 7) {
			$target_dir = "ao_da";
		} elseif ($category_id == 8) {
			$target_dir = "quan_au";
		}

		$target_file = $target_dir . '/' . $ImageName;
		if (count($errors > 0)) {
			$this->view->load('product/edit', [
				'errors' => $errors
			]);
		} else {
			$product = $this->model->product->update_by_id($id, [
				'name' => $name,
				'price' => $price,
				'image' => $target_file,
				'categories_id' => $category,
				'brand' => $brand
			]);

			if ($product) {
				redirect("product/edit_size?id={$id}");
			} else {
				$this->layout->set('auth_layout');
				$this->view->load('product/edit', [
					'error_message' => 'Cập nhật không thành công'
				]);
			}
		}
	}

	function destroy()
	{
		// xu li xoa san pham
		$id = getParameter('id');
		$this->model->product->destroy($id);
		$this->model->product_size->delete_by_product_id($id);
		redirect('product/index');
	}
}
