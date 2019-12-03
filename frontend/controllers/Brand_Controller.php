<?php
class Brand_Controller extends Base_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->layout->set('auth_layout');
		$brands = $this->model->brand->find();
		$this->view->load('brand/index', [
			'brands' => $brands
		]);
	}

	function add()
	{
		$brands = $this->model->brand->find();
		$this->layout->set('auth_layout');
		$this->view->load('brand/add', [
			'brands' => $brands
		]);
	}

	function store()
	{

		// xu li them san pham
		$name = getPostParameter('name');
		$errors = [];
		
		if (count($errors) > 0) {
			$this->view->load('product/add', [
				'errors' => $errors
			]);
		} else {

			$brand = $this->model->brand->create([
				'name' => $name,
			]);
			if ($brand) {
				redirect("brand/index");
			} else {
				$this->view->load('brand/add', [
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
		$brand = $this->model->brand->find_by_id($id);
		$this->view->load('brand/edit', [
			'brand' => $brand
		]);
	}

	function update()
	{
		// xu li sua san pham
		$id = getParameter('id');
		$name = getParameter('name');

		$brand = $this->model->brand->update($id, [
			'name' => $name,
		]);

		if ($brand) {
			redirect('brand/index');
		} else {
			$this->layout->set('auth_layout');
			$this->view->load('brand/edit', [
				'error_message' => 'Cập nhật không thành công'
			]);
		}
	}

	function destroy()
	{
		// xu li xoa san pham
		$id = getParameter('id');
		$brand = $this->model->brand->destroy($id);
		redirect('brand/index');
	}
}
