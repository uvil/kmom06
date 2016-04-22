<?php

require __DIR__.'/config_with_app.php'; 

$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);

$app->navbar->configure(ANAX_APP_PATH . 'config/navbar.php');  
$app->theme->configure(ANAX_APP_PATH . 'config/theme.php');

 
$app->router->add('', function() use ($app) {
 
  // Prepare the page content
  $app->theme->addStylesheet('css/aboutme.css');
  $app->theme->setVariable('title', "Hem");

  $content = $app->fileContent->get('aboutme.md');
  $content = $app->textFilter->doFilter($content,'markdown');
  $byline  = $app->fileContent->get('byline.md');
  $byline = $app->textFilter->doFilter($byline,'markdown');
 
  $app->views->add('me/aboutme', ['img'=>'uv.png','content'=>$content,'byline'=>$byline]);

});


$app->router->add('user_info', function() use ($app, $di) 
{
  $app->theme->setVariable('title', "User Info");
  
  $usr = new \Anax\UVC\CUserBase('user');
  $usr->setDI($di);
  
  ob_start();
  
  var_dump($usr->getUserInfo());
  $html = "<h4>getUserInfo:</h4><p><pre>" . ob_get_clean(). "</pre>";
  $html .= "<hr><p>&nbsp;</p>";
  
  ob_start();
  
  var_dump($usr->isAuthorised());
  $html .= "<h4>isAuthorised:</h4><p><pre>" . ob_get_clean() . "</pre>";
  
  $html .= "<hr><p>&nbsp;</p>"; 
  
  $app->theme->setVariable('main',$html);
});

$app->router->add('loginform', function() use ($app, $di) 
{
  $app->theme->setVariable('title', "Login");
  
  $usr = new \Anax\UVC\CUserBase('user');
  $usr->setDI($di);
  
$app->theme->setVariable('main',"<div style='margin-top:80px;'>".$usr->getLoginForm('login')."</div>");
});

$app->router->add('login', function() use ($app, $di) 
{
  $app->theme->setVariable('title', "Login process");
  
  $usr = new \Anax\UVC\CUserBase('user');
  $usr->setDI($di);
  
  $pass = $app->request->getPost('password');
  $name = $app->request->getPost('loginname');

  //check login and give feedback
  $res = null;
  if($usr->login($name,$pass)){
    $res = "<div style='margin-top:80px;'>Okej! Du är nu inloggad.</div>";
  }
  else{
   $res = "<div style='margin-top:80px;'>Nope! Fel användarnamn eller lösenord.</div>";
  }
   
  $app->theme->setVariable('main',$res);
  
});

$app->router->add('logout', function() use ($app, $di) 
{
  $app->theme->setVariable('title', "Logout");
  
  $usr = new \Anax\UVC\CUserBase('user');
  $usr->setDI($di);
  
  $usr->logout();
  
$app->theme->setVariable('main',"<div style='margin-top:80px;'>Du är nu utloggad.</div>");
});

  

 
$app->router->add('redovisning', function() use ($app) {
  
  // Prepare the page content
  $app->theme->setVariable('title', "Redovisningar");

  $content = $app->fileContent->get('report.md');
  $content = $app->textFilter->doFilter($content,'markdown');
  
  $byline  = $app->fileContent->get('byline.md');
  $byline = $app->textFilter->doFilter($byline,'markdown');
  
  $app->views->add('me/report', ['content'=>$content,'byline'=>$byline]);
           
});
 
$app->router->add('source', function() use ($app) 
{
  $app->theme->addStylesheet('css/source.css');
  $app->theme->setVariable('title', "Källkod");
  
  $source = new \Mos\Source\CSource(['secure_dir' => '..', 'base_dir' => '..', 
      'add_ignore' => ['.htaccess'] ]);
    
  $h1 = "<h1>Visa källkod</h1>";
  $content = $source->View(); 
  
  $app->views->add('me/source', ['h1'=>$h1,'content'=>$content]);
});




 
$app->router->handle();
$app->theme->render();

