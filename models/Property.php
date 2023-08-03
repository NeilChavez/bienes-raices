<?php

namespace Model;

class Property extends ActiveRecord
{
  protected static $tabla = "propiedades";
  protected static $columnsDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $habitaciones;
  public $wc;
  public $estacionamiento;
  public $creado;
  public $vendedores_id;

  public function __construct($args = [])
  {
    $this->id = $args["id"] ??  null;
    $this->titulo = $args["titulo"] ??  '';
    $this->precio = $args["precio"] ??  '';
    $this->imagen = $args["imagen"] ??  "";
    $this->descripcion = $args["descripcion"] ??  '';
    $this->habitaciones = $args["habitaciones"] ??  '';
    $this->wc = $args["wc"] ??  '';
    $this->estacionamiento = $args["estacionamiento"] ??  '';
    $this->creado = date('y/m/d');
    $this->vendedores_id = $args["vendedores_id"] ?? 1;
  }

  public function validate()
  {

    if (!$this->titulo) {
      self::$errors[] = "Tienes que poner un titulo";
    }

    if (!$this->precio) {
      self::$errors[] = "Tienes que poner un precio valido";
    }

    if (!$this->descripcion) {
      self::$errors[] = "Tienes que poner una descripcion";
    }

    if (!$this->habitaciones) {
      self::$errors[] = "Tienes que poner un numero de habitaciones valido";
    }

    if (!$this->wc) {
      self::$errors[] = "Tienes que poner un numero de wc valido";
    }

    if (
      !$this->estacionamiento
    ) {
      self::$errors[] = "Tienes que poner un numero de estacionamientos valido";
    }

    if (!$this->imagen) {
      self::$errors[] = "Tienes que subir una imagen de la propriedad";
    }
    return self::$errors;
  }
}
