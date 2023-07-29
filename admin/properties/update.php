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


$id = filter_var($_GET["id"], FILTER_VALIDATE_INT);

if (!$id) exit;

//query para vendedores
$queryVendedores = "SELECT * FROM vendedores";
$vendedores = mysqli_query($db, $queryVendedores);

//query para la propriedad
$query = "SELECT * FROM propiedades WHERE id = $id";
$result = mysqli_query($db, $query);
$property = mysqli_fetch_assoc($result);

?>

<?php

$errors = [];
$titulo = $property["titulo"];
$precio = $property["precio"];
$description = $property["descripcion"];
$habitaciones = $property["habitaciones"];
$wc = $property["wc"];
$estacionamiento = $property["estacionamiento"];
$seller = $property["vendedores_id"];
$imagenName = $property["imagen"];

if ($_SERVER['REQUEST_METHOD'] === "POST") {

  $query = "SELECT * FROM propiedades WHERE id = $id";
  $queryVendedores = "SELECT * FROM vendedores";
  $result = mysqli_query($db, $query);
  $vendedores = mysqli_query($db, $queryVendedores);

  $property = mysqli_fetch_assoc($result);

  $titulo = mysqli_real_escape_string($db, $_POST["titulo"]);
  $precio = mysqli_real_escape_string($db, $_POST["precio"]);
  $description = mysqli_real_escape_string($db, $_POST["descripcion"]);
  $habitaciones = mysqli_real_escape_string($db, $_POST["habitaciones"]);
  $wc = mysqli_real_escape_string($db, $_POST["wc"]);
  $estacionamiento = mysqli_real_escape_string($db, $_POST["estacionamiento"]);
  $seller = mysqli_real_escape_string($db, $_POST["seller"]);
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


  $tmpImagePosition = $_FILES["imagen"]['name'];
  $nameImage = "";

  if ($imagenName) {
    //cancella il vecchio file
    file_exists("../../images/" . $property["imagen"]) && unlink("../../images/" . $property["imagen"]);
    //carica il nuovo nome
    $tempPosition = $_FILES["imagen"]["tmp_name"];
    $nameImage = md5(uniqid(rand(), true)) . ".jpg";
    if (!is_dir("../../images/")) {
      echo "el directorio images NO EXISTE";
    }
    move_uploaded_file($tempPosition, "../../images/" . $nameImage);
  } else {
    $nameImage = $property["imagen"];
  }



  $query = "UPDATE propiedades 
  SET titulo = '$titulo',
    precio = '$precio',
    imagen = '$nameImage',
    descripcion = '$description',
    habitaciones = '$habitaciones',
    wc = '$wc',
    estacionamiento = '$estacionamiento',
    creado = '$creado',
    vendedores_id = '$seller'
  WHERE id = $id;";

  echo var_dump($query);

  $result = mysqli_query($db, $query);
  if ($result) {
    echo "updated con successo";
    header('Location: /admin?message=2');
  } 
    
  //  INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', '$precio', '$fileName', '$description', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$seller')";

}
?>
<a href="/admin">Torna alla Lista delle proprieta</a>

<br>
<br>
<?php foreach ($errors as $error) : ?>
  <p class="error"><?php echo $error ?> </p>
<?php endforeach ?>


<form class="base-form" method="POST" enctype="multipart/form-data">

  <fieldset>
    <legend>Informacion General</legend>

    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="titulo" placeholder="Apartamento a Paris" value="<?php echo $titulo; ?>">


    <label for="precio">Precio</label>
    <input type="number" id="precio" name="precio" min="0" max="99999" value="<?php echo $precio; ?>">

    <br>
    <label for="imagen">Imagen</label>
    <picture>
      <img src="../../images/<?php echo $imagenName ?>" class="thumbnail-img" alt="imagen <?php echo $titulo; ?> ">

    </picture>
    <input type="file" id="imagen" name="imagen" accept=".png, .jpg, .jpeg">

    <br>
    <label for="descripcion">Descripcion</label>
    <br>
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

  </fieldset>

  <input type="submit" value="Enviar la información">

</form>

<?php mysqli_close($db); ?>