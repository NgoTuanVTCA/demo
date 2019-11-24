<?php
class Comment_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
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
