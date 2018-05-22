<?php

//Контракты
interface BiosInterface {

	public function execute();

	public function waitForKeyPress();

	public function launch(OsInterface $os);

	public function powerDown();
}

interface OsInterface {

	public function halt();

	public function getName(): string;
}


class Facade {

	/**
	 * @var OsInterface
	 */
	private $os;

	/**
	 * @var BiosInterface
	 */
	private $bios;

	/**
	 * @param BiosInterface $bios
	 * @param OsInterface   $os
	 */
	public function __construct(BiosInterface $bios, OsInterface $os) {
		$this->bios	 = $bios;
		$this->os	 = $os;
	}

	public function turnOn() {
		$this->bios->execute();
		$this->bios->waitForKeyPress();
		$this->bios->launch($this->os);
	}

	public function turnOff() {
		$this->os->halt();
		$this->bios->powerDown();
	}

}



$facade = new Facade($bios, $os);
$facade->turnOn();
$facade->turnOff();

