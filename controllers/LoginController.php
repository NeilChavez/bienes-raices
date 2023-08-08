<?php

namespace Controllers;

use Model\Admin;
use MVC\Router;

class LoginController
{

  public static function login(Router $router)
  {

    $errors = Admin::getErrors();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      $admin = new Admin($_POST);
      $errors = $admin->validate();

      if (empty($errors))
        // verificar si el usuario existe
        $result = $admin->userExists();

      if (!$result) {
        $errors = Admin::getErrors();
      } else {
        //verificar si la password es correcta
        $user = (array_shift($result));

        $passinDB = $user->password;
        $auth = $admin->checkPassword($passinDB);

        if ($auth) {
          //autenticar el usuario
          $admin->authUser();
        }else{
          $errors = Admin::getErrors();
        }
      }
    }

    $router->render('pages/login', [
      'errors' => $errors
    ]);
  }

  public static function logout()
  {
    session_start();
    $_SESSION = [];

    header('location: /');

  }
}
