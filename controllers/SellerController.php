<?php 

namespace Controllers;

use Model\Seller;
use MVC\Router;

class SellerController{

  public static function create(Router $router){

    $seller = new Seller();
    $errors = Seller::getErrors();

    if($_SERVER['REQUEST_METHOD'] === "POST"){
      
      $args = $_POST['seller'];

      $seller = new Seller($args);

      $errors = $seller->validate();

      if(empty($errors)){
        
        $seller->guardar();
      }
    }

    $router->render('sellers/create', [
      'errors' => $errors,
      'seller' => $seller
    ]);
  }

  public static function update(Router $router){
    
    $id = filter_var($_GET['id']) ?? null;

    if(!$id){
      header('Location: /admin');
    }

    $seller = Seller::find($id);
    $errors = Seller::getErrors();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      
      $args = $_POST['seller'];

      $seller->sincronizar($args);
      $errors = $seller->validate();

      if(empty($errors)){

        $seller->guardar();
      }
      
    }

    $router->render('sellers/update', [
      'seller' => $seller,
      'errors' => $errors
    ]);

  }

  public static function delete(Router $router){
    
    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT) ?? null;
    if(!$id){
      header('Location: /admin');
    }
    $type = $_POST['type'];

    if($type === "seller"){

      $seller = Seller::find($id);
      
      $seller->delete();
    }
  }
}
