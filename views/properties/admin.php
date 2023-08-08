<a href="/properties/create">CREA NUOVE PROPIETA</a>
<a href="/sellers/create">CREA NUOVO VENDEDOR</a>
<br>
<?php
if ($message) {
  $result = mostrarNotificacion(intval($message));

  if ($result) {  ?>
    <p class="alerta exito"> <?php echo sanitize($result) ?> </p>
<?php }
}
?>

<h2>propertyes</h2>
<table border="1">
  <tr>
    <th>ID</th>
    <th>Titulo</th>
    <th>Precio</th>
    <th>imagen</th>
    <th>Acciones</th>
  </tr>
  <?php foreach ($properties as $property) : ?>
    <tr>
      <td><?php echo $property->id; ?></td>
      <td><?php echo $property->titulo; ?></td>
      <td><?php echo $property->precio; ?></td>
      <td>
        <img src="images/<?php echo $property->imagen; ?>" class="thumbnail-img" alt="<?php echo $property->titulo ?>">
      </td>
      <td>

        <form method="POST" action="/properties/delete">
          <input type="hidden" name="id" value="<?php echo $property->id ?>">
          <input type="hidden" name="tipo" value="property">
          <input type="submit" class="btn-verde" value="Eliminar" />
        </form>

        <a href="/properties/update<?php echo "?id=" . $property->id ?>" class="btn-verde">Modificar</a>
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
  <?php foreach ($sellers as $seller) : ?>
    <tr>
      <td><?php echo $seller->id; ?></td>
      <td><?php echo $seller->nombre; ?></td>
      <td><?php echo $seller->apellido; ?></td>
      <td><?php echo $seller->telefono; ?></td>

      <td>

        <form method="POST" action="sellers/delete">
          <input type="hidden" name="id" value="<?php echo $seller->id ?>">
          <input type="hidden" name="type" value="seller">
          <input type="submit" class="btn-verde" value="Eliminar" />
        </form>

        <a href="sellers/update<?php echo "?id=" . $seller->id ?>" class="btn-verde">Modificar</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>