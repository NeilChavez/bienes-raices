<?php

namespace App;

class ActiveRecord
{
  //base de Datos
  protected static $db;
  protected static $columnsDB = [];
  protected static $tabla = "";

  public $id;
  // errores 
  protected static $errors = [];

 
  public static function setDB($database)
  {
    self::$db = $database;
  }

  public function guardar()
  {
    if (!is_null($this->id)) {
      //actualiza
      $this->update();
    } else {
      //crea
      $this->crear();
    }
  }

  public function crear()
  {
    // sanitizar datos
    $attributes = $this->sanitizeAttributes();

    $string = join(', ', array_keys($attributes));
    $query = "INSERT INTO " . static::$tabla . " ( ";
    $query .= join(', ', array_keys($attributes));
    $query .= " ) VALUES ( '";
    $query .= join("', '", array_values($attributes));
    $query .= "' )";
    // debugger($query);
    $resultado = self::$db->query($query);
    // mensaje exito o error;
    if ($resultado) {
      echo "si se subio a la base datos";
      header('Location: /admin?message=1');
    } else {
      echo "NO se subio";
    }
  }

  public function update()
  {
    // sanitizar datos
    $attributes = $this->sanitizeAttributes();
    $valores = [];

    foreach ($attributes as $key => $value) {
      $valores[] = "$key = '$value'";
    }

    $query = "UPDATE ". static::$tabla ." SET ";
    $query .= join(', ', $valores);
    $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' LIMIT 1;";
    $resultado = self::$db->query($query);
    if ($resultado) {
      echo "updated con successo";
      header('Location: /admin?message=2');
    }
  }

  public function eliminar()
  {
    $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";

    $resultado = self::$db->query($query);
    if ($resultado) {

      //si todo salio bien, entonces borra la imagen tambien
      $this->borrarImagen();
      header('Location: /admin?message=3');
    }
  }

  public function attributes()
  {
    $attributes = [];
    foreach (static::$columnsDB as $column) {
      if ($column === "id") continue;
      $attributes[$column] = $this->$column;
    }

    return $attributes;
  }

  public function sanitizeAttributes()
  {
    $attributes = $this->attributes();
    $sanitized =  [];

    foreach ($attributes as $key => $value) {
      $sanitized[$key] = self::$db->escape_string($value);
    }
    return $sanitized;
  }

  public function setImage($image)
  {
    //Elimina la imagen previa
    if (!is_null($this->id)) {

      //si el file existe, lo eliminamos
      $this->borrarImagen();
    }

    //asigna el atributo imagen el nombre de la imagen;
    if ($image) {
      $this->imagen =  $image;
    }
  }

  //Eliminar archivo
  public function borrarImagen()
  {
    $fileToDelete = CARPETA_IMAGES . $this->imagen;
    file_exists($fileToDelete) && unlink($fileToDelete);
  }

  // validacion
  public static function getErrors()
  {
    return static::$errors;
  }

  public function validate()
  { 

    static::$errors = [];
    return static::$errors;
  }

  public static function all()
  {
    $query = "SELECT * FROM " . static::$tabla;

    // $result =  self::$db->query($query);
    $result =  self::consultSQL($query);

    return $result;
  }

  //Obtiene una determinada cantidad de registros
  public static function get($cantidad)
  {
    $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;

    // $result =  self::$db->query($query);
    $result =  self::consultSQL($query);

    return $result;
  }

  public static function find($id)
  {
    $query = "SELECT * FROM ". static::$tabla ." WHERE id = $id";
    $property =  self::consultSQL($query);

    return array_shift($property);
  }

  public static function consultSQL($query)
  {
    //consulta la base de datos
    $result = self::$db->query($query);

    //iterar los resultados
    $properties = [];
    while ($property = $result->fetch_assoc()) {

      //tienes que darle objetos, para respetar el ACTIVE RECORD,
      // tienes que mapear y crear objetos con key y value
      // y cada objeto se lo das a ese array de "properties "
      $properties[] = static::createObject($property);
    }

    // liberar la memoria 
    $result->free();

    //retornar los resultados
    return $properties;
  }

  protected static function createObject($register)
  {
    $singleProperty = new static;
    foreach ($register as $key => $value) {
      if (property_exists($singleProperty, $key)) {
        $singleProperty->$key = $value;
      }
    }
    return $singleProperty;
  }

  public function sincronizar($args = [])
  {

    foreach ($args as $key => $value) {
      if (property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }
}
