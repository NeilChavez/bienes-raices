<?php

namespace Model;

class Seller extends ActiveRecord
{
  protected static $tabla = "vendedores";
  protected static $columnsDB = ['id', 'nombre', 'apellido', 'telefono'];

  public $id;
  public $nombre;
  public $apellido;
  public $telefono;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->nombre = $args['nombre'] ?? "";
    $this->apellido = $args['apellido'] ?? "";
    $this->telefono = $args['telefono'] ?? "";
  }

  public function validate()
  {

    if (!$this->nombre) {
      self::$errors[] = "Tienes que ponerle un nombre";
    }
    if (!$this->apellido) {
      self::$errors[] =
        "Tienes que ponerle un apellido";
    }
    if (!$this->telefono) {
      self::$errors[] = "Tienes que poner un numero de telefono";
    }
    if (!preg_match('/[0-9]{10}/', $this->telefono)) {
      self::$errors[] = "Tienes que poner un numero de telefono valido";
    }
    return self::$errors;
  }
}
