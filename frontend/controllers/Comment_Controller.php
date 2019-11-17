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
		$comment = getParameter('comment');
		$userid = $_SESSION['id'];
		$proid = getParameter('id');
		$errors = [];

		if (!$comment) {
			$errors['comment'] = "vui lòng nhập bình luận";
		}
		if (count($errors) > 0) {
			redirect("product/show&id={$proid['id']}");
		} else {
			$this->model->comment->create([
				'user_id' => $userid,
				'product_id' => $proid,
				'content' => $comment
			]);
			redirect("product/show&id={$proid['id']}");
		}
	}
}
