<?

namespace Domain\Report;

/**
 * Description of ReportCreater
 *
 * @author Admin
 */
class Creater
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
        $this->data[] = $order;
        return $this;
    }

    public function process()
    {

        try {
            return $this->driver->create($this->data);
        } catch (Exception $ex) {
            $this->logger->error($ex->getMessage());
            return "error";
        }
    }

}