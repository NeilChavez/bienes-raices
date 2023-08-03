<?php

use App\Vendedores;

require '../../includes/app.php';

$rootPath = $_SERVER['DOCUMENT_ROOT'];
include $rootPath . '/includes/templates/header.php';

isAuth();

$vendedor = new Vendedores();

$errors = Vendedores::getErrors();

if ($_SERVER['REQUEST_METHOD'] === "POST") {

  $vendedor = new Vendedores($_POST['vendedores']);

  $errors = $vendedor->validate();

  if(empty($errors)){
    $vendedor->guardar();
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

  <?php include '../../includes/templates/formulario_vendedores.php' ?>

  <input type="submit" value="Enviar la información">

</form>