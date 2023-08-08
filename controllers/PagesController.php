<?php

namespace Controllers;

use MVC\Router;
use Model\Property;
use PHPMailer\PHPMailer\PHPMailer;


class PagesController
{

  public static function index(Router $router)
  {
    $indexPage = true;
    $limit = 3;
    $properties = Property::get($limit);
    $router->render("pages/index", [
      'properties' => $properties,
      'indexPage' => $indexPage
    ]);
  }

  public static function aboutUs(Router $router)
  {
    $router->render('pages/aboutUs');
  }


  public static function properties(Router $router)
  {

    $properties = Property::all();
    $router->render('pages/properties', [
      'properties' => $properties
    ]);
  }
  public static function property(Router $router)
  {
    $id =  filter_var($_GET['id'], FILTER_VALIDATE_INT) ?? null;

    if (!$id) {
      header('Location: /admin');
    }

    $property = Property::find($id);
    $router->render('pages/property', [
      'property' => $property
    ]);
  }

  public static function blog(Router $router)
  {
    $router->render('pages/blog');
  }
  public static function post(Router $router)
  {
    $router->render('pages/post');
  }
  public static function contact(Router $router)
  {
    $message = null;

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

      $responses = $_POST['contact'];

      $mail = new PHPMailer();

      //configure STMP
      $mail->isSMTP();
      $mail->Host = 'sandbox.smtp.mailtrap.io';
      $mail->SMTPAuth = true;
      $mail->Username = '84edf614c6e228';
      $mail->Password = 'ae887ace42221b';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 2525;

      //configure mail content
      $mail->setFrom('neil@biencesraices.com');
      $mail->addAddress('lolochavez78@gmail.com', 'Neil Real State');
      $mail->Subject = 'Hola desde phpmailer';

      //enable HTML
      $mail->isHTML(true);
      $mail->CharSet = 'UTF-8';

      $contactInfo = "";
      if ($responses['contact'] === "telefono") {
        //the fields will be related to telephon
        $contactInfo .= "<p>" . "telephon: " . $responses['telephon'] . "</p>";
        $contactInfo .= "<p>" . "hour: " . $responses['hour'] . "</p>";
        $contactInfo .= "<p>" . "date: " . $responses['date'] . "</p>";
      } else {
        //the fields will be related to email
        $contactInfo .= "<p>" . "email: " . $responses['email'] . "</p>";
      }

      //define content
      $content = "<html>";
      $content .= "<p>Tienes un nuevo mensaje</p>";
      $content .= "<p>" . "Nombre: " . $responses['name'] . "</p>";
      $content .= $contactInfo;
      $content .= "<p>" . "message: " . $responses['message'] . "</p>";
      $content .= "<p>" . "budget: " . $responses['budget'] . "</p>";
      $content .= "</html>";

      $mail->Body = $content;
      $mail->AltBody = "contenido sin HTML";

      if ($mail->send()) {
        $message =  "mensaje enviado correctamente";
      } else {
        $message = "El mensaje no se envio";
      }
    }
    $router->render('pages/contact', [
      'message' => $message
    ]);
  }
}
