<?php

abstract class Sub
{
	public function make()
	{
		return $this
			->layBread()
			->addLettuce()
			->addPrimaryToppings()
			->addSauces();
	}

	protected function layBread()
	{
		var_dump('layBread');
		return $this;
	}

	protected function addLettuce()
	{
		var_dump('addLettuce');
		return $this;
	}

	protected function addSauces()
	{
		var_dump('addSauces');
		return $this;
	}

	/**
	 * @return $this
	 */
	protected abstract function addPrimaryToppings();
}

class VeggieSub extends Sub
{
	public function addPrimaryToppings()
	{
		var_dump('add Veggies');
		return $this;
	}
}

class TurkeySub extends Sub
{
	public function addPrimaryToppings()
	{
		var_dump('add Turkey ');
		return $this;
	}
}

(new VeggieSub())->make();
(new TurkeySub())->make();