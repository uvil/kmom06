<?php

/*
 *  I'm running this line in git bash:
 *  
 *   php c:phpunit.phar --bootstrap test/config.php  --coverage-html ./test/code-coverage test/
 * 
 */

namespace Anax\UVC;
 
/**
 * HTML Form elements.
 *
 */
class CUserBaseTest extends \PHPUnit_Framework_TestCase
{
  private $u = null;
  
  public   function __construct() 
  {
    
          // Create service
      $di  = new \Anax\DI\CDIFactoryDefault();
      
      //set service session
      $di->set('session', function() {
    $s = new \Anax\Session\CSession();
    return $s;
}); 

    //set service db
    $di->setShared('db', function() {
    $db = new \Mos\Database\CDatabaseBasic();
    $db->setOptions(require ANAX_APP_PATH . 'config/config_mysql.php');
    $db->connect();
    return $db;
});
       
     //create instance WITH table name
     $this->u = new \Anax\UVC\CUserBase('User');
     
     //inject dependencies
     $this->u->setDI($di);
    
  }

  /**
 * Test of logout function
 *
 * @return void
 *
 */
  public function testLogOut() 
  {  

     
     
     
     //logout
     $res = $this->u->logOut();
     $this->assertTrue($res,true);
     
     //validate reults
     $res = $this->u->getUserInfo();
     $this->assertFalse($res);
     $res = $this->u->isAuthorised();
     $this->assertFalse($res);
  }   
 
  /**
 * Test of login function
 *
 * @return void
 *
 */
  public function testLogIn() 
  {
     
    //testcase 1
     $res = $this->u->logIn('doe','doe');
     $this->assertTrue($res);
     
     $res = $this->u->isAuthorised();
     $this->assertTrue($res);
     
     
     //tescase 2
     $res = $this->u->logIn('admin','admin');
     $this->assertTrue($res);
     
     //testcase 3 - FALSE USER AUTH
     $res = $this->u->logIn('none',' ');
     $this->assertFalse($res);
     
     //testcase 4 - FALSE USER NAME
     $res = $this->u->logIn('','doe');
     $this->assertFalse($res);
     
     //testcase 5 - FALSE PASSSWORD
     $res = $this->u->logIn('doe','dooe');
     $this->assertFalse($res);
     
  }
  
  
 /**
 * Test of get form function
 *
 * @return void
 *
 */
  public function testGetForm() 
  {
     
     $this->u->getLoginForm(' ');
  } 
     
     
  
  /**
  * Test 
  *
  * @expectedException Exception
  *
  * @return void
  *
  */
  public function testValidationRuleNotFound() 
  {
      $el = new \Anax\UVC\CUserBase('User');

      $el->validate('no-such-rule');
  }

}

