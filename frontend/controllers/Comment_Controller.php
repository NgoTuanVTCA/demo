<?php
class Comment_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$this->layout->set('auth_layout');
		$comments = $this->model->comment->find();
		$comments = $this->model->comment->find_group_by();
		$users = $this->model->user->find();
		$products = $this->model->product->find();
		
		$this->view->load('comment/index', [
			'comments' => $comments,
			'users' => $users,
			'products' => $products
		]);
	}
	function show()
	{

		$id = getGetParameter('id');
		$this->layout->set('auth_layout');
		$products = $this->model->product->find_by_id($id);
		$comments = $this->model->comment->find_product_by_comment($id);
		$users = $this->model->user->find();
		$products = $this->model->product->find();
		
		$this->view->load('comment/show', [
			'comments' => $comments,
			'users' => $users,
			'products' => $products
		]);
	}

	function edit()
	{
		$id = getParameter('id');
		$this->layout->set('auth_layout');
		$comment = $this->model->comment->find_by_id($id);
		
		$this->view->load('comment/edit', [
			'comment' => $comment
		]);
	}

	function update()
	{
		$this->layout->set(null);
		$id = getParameter('id');
		var_dump($_SESSION['product']);
		$active = getPostParameter('active');
		$comment = $this->model->comment->update_by_id($id, [
			'active' => $active
		]);

		if ($comment) {
			redirect("comment/show&id={$_SESSION['product']}");
		} else {
			$this->layout->set('auth_layout');
			$this->view->load('comment/edit', [
				'error_message' => 'Cập nhật không thành công'
			]);
		}
	}
	public function store()
	{
		// process comment
		$product_id = getParameter('id');
		$userid = $_SESSION['id'];
		$comment = getParameter('comment');
		$errors = [];

		if (!$comment) {
			$errors['comment'] = "vui lòng nhập bình luận";
		}
		if (count($errors) > 0) {
			redirect("product/show&id={$product_id}");
		} else {
			$this->model->comment->create([
				'user_id' => $userid,
				'product_id' => $product_id,
				'content' => $comment
			]);
			redirect("product/show&id={$product_id}");
		}
	}
}
