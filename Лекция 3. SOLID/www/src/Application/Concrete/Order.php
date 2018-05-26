<?

namespace Application\Concrete;

/**
 * Description of Order
 *
 * @author Admin
 */
class Order implements \Domain\Report\OrderInterface
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