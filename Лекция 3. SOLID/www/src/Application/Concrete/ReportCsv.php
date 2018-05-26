<?

namespace Application\Concrete;

/**
 * Description of ReportCsv
 *
 * @author Admin
 */
class ReportCsv implements \Domain\Report\ReportInterface
{

    public function create(array $orders)
    {



        $h = "";
        foreach ($orders as $order) {

            $h .= sprintf(
                    "%s;%s;%s;%s" . "\n", $order->getId(), $order->getDate(), $order->getSumm(), $order->getCount(),
                    $order->getCurrency()
                    )
            ;
        }

        return $h;
    }

}