define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';

drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

class MyModuleTest extends PHPUnit_Framework_TestCase
{  


}
