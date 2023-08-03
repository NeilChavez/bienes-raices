<?php
define('TEMPLTES_URL', __DIR__ . "/templates");
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGES', '../../images/');

function includeTemplate(string $name, bool $start = false)
{
  include TEMPLTES_URL . "/$nombre.php";
}

function isAuth()
{

  session_start();
  if (!$_SESSION['login']) {
    header('Location: /');
  }
}

function debugger($var){
  echo '<pre>';
  var_dump($var);
  echo '</pre>';
  exit; 
}

//escapa/sanitizar del HTML 
function sanitize($html){
  $string = htmlspecialchars($html);
  return $string;
}

//muestra mensajes
function mostrarNotificacion($codigo){
  $mensaje = "";

  switch ($codigo) {
    case 1: {
      $mensaje = "Dato creado con exito";
      break;
    };
    case 2: {
        $mensaje = "Dato ACTUALIZADO con exito";
        break;
      };
    case 3: {
        $mensaje = "Dato ELIMINADO con exito";
        break;
      };
     default: 
     $mensaje = false;
     break; 


  }

  return $mensaje;
}