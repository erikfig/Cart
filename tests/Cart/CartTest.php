<?php

namespace WebDevBr\Cart;

class CartTest extends \PHPUnit_Framework_TestCase
{
	private $cart;
	private $product_one;

	public function setUp()
	{
		$this->product_one = [
			'id'=>1,
			'title'=>'Notebook Lenovo',
			'value'=>3500.00,
			'qtd'=>1
		];

		$this->product_two = [
			'id'=>2,
			'title'=>'1 Dolar',
			'value'=>8.50,
			'qtd'=>1
		];

		$this->cart = new Cart;
	}

	public function testAdicionaUmProdutos()
	{

		$this->cart->add($this->product_one);

		$esperado = [
			$this->product_one
		];

		$this->assertEquals($esperado, $this->cart->all());
	}

	public function testAdicionaDoisProdutos()
	{

		$this->cart->add($this->product_one);
		$this->cart->add($this->product_one);

		$this->product_one['qtd'] = 2;

		$esperado = [
			$this->product_one
		];

		$this->assertEquals($esperado, $this->cart->all());
	}

	public function testRemoveUmProduto()
	{
		$this->cart->add($this->product_one);
		$this->cart->add($this->product_one);

		$this->cart->delete(1);

		$esperado = [
			$this->product_one
		];

		$this->assertEquals($esperado, $this->cart->all());
	}

	public function testRemoveDoisProduto()
	{
		$this->cart->add($this->product_one);
		$this->cart->add($this->product_one);
		$this->cart->add($this->product_two);

		$this->cart->delete(1);
		$this->cart->delete(2);

		$esperado = [
			$this->product_one
		];

		$this->assertEquals($esperado, $this->cart->all());
	}
}