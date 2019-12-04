<?php
class Category_Controller extends Base_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$this->layout->set('auth_layout');
		// trang danh sach san pham

		$categories = $this->model->category->find();
		$this->view->load('category/index', [
			'categories' => $categories
		]);
	}
	public function show_product()
	{
		$id = getParameter('id');
		$pageno = getParameter('pageno');
		if (getParameter('pageno')) {
			$pageno = getParameter('pageno');
		} else {
			$pageno = 1;
		}
		$no_of_records_per_page = 9;
		$offset = ($pageno - 1) * $no_of_records_per_page;
		$category = $this->model->category->find_by_id($id);
		$total_pages = $this->model->product->count_by_category($category['id'], $no_of_records_per_page);
		$products = $this->model->product->pagination_by_category($category['id'], $offset, $no_of_records_per_page);

		$this->view->load("category/show_product", [
			'category' => $category,
			'products' => $products,
			'total_pages' => $total_pages,
			'pageno' => $pageno
		]);
	}
	function add()
	{
		// trang them san pham
		// hien thi form them san pham
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$id = getParameter('id');
		$categories = $this->model->category->find();
		$this->layout->set('auth_layout');
		$this->view->load('category/add', [
			'categories' => $categories
		]);
	}

	function store()
	{

		$name = getPostParameter('name');
		$errors = [];

		// echo($target_file);
		if (count($errors) > 0) {
			$this->view->load('product/add', [
				'errors' => $errors
			]);
		} else {

			$category = $this->model->category->create([
				'name' => $name,
			]);
			if ($category) {
				redirect("category/index");
			} else {
				$this->view->load('category/add', [
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
		$this->layout->set('auth_layout');
		$category = $this->model->category->find_by_id($id);
		$this->view->load('category/edit', [
			'category' => $category
		]);
	}

	function update()
	{
		// xu li sua san pham
		$id = getParameter('id');
		$name = getParameter('name');

		$category = $this->model->category->update_by_id($id, [
			'name' => $name,
		]);

		if ($category) {
			redirect('category/index');
		} else {
			$this->layout->set('auth_layout');
			$this->view->load('category/edit', [
				'error_message' => 'Cập nhật không thành công'
			]);
		}
	}

	function destroy()
	{
		// xu li xoa san pham
		// xu li xoa san pham
		$id = getParameter('id');
		$category = $this->model->category->destroy($id);
		redirect('category/index');
	}
}
