<?php
class Cart_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	// view cart
	public function index()
	{
		$this->view->load('cart/index');
	}

	// add to cart
	public function add_to_cart()
	{
		$item = array();
		$prodcuct_id = $_SESSION['product_id'];
		$prodcuct_name = $_SESSION['product_name'];
		$prodcuct_images = $_SESSION['product_images'];
		$prodcuct_size = $_SESSION['product_size'];
		$prodcuct_price = $_SESSION['product_price'];
		$prodcuct_quantity = getPostParameter('product_quantity');
		array_push($_SESSION['item'], $prodcuct_id, $prodcuct_images, $prodcuct_name, $prodcuct_size, $$prodcuct_price, $prodcuct_quantity);
		if (!$_SESSION['cart']) {
			$_SESSION['cart'] = array();
			$_SESSION['cart'][$prodcuct_id] = $item;
		}
		else {
			redirect('cart/update');
		}
		$this->view->load('cart/index');
	}

	// update product in cart
	public function update_to_cart()
	{
		$prodcuct_id = $_SESSION['product_id'];
		if (array_key_exists($_SESSION['cart'],$prodcuct_id)) {
			$_SESSION['cart'][$prodcuct_id] = $_SESSION['cart'][$prodcuct_id];
		}
	}

	// delete product to cart
	public function destroy_to_cart()
	{ }
}
