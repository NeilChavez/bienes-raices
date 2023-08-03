<?php

use App\Property;

require '../../includes/app.php';
isAuth();


$propiedad = Property::find($id);
$propiedad->eliminar();
exit;

//elimia imagen
$query = "SELECT * FROM propiedades WHERE id = $id";
$resultado = mysqli_fetch_assoc(mysqli_query($db, $query));
$carpetaImagenes = "../../images";
unlink($carpetaImagenes . "/". $resultado["imagen"]);

?>