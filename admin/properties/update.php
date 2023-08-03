<?php

use App\Property;
use App\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

require '../../includes/app.php';
isAuth();

$rootPath = $_SERVER['DOCUMENT_ROOT'];
include $rootPath . '/includes/templates/header.php';


$id = filter_var($_GET["id"], FILTER_VALIDATE_INT);

if (!$id) exit;

//consulta para obtener los vendedores;
$vendedores = Vendedores::all();

//query para la propriedad
$propiedad = Property::find($id);
?>

<?php

$errors = Property::getErrors();

if ($_SERVER['REQUEST_METHOD'] === "POST") {

  // $args['titulo'] = $_POST['titulo'] ?? null;
  // $args['precio'] = $_POST['precio'] ?? null;
  // $args['descripcion'] = $_POST['descripcion'] ?? null;
  // $args['...'] = $_POST['...'] ?? null;
  // $args['precio'] = $_POST['precio'] ?? null;
  // $args['descripcion'] = $_POST['descripcion'] ?? null;
  $args = $_POST['propiedad'];
  $propiedad->sincronizar($args);
  //validacion formulario
  $errors = $propiedad->validate();

  $queryVendedores = "SELECT * FROM vendedores";
  $vendedores = mysqli_query($db, $queryVendedores);
  
  
  //SUBIDA DE ARCHIVOS
  //genera un nombre unico 
  $fileName = md5(uniqid(rand(), true)) . ".jpeg";
  
  
  if (empty($errors)) {
    // setear una imagen 
    // resize imagen con intervention
    //subida de archivo
    //almacenar la imagen: images/nombrefile.jpg;
    if ($_FILES['propiedad']["tmp_name"]["imagen"]) {
      $image = Image::make($_FILES['propiedad']["tmp_name"]["imagen"])->fit(800, 600);
      $propiedad->setImage($fileName);
      $image->save(CARPETA_IMAGES . $fileName);
    }

    // hazemos el update
     $propiedad->guardar();
   
  }
}
?>
<a href="/admin">Torna alla Lista delle proprieta</a>

<br>
<br>
<?php foreach ($errors as $error) : ?>
  <p class="error"><?php echo $error ?> </p>
<?php endforeach ?>


<form class="base-form" method="POST" enctype="multipart/form-data">

  <?php
  require '../../includes/templates/formulario_propiedades.php'
  ?>
  <input type="submit" value="Enviar la información">

</form>

<?php mysqli_close($db); ?>