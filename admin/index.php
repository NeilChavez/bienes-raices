<?php

require '../includes/app.php';
isAuth();

$rootPath = $_SERVER['DOCUMENT_ROOT'];
include $rootPath . '/includes/templates/header.php';

//cuando el proyecto cresce, este codigo ya no esta bien
// $query = 'SELECT * FROM propiedades';
// $result =  mysqli_query($db, $query);

//Voy a implementar un metodo para obtener todas las propiedades
use App\Property;
use App\Vendedores;

$propiedades = Property::all();
$vendedores = Vendedores::all();

$message = $_GET["message"] ?? null;
//ELIMINAR UNA PROPRIEDAD O UN VENDEDOR;
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);

  if (!$id) {
    header('Location: /admin');
  }

  //guarda el tipo en una variable
  $tipo = $_POST['tipo'];

  if ($tipo === "propiedad") {
    $propiedad = Property::find($id);
    $propiedad->eliminar();
  } else if ($tipo === "vendedor") {
    $vendedor = Vendedores::find($id);
    $vendedor->eliminar();
  }
}
?>

<a href="admin/properties/create.php">CREA NUOVE PROPIETA</a>
<a href="admin/vendedores/create.php">CREA NUOVO VENDEDOR</a>
<br>
<?php 
$mensaje = mostrarNotificacion(intval($message));

if($mensaje){  ?>
  <p class="alerta exito"> <?php echo sanitize($mensaje )?> </p>
<?php }
?>

<h2>Propiedades</h2>
<table border="1">
  <tr>
    <th>ID</th>
    <th>Titulo</th>
    <th>Precio</th>
    <th>imagen</th>
    <th>Acciones</th>
  </tr>
  <?php foreach ($propiedades as $propiedad) : ?>
    <tr>
      <td><?php echo $propiedad->id; ?></td>
      <td><?php echo $propiedad->titulo; ?></td>
      <td><?php echo $propiedad->precio; ?></td>
      <td>
        <img src="images/<?php echo $propiedad->imagen; ?>" class="thumbnail-img" alt="<?php echo $propiedad->titulo ?>">
      </td>
      <td>

        <form method="POST">
          <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
          <input type="hidden" name="tipo" value="propiedad">
          <input type="submit" class="btn-verde" value="Eliminar" />
        </form>
        <a href="/admin/properties/delete.php<?php echo "?id=" . $propiedad->id ?>" class="btn-verde">Eliminar</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<h2>Vendedores</h2>

<table border="1">
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Telefono</th>
    <th>Acciones</th>
  </tr>
  <?php foreach ($vendedores as $vendedor) : ?>
    <tr>
      <td><?php echo $vendedor->id; ?></td>
      <td><?php echo $vendedor->nombre; ?></td>
      <td><?php echo $vendedor->apellido; ?></td>
      <td><?php echo $vendedor->telefono; ?></td>

      <td>

        <form method="POST">
          <input type="hidden" name="id" value="<?php echo $vendedor->id ?>">
          <input type="hidden" name="tipo" value="vendedor">
          <input type="submit" class="btn-verde" value="Eliminar" />
        </form>

        <a href="admin/vendedores/update.php<?php echo "?id=" . $vendedor->id ?>" class="btn-verde">Modificar</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>