<?php

interface CarService
{
	public function getCost();
}

class BasicInspection implements CarService
{
	public function getCost()
	{
		return 15;
	}
}

class OilChange implements CarService
{
	protected $carService;

	public function __construct(CarService $carService)
	{
		$this->carService = $carService;
	}

	public function getCost()
	{
		return 10 + $this->carService->getCost();
	}
}

echo (new OilChange(new BasicInspection()))->getCost();