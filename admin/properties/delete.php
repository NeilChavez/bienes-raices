<?php
require '../../includes/functions.php';
$auth = isAuth();
if (!$auth) {
  header('Location: /');
}
$rootPath = $_SERVER['DOCUMENT_ROOT'];
include $rootPath . '/includes/templates/config/db.php';

$db = connectDB();

$id = filter_var($_GET["id"], FILTER_VALIDATE_INT);

if(!$id){ 
  header('Location: /admin');
}

//elimia imagen
$query = "SELECT * FROM propiedades WHERE id = $id";
$resultado = mysqli_fetch_assoc(mysqli_query($db, $query));
$carpetaImagenes = "../../images";
unlink($carpetaImagenes . "/". $resultado["imagen"]);

//elimina informacion
$query = "DELETE FROM propiedades WHERE id = $id";
$resultado = mysqli_query($db, $query);

if($resultado){
  header('Location: /admin?message=3');
}

?>