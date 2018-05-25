<?php

/**
 * DTO
 */
class Order implements OrderInterface
{

    protected $id;
    protected $summ;
    protected $count;
    protected $currency;
    protected $date;

    function __construct($id, $summ, $currency, $date, $count)
    {
        $this
                ->setCount($count)
                ->setSumm($summ)
                ->setCurrency($currency)
                ->setId($id)
                ->setDate($date)
                ;
    }

    function getId()
    {
        return $this->id;
    }

    function getSumm()
    {
        return $this->summ;
    }

    function getCount()
    {
        return $this->count;
    }

    function getCurrency()
    {
        return $this->currency;
    }

    function getDate()
    {
        return $this->date;
    }

    function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    function setSumm($summ)
    {
        $this->summ = $summ;
        return $this;
    }

    function setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @inhert
     */
    function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

}

class ReportHtml implements ReportInterface
{

    public function create(array $orders)
    {

        $h = "<table>";
        foreach ($orders as $order) {

            $h .= sprintf(
                    "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", 
                    $order->getId(), 
                    $order->getDate(),
                    $order->getSumm(), $order->getCount(), $order->getCurrency()
                    )
            ;
        }
        $h .= "<table>";
        return $h;
    }

}


class ReportCsv implements ReportInterface
{

    public function create(array $orders)
    {

     
        
        $h = "";
        foreach ($orders as $order) {

            $h .= sprintf(
                    "%s;%s;%s;%s<br/>", 
                    $order->getId(), 
                    $order->getDate(),
                    $order->getSumm(), $order->getCount(), $order->getCurrency()
                    )
            ;
        }
        
        return $h;
    }

}
