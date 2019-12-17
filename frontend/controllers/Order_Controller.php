<?php
class Order_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$orders = $this->model->order->find();
		$this->layout->set('auth_layout');
		$this->view->load('order/index', [
			'orders' => $orders
		]);
	}

	public function show()
	{
		$id = getParameter('id');
		if (empty($_SESSION['role'])) {
			redirect('home/index');
		} elseif ($_SESSION['role'] == 1) {
			$this->layout->set('auth_layout');
		}
		$order = $this->model->order->find_by_id($id);
		$products = $this->model->product->find();
		$partners = $this->model->partner->find();
		$order_details = $this->model->order_details->find_order_by_order_id($order['id']);
		$this->view->load('order/show', [
			'order' => $order,
			'products' => $products,
			'partners' => $partners,
			'order_details' => $order_details
		]);
	}
	public function edit()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$id = getGetParameter('id');
		$order = $this->model->order->find_by_id($id);
		$this->layout->set('auth_layout');
		$this->view->load('order/edit', [
			'order' => $order
		]);
	}
	public function update()
	{
		$this->layout->set(null);

		$id = getParameter('id');
		$status = getPostParameter('status');
		if ($status == 1) {
			$status = 'Đang xử lý ';
		}
		if ($status == 2) {
			$status = 'Đã xử lý ';
		}
		$order = $this->model->order->update_by_id($id, [
			'status' => $status
		]);
		if ($order) {
			redirect('order/index');
		} else {
			$this->layout->set('auth_layout');
			$this->view->load('order/edit', [
				'error_message' => 'Cập nhật không thành công'
			]);
		}

	}

	public function delivery_status()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$orders = $this->model->order->find();
		$partners = $this->model->partner->find();
		$this->layout->set('auth_layout');
		$this->view->load('order/delivery_status', [
			'orders' => $orders,
			'partners' => $partners
		]);
	}

	public function checking()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$orders = $this->model->order->find();
		$this->layout->set('auth_layout');
		$this->view->load('order/checking', [
			'orders' => $orders,
		]);
	}

	public function edit_checking()
	{
		$id = getGetParameter('id');
		$order = $this->model->order->find_by_id($id);
		$this->layout->set('auth_layout');
		$this->view->load('order/edit_checking', [
			'order' => $order
		]);
	}

	public function update_checking()
	{
		$this->layout->set(null);
		$id = getParameter('id');
		$status = getPostParameter('status');
		$order = $this->model->order->update_by_id($id, [
			'status' => $status
		]);
		if ($order) {
			redirect('order/checking');
		} else {
			$this->layout->set('auth_layout');
			$this->view->load('order/edit_checking', [
				'error_message' => 'Cập nhật không thành công'
			]);
		}
	}

	public function transaction_history()
	{
		$pageno = getParameter('pageno');
		if (getParameter('pageno')) {
			$pageno = getParameter('pageno');
		} else {
			$pageno = 1;
		}

		$no_of_records_per_page = 5;
		$offset = ($pageno - 1) * $no_of_records_per_page;
		$total_pages = $this->model->order->count_by_order($_SESSION['id'],$no_of_records_per_page);
		$orders = $this->model->order->pagination_by_order($_SESSION['id'], $offset, $no_of_records_per_page);
		$partners = $this->model->partner->find();
		$this->view->load('order/transaction', [
			'orders' => $orders,
			'partners' => $partners,
			'total_pages' => $total_pages,
			'pageno' => $pageno
		]);
	}
	public function store()
	{
		$this->layout->set(null);
		$id = $_SESSION['id'];
		$partner_id = getPostParameter('partner');
		$status = 'Đang xử lý';
		$order = $this->model->order->create([
			'user_id' => $id,
			'partner_id' => $partner_id,
			'status' => $status
		]);
		redirect("order_details/store?id={$order['id']}");
	}

	public function confirm_success(){
		$this->view->load('order/confirm_success');
	}
}
