<?php
require '../../includes/functions.php';
$auth = isAuth();
if (!$auth) {
  header('Location: /');
}
$rootPath = $_SERVER['DOCUMENT_ROOT'];
include $rootPath . '/includes/templates/header.php';
include $rootPath . '/includes/templates/config/db.php';

$db = connectDB();


$errors = [];
$titulo = "";
$precio = "";
$description = "";
$habitaciones = "";
$wc = "";
$estacionamiento = "";
$seller = "";



if ($_SERVER['REQUEST_METHOD'] === "POST") {
  echo "<pre>";
  echo var_dump($_POST);
  echo "</pre>";

  // echo "<pre>";
  // echo var_dump($_FILES);
  // echo "</pre>";


  $titulo = $_POST["titulo"];
  $precio = $_POST["precio"];
  $description = mysqli_real_escape_string($db, $_POST["descripcion"]);
  $habitaciones = $_POST["habitaciones"];
  $wc = $_POST["wc"];
  $estacionamiento = $_POST["estacionamiento"];
  $seller = $_POST["seller"];
  $creado = date("y-m-d");
  $imagen = $_FILES["imagen"];
  $imagenName = $imagen["name"];

  if (!$titulo) {
    $errors[] = "Tienes que poner un titulo";
  }

  if (!$precio) {
    $errors[] = "Tienes que poner un precio valido";
  }

  if (!$description) {
    $errors[] = "Tienes que poner una descripcion";
  }


  if (!$habitaciones) {
    $errors[] = "Tienes que poner un numero de habitaciones valido";
  }

  if (!$wc) {
    $errors[] = "Tienes que poner un numero de wc valido";
  }
  if (
    !$estacionamiento
  ) {
    $errors[] = "Tienes que poner un numero de estacionamientos valido";
  }

  if (!$imagenName) {
    $errors[] = "Tienes que subir una imagen de la propriedad";
  }

  $dir_images = "../../images/";
  if (!is_dir($dir_images)) {
    mkdir($dir_images);
  }

  $tmpImagePosition = $_FILES["imagen"]['tmp_name'];

  $fileName = md5(uniqid(rand(), true)) . ".jpeg";

  move_uploaded_file($tmpImagePosition, $dir_images . $fileName);

  $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', '$precio', '$fileName', '$description', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$seller')";

  echo var_dump($query);


  // echo var_dump($query);
  $result = mysqli_query($db, $query);

  if ($result) {
    echo "si se subio a la base datos";
    header('Location: /admin?message=success');
  } else {
    echo "NO se subio";
  }

  // exit;

}

$queryVendedores = "SELECT * FROM vendedores";
$vendedores = mysqli_query($db, $queryVendedores);


?>

<a href="/admin">Torna alla Lista delle proprieta</a>

<br>
<br>
<?php foreach ($errors as $error) : ?>
  <p class="error"><?php echo $error ?> </p>
<?php endforeach ?>


<form action="/admin/properties/create.php" class="base-form" method="POST" enctype="multipart/form-data">

  <fieldset>
    <legend>Informacion General</legend>

    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="titulo" placeholder="Apartamento a Paris" value="<?php echo $titulo; ?>">


    <label for="precio">Precio</label>
    <input type="number" id="precio" name="precio" min="0" max="99999" value="<?php echo $precio; ?>">

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" name="imagen" accept=".png, .jpg, .jpeg">

    <label for="descripcion">Descripcion</label>
    <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo $description ?>
  </textarea>
  </fieldset>

  <fieldset>
    <legend>Informacion de la propriedad</legend>

    <label for="habitaciones">Numero habitacion</label>
    <input type="number" name="habitaciones" id="habitaciones" min="0" max="20" value="<?php echo $habitaciones; ?>">

    <label for="wc">Numero WC</label>
    <input type="number" id="wc" name="wc" min="0" max="5" value="<?php echo $wc; ?>">

    <label for="estacionamiento">Numero estacionamientos</label>
    <input type="number" id="estacionamiento" name="estacionamiento" min="0" max="5" value="<?php echo $estacionamiento; ?>">
    <br>
    <select name="seller">
      <option value="choose a seller" disabled default selected>Choose a seller</option>
      <?php while ($row = mysqli_fetch_assoc($vendedores)) : ?>
        <option id="<?php echo $row["id"] ?>" value="<?php echo $row["id"] ?>" selected="<?php echo $row["id"] === $seller ? true : false ?> ">
          <?php echo $row["nombre"] . " " . $row["apellido"] ?>
        <?php endwhile; ?>
        </option>
      </select>
      <?php echo $seller ?>



  </fieldset>

  <input type="submit" value="Enviar la información">

</form>

<?php mysqli_close($db); ?>