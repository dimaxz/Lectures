<?php

class SimpleFactory {

	public function createBicycle(): Bicycle {
		return new Bicycle();
	}

}

/**
 * Велосипед
 */
class Bicycle {

	public function driveTo(string $destination) {
		
	}

}

$factory = new SimpleFactory;

$bicycle = $factory->createBicycle();

$bicycle->driveTo("Kirov");
