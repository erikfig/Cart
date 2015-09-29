<?php

namespace WebDevBr\Cart;

class Cart
{
	public $products = [];

	public function add(Array $product)
	{
		$key = $this->search($product['id']);

		if ($key !== false) {
			$this->products[$key]['qtd']++;
		} else {
			$this->products = array_merge($this->products, [$product]);
		}
		
	}

	public function delete($id)
	{
		$key = $this->search($id);

		if ($key !== false) {
			$this->products[$key]['qtd']--;

			if ($this->products[$key]['qtd'] <= 0) {
				unset($this->products[$key]['qtd']);
			}
		}
	}

	public function all()
	{
		return $this->products;
	}

	private function search($id)
	{
		return array_search($id, array_column($this->products, 'id'));
	}
}