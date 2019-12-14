<?php
class Order_details_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function store()
	{
		$order_id = getGetParameter('id');
		$carts = $this->model->cart->find();
		$sizes = $this->model->size->find();
		$products = $this->model->product->find();
		$product_sizes = $this->model->product_size->find();
		foreach ($carts as $cart) {
			foreach ($products as $product) {
				foreach ($product_sizes as $product_size) {
					foreach ($sizes as $size) {
						if ($product['id'] == $product_size['product_id']) {
							if ($product_size['size_id'] == $size['id']) {
								$this->model->product_size->update_product_quantity($product['id'], $size['id'], [
									'quantity_stock' => $product_size['quantity_stock'] - $cart['quantity']
								]);
							}
						}
					}
				}
			}
		}
		foreach ($carts as $cart) {
			foreach ($products as $product) {
				foreach ($sizes as $size) {
					if ($cart['user_id'] == $_SESSION['id']) {
						if ($cart['product_id'] == $product['id']) {
							if ($cart['size_id'] == $size['id']) {
								$this->model->order_details->create([
									'order_id' => $order_id,
									'product_id' => $cart['product_id'],
									'size_name' =>  $size['name'],
									'price' => $product['price'] * $cart['quantity'],
									'quantity' => $cart['quantity']
								]);
							}
						}
					}
				}
			}
		}
		$this->model->cart->destroy_product_by_user($_SESSION['id']);
		redirect("cart/index");
	}
}
