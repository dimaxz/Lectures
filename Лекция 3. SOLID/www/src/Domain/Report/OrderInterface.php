<?

namespace Domain\Report;

/**
 * Description of OrderInterface
 *
 * @author Admin
 */
interface OrderInterface
{

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