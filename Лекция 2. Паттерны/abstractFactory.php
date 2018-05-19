<?php

//Контракты
abstract class AbstractFactory {

	abstract public function createText(string $content): Text;
}

class HtmlFactory extends AbstractFactory {

	public function createText(string $content): Text {
		return new HtmlText($content);
	}

}

class JsonFactory extends AbstractFactory {

	public function createText(string $content): Text {
		return new JsonText($content);
	}

}

abstract class Text
{
    /**
     * @var string
     */
    protected $text;
    public function __construct(string $text)
    {
        $this->text = $text;
    }
}

//Реализация
class HtmlText extends Text {
	// do something here
}


class JsonText extends Text
{
    // do something here
}


if($_POST["type"]=="html"){
	$factory = new HtmlFactory();
}
else{
	$factory = new JsonFactory();
}

$text = $factory->createText("test");


