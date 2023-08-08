<?php

namespace MVC;

class Router
{

  public $routesGET = [];
  public $routesPOST = [];

  public function get($currentURL, $fn)
  {
    $this->routesGET[$currentURL] = $fn;
  }

  public function post($currentURL, $fn){
    $this->routesPOST[$currentURL] = $fn;
  }

  public function checkRoutes()
  {

    $protected_routes = ['/admin', '/properties/create', '/properties/update', '/properties/delete', '/sellers/create', '/sellers/update', '/sellers/delete'];
    
    $currentURL = $_SERVER['PATH_INFO'] ?? "/";
    $method = $_SERVER['REQUEST_METHOD'];

    $fn = "";
    if ($method === 'GET') {
      $fn = $this->routesGET[$currentURL] ?? null;
    }

    if($method === 'POST'){
      $fn = $this->routesPOST[$currentURL] ?? null;
    }

    if(in_array($currentURL, $protected_routes)){
      session_start();
      $auth = $_SESSION['login'] ?? false;
      if(!$auth){
        header('location: /');
      }
    }

    if ($fn) {
      //the URL exist and we have a function associated
      call_user_func($fn, $this);
    } else {
      //if the URL doesn't exist it means the page also doesn't exist
      echo "Page not found";
    }
  }

  //muestra vista 
  public function render($view, $args = [])
  {

    foreach($args as $key => $value){
      $$key = $value;
    }

    ob_start();
    include __DIR__ . "/views/{$view}.php";
    
    $content = ob_get_clean();
    include __DIR__ . "/views/layout.php";
  }
}
