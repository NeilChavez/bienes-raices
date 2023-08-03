<?php


require '../../includes/app.php';

use App\Property;
use App\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

isAuth();
$rootPath = $_SERVER['DOCUMENT_ROOT'];
include $rootPath . '/includes/templates/header.php';

$propiedad = new Property();

//consulta para obtener los vendedores;
$vendedores = Vendedores::all();

$errors = Property::getErrors();

if ($_SERVER['REQUEST_METHOD'] === "POST") {

  // crea una nueva instancia 
  $propiedad = new Property($_POST['propiedad']);

  //SUBIDA DE ARCHIVOS
  //genera un nombre unico 
  $fileName = md5(uniqid(rand(), true)) . ".jpeg";

  // setear una imagen 
  // resize imagen con intervention
  if ($_FILES['propiedad']["tmp_name"]["imagen"]) {
    $image = Image::make($_FILES['propiedad']["tmp_name"]["imagen"])->fit(800, 600);
    $propiedad->setImage($fileName);
  }

  //validar
  $errors = $propiedad->validate();

  if (empty($errors)) {


    //crea carpeta
    if (!is_dir(CARPETA_IMAGES)) {
      mkdir(CARPETA_IMAGES);
    }

    // guarda la imagen en el server
    $image->save(CARPETA_IMAGES . $fileName);

    //guarda en la base de datos
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


<form action="/admin/properties/create.php" class="base-form" method="POST" enctype="multipart/form-data">

  <?php include '../../includes/templates/formulario_propiedades.php' ?>

  <input type="submit" value="Enviar la información">

</form>

<?php mysqli_close($db); ?>