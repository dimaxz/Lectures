<?

namespace Application\Controllers;

use Domain\Report\Creater as ReportCreater;
use Application\Concrete\Order;
use Application\Concrete\ReportHtml;
use Application\Concrete\ReportCsv;
use Domain\Report\ReportEmpty;

/**
 * Description of Home
 *
 * @author Admin
 */
class Home extends Base
{

    protected $data = [
        [
            "id"       => 1,
            "date"     => "2017-06-19 15:30",
            "summ"     => 120.50,
            "count"    => 10,
            "currency" => "руб"
        ],
        [
            "id"       => 2,
            "date"     => "2016-06-19 15:30",
            "summ"     => 110.50,
            "count"    => 10,
            "currency" => "руб"
        ],
        [
            "id"       => 3,
            "date"     => "2017-08-19 15:30",
            "summ"     => 20.50,
            "count"    => 3,
            "currency" => "руб"
        ]
    ];
    protected $reportFactory;

    function __construct(ReportCreaterFactory $report)
    {
        $this->reportFactory = $report;
    }

    public function startup()
    {

        //
        $data = $this->data;

        switch (TRUE) {
            case $_POST["type"] == "screen":

                $driver = new ReportHtml();

                break;

            case $_POST["type"] == "csv":

                $driver = new ReportCsv();

                break;

            default:

                $driver = new ReportEmpty;

                break;
        }


        if (isset($_POST["type"])) {

            $report = $this->reportFactory->build($driver);

            foreach ($data as $row) {
                $order = new Order(
                        $row["id"], $row["summ"], $row["currency"], $row["date"], $row["count"]
                );
                $report->addOrder($order);
            }

            return $report->process();
        } else {

            //include 'view.php';
            $s = $this->render("view", [
                "test" => "Report Form Example"
            ]);

            return $s;
        }
    }

}