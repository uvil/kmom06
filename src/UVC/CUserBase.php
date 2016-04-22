<?php

namespace Anax\UVC;

/**
 * Description of CUserBase
 *
 * @author urbvik
 */
class CUserBase implements \Anax\DI\IInjectionAware  {
  
  use \Anax\DI\TInjectable;
  
  private $usersTableName;
  
   public function __construct($tableName=null)
  {
    if($tableName==null)
      return "CUserBase - table name of users required!";
    else
      $this->usersTableName=$tableName;
  }
  
  public function logIn($name=null, $pass=null){
    
    //get database entry
    $this->db->select('name, acronym, email,password')
              ->from($this->usersTableName)
              ->where("acronym=?");
    
    $this->db->execute([$name]);
     
    $res = $this->db->fetchOne();
    
    //check return value and password
    if($res != false && password_verify($pass, $res->password)){
      unset($res->password);
      $this->session->set('user', $res);
      return true;
    }
    else{
      $this->session->set('user', null);
      return false;
    }
  }
  
  public function logOut(){
    
    //unload user from session
   $usrSes =  $this->session->set('user',null);
   return true; 
  }
   
  public function getUserInfo(){
  
   //load user from session
   $usrSes =  $this->session->get('user', []);
   
   //return user data from session
   if($usrSes!=null)
    return $usrSes;
   else
     return false;
  }
  
  public function isAuthorised(){
   
    $user = $this->session->get('user', []);
    
    if($user==null || empty($user->name) || empty($user->acronym) || empty($user->email))
      return false;
    else
      return true;
  }
  
  
  public function getLoginForm($action){
    
    return <<< HTML
        <div class="container" >
		
			<div class="col-sm-6 col-md-8 col-md-offset-2">
				<div class="panel panel-default " style="padding: 30px;">
					
					
						<form role="form"  action="$action" method="POST">
							
								<div class="row" style="padding-bottom:20px;">
									<div class="text-center">
										<h2>Ange kontouppgifter</h2>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user input-size-3"></i>
												</span> 
												<input class="form-control input-size-3" placeholder="Username" name="loginname" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Password" name="password" type="password" value="">
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-orange btn-block" value="logga in">
										</div>
									</div>
								</div>
	
						</form>
					
					
                </div>
			</div>
		
	</div>
HTML;
  }
  
  
  
 
  
 
}
