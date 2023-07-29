<?php

  require '../includes/functions.php';
  $auth = isAuth();
  if(!$auth){
    header('Location: /');
  }
$rootPath = $_SERVER['DOCUMENT_ROOT'];

include $rootPath . '/includes/templates/header.php';
include $rootPath . '/includes/templates/config/db.php';
$db = connectDB();
$query = 'SELECT * FROM propiedades';
$result =  mysqli_query($db, $query);

$message = $_GET["message"] ?? null;
?>

<a href="admin/properties/create.php">CREA NUOVE PROPIETA</a>

<?php if (intval($message) === 1) : ?>
  <p> <?php echo "Dato subido con exito" ?> </p>
<?php endif; ?>
<?php if (intval($message) === 2) : ?>
  <p> <?php echo "Dato ACTUALIZADO con exito" ?> </p>
<?php endif; ?>
<?php if (intval($message) === 3) : ?>
  <p> <?php echo "Dato ELIMINADO con exito" ?> </p>
<?php endif; ?>
<table border="1">
  <tr>
    <th>ID</th>
    <th>Titulo</th>
    <th>Precio</th>
    <th>imagen</th>
    <th>Acciones</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['titulo']; ?></td>
      <td><?php echo $row['precio']; ?></td>
      <td>

        <img src="images/<?php echo $row['imagen']; ?>" class="thumbnail-img" alt="<?php echo $row['titulo']; ?>">
      </td>
      <td>
        <a href="admin/properties/update.php<?php echo "?id=" . $row["id"] ?>" class="btn-verde">Modificar</a>
        <a href="/admin/properties/delete.php<?php echo "?id=" . $row["id"] ?>" class="btn-verde">Eliminar</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>