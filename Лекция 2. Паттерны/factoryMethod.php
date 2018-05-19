<?php
//Контракты

/**
 * Средство передвижения
 */
interface VehicleInterface {

	public function setColor(string $rgb);
}

abstract class FactoryMethod {

	/**
	 * дешевый
	 */
	const CHEAP = 'cheap';

	/**
	 * быстрый
	 */
	const FAST = 'fast';

	/**
	 * создание Средства передвижения
	 */
	abstract protected function createVehicle(string $type): VehicleInterface;

	
	public function create(string $type): VehicleInterface {
		$obj = $this->createVehicle($type);
		$obj->setColor('black');
		return $obj;
	}

}


//Реализация
class CarFerrari implements VehicleInterface {

	/**
	 * @var string
	 */
	private $color;

	public function setColor(string $rgb) {
		$this->color = $rgb;
	}

}

class CarMercedes implements VehicleInterface {

	/**
	 * @var string
	 */
	private $color;

	public function setColor(string $rgb) {
		$this->color = $rgb;
	}

	public function addAMGTuning() {
		// do additional tuning here
	}

}

/**
 * велосипед
 */
class Bicycle implements VehicleInterface {

	/**
	 * @var string
	 */
	private $color;

	public function setColor(string $rgb) {
		$this->color = $rgb;
	}

}




class GermanFactory extends FactoryMethod {

	protected function createVehicle(string $type): VehicleInterface {
		switch ($type) {
			case parent::CHEAP:
				return new Bicycle();
			case parent::FAST:
				$carMercedes = new CarMercedes();
				// we can specialize the way we want some concrete Vehicle since we know the class
				$carMercedes->addAMGTuning();
				return $carMercedes;
			default:
				throw new \InvalidArgumentException("$type is not a valid vehicle");
		}
	}

}

class ItalianFactory extends FactoryMethod {

	protected function createVehicle(string $type): VehicleInterface {
		switch ($type) {
			case parent::CHEAP:
				return new Bicycle();
			case parent::FAST:
				return new CarFerrari();
			default:
				throw new \InvalidArgumentException("$type is not a valid vehicle");
		}
	}

}


if($_POST["lang"]=="ita"){
	$factory = new ItalianFactory;
}
else{
	$factory = new GermanFactory;
}

if($_POST["type"]=="cheap-mode"){
	$type = ItalianFactory::CHEAP;
}
else{
	$type = ItalianFactory::FAST;
}

$vehicle = $factory->create($type);