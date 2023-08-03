<?php

use App\Vendedores;

require '../../includes/app.php';

$rootPath = $_SERVER['DOCUMENT_ROOT'];
include $rootPath . '/includes/templates/header.php';

isAuth();

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT );
if(!$id){
  header('Location: /admin');
}
$vendedor = Vendedores::find($id);

$errors = Vendedores::getErrors();

if ($_SERVER['REQUEST_METHOD'] === "POST") {

  $args = $_POST['vendedores'];

  //actualizar el objecto en memoria, 
  //con las nueva modificas que el usuario esta escribiendo
  $vendedor->sincronizar($args);

 $errors =  $vendedor->validate();
 
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
<h2>Actualiza vendedor</h2>

<form class="base-form" method="POST" enctype="multipart/form-data">

  <?php include '../../includes/templates/formulario_vendedores.php' ?>

  <input type="submit" value="Actualizar la información">

</form>