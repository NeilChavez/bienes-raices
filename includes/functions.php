

<?php 

function isAuth (){

  session_start();

  $auth = $_SESSION['login'];
  if($auth){
    return true;
  }
  return false;
}