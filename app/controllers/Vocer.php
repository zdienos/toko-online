<?php 


use App\Core\Controller as Controller;
use App\Models\Product as Product;
use App\Models\Order as OrderModel;
use App\Models\OrderProduct as OrderProduct;

class Vocer extends Controller
{

	protected $product;

	protected $order;

	protected $orderProduct;

	function __construct() {
		$this->order = new OrderModel;
		$this->orderProduct = new OrderProduct;
		
	}


	public function show($id)
	{
		$order = $this->order->find($id);

		$order_product = $this->orderProduct->where('order_id',$order->id)->get();

		$this->view('vocer/show',['order'=>$order,'order_product'=> $order_product]);
	}


}