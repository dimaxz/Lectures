<?

namespace Application\Controllers;

/**
 * Description of Base
 *
 * @author Admin
 */
abstract class Base
{

    /**
     * 
     * @param type $name
     * @param array $data
     * @return type
     */
    protected function render($name, array $data = [])
    {

        ob_start();

        extract($data);

        include(BASEPATH . "/src/Application/Views/" . $name . ".php");

        $output = ob_get_clean();

        return $output;
    }

}