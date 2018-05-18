<?php

//Контракт
interface ComparatorInterface {

	/**
	 * @param mixed $a
	 * @param mixed $b
	 *
	 * @return int
	 */
	public function compare($a, $b): int;
}


//Реализация
class Context {

	/**
	 * @var ComparatorInterface
	 */
	private $comparator;

	public function __construct(ComparatorInterface $comparator) {
		$this->comparator = $comparator;
	}

	public function executeStrategy(array $elements): array {
		uasort($elements, [$this->comparator, 'compare']);
		return $elements;
	}

}

class DateComparator implements ComparatorInterface {

	/**
	 * @param mixed $a
	 * @param mixed $b
	 *
	 * @return int
	 */
	public function compare($a, $b): int {
		$aDate	 = new \DateTime($a['date']);
		$bDate	 = new \DateTime($b['date']);
		return $aDate <=> $bDate;
	}

}

class IdComparator implements ComparatorInterface {

	/**
	 * @param mixed $a
	 * @param mixed $b
	 *
	 * @return int
	 */
	public function compare($a, $b): int {
		return $a['id'] <=> $b['id'];
	}

}




if($_POST["type"]="id"){
	$comparator = new IdComparator();
}
else{
	$comparator = new DateComparator();
}


$contex = new Context($comparator);

$res = $contex->executeStrategy([
	
	   [ "id"=>1,"date"=>"2018-05-16"],
	   [ "id"=>5,"date"=>"2018-05-19"],
	   [ "id"=>2,"date"=>"2018-05-15"]
]);

var_dump($res);