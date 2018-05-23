<?php


interface ReportInterface
{

    public function create(array $orders);
}
class ReportEmpty implements ReportInterface
{

    
    
    public function create(array $orders)
    {
        
        
        
    }

}

class ReportCreater
{

    protected $driver;
    protected $data = [];

    function __construct(ReportInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * 
     * @param Order $order
     * @return $this
     */
    public function addOrder(OrderInterface $order)
    {
        $this->data[]=$order;
        return $this;
    }

    public function process()
    {

        try{
            return $this->driver->create($this->data);
        } catch (Exception $ex) {
            $this->logger->error($ex->getMessage());
            return "error";
        }
        
    }

}

interface OrderInterface{
    /**
     * @example path description
     */
    function getId();
    function getSumm();
    function getCount();
    function getCurrency();
    function getDate();
    function setId($id);
    function setSumm($summ);
    function setCount($count);
    /**
     * Валюта
     * @param string $currency 
     */
    function setCurrency($currency);
    function setDate($date);
}