<?

namespace Application\Concrete;

/**
 * Description of ReportHtml
 *
 * @author Admin
 */
class ReportHtml implements \Domain\Report\ReportInterface
{

    public function create(array $orders)
    {

        $h = "<table>";
        foreach ($orders as $order) {

            $h .= sprintf(
                    "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $order->getId(), $order->getDate(),
                    $order->getSumm(), $order->getCount(), $order->getCurrency()
                    )
            ;
        }
        $h .= "<table>";
        return $h;
    }

}