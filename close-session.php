<?php 

  session_start();


  //como destruimos la session? 
  //antes se usaba session_destroy y session_unset

// otra forma mejor es asignar el arreglo de session a arreglo vacio
$_SESSION = [];

header('Location: /');