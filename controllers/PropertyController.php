<?php

namespace Controllers;

use Model\Property;
use Model\Seller;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;


class PropertyController
{
  public static function index(Router $router)
  {

    //data Properties
    $properties = Property::all();
    $message = $_GET['message'] ?? null;

    //data Sellers
    $sellers = Seller::all();


    $router->render("properties/admin", [
      "properties" => $properties,
      "message" => $message,
      "sellers" => $sellers 
    ]);
  }

  public static function create(Router $router)
  {
    $errors = Property::getErrors();
    $property = new Property();
    $sellers = Seller::all();

    if ($_SERVER['REQUEST_METHOD']  === 'POST') {
      $args = $_POST['property'];
      $property = new Property($args);

      $fileName = md5(uniqid(rand(), true)) . ".jpeg";

      //set the image and resize it with Intervention
      if ($_FILES['property']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['property']['tmp_name']['imagen'])->fit(800, 600);
        $property->imagen = $fileName;
      }

      $errors = $property->validate();

      if (empty($errors)) {

        if (!is_dir(IMAGES_FOLDER)) {
          mkdir(IMAGES_FOLDER);
        }

        // save the image in the server
        $image->save(IMAGES_FOLDER . $fileName);


        // save the property in the DB
        $property->crear();
      }
    }

    $router->render("properties/create", [
      "errors" => $errors,
      "property" => $property,
      "sellers" => $sellers
    ]);
  }


  public static function update(Router $router)
  {

      $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
      if (!$id) {
        header("location: /admin");
      }
      $property = Property::find($id);
      $errors = Property::getErrors();
      $sellers = Seller::all();

      $router->render("properties/update", [
        "property" => $property,
        "errors" => $errors,
        "sellers" => $sellers
      ]);



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


      $imageAlreadyInDB = $property->imagen;
      $args = $_POST["property"];

      $property->sincronizar($args);
      
      $errors =  $property->validate();
      if($_FILES['property']['tmp_name']['imagen']){


       //hago set de la imagen actual
       $fileName = md5(uniqid(rand(), true)) . ".jpeg";
       $image = Image::make($_FILES['property']['tmp_name']['imagen']);
       $property->setImage($fileName);
      }

      if (empty($errors)) {
        if ($_FILES['property']['tmp_name']['imagen']) {

          $image->save(IMAGES_FOLDER . $fileName);
        }
        
        $property->guardar();
      }
    }
  }

  public static function delete(Router $router){
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = filter_var($_POST['id'], FILTER_VALIDATE_INT) ?? null;
        if(!$id){
          header('location: "/admin"');
        }
        $property =  Property::find($id);
        $property->delete();
      }

  }
}
