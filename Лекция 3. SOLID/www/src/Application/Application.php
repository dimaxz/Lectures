<?

namespace Application;

/**
* Description of Application
*
* @author Admin
*/
class Application
{
//put your code here
    
    public function run()
    {
        
        
        $page = new Controllers\Home();
        
        return $page->startup();
    }
}