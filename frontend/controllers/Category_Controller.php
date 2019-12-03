<?php
class Category_Controller extends Base_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->layout->set('auth_layout');
		// trang danh sach san pham

		$categories = $this->model->category->find();
		$this->view->load('category/index', [
			'categories' => $categories
		]);
	}


	function add()
	{
		// trang them san pham
		// hien thi form them san pham
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

		$category = $this->model->category->update($id, [
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
