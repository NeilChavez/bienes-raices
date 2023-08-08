<?php
namespace Model; 
use Model\ActiveRecord;

class Admin extends ActiveRecord {

  protected static $table = "users";
  protected static $columnsDB = ["id", "email", "password"];

  public $id;
  public $email;
  public $password;

  public function __construct($args=[])
  {
    $this->id = $args['id'] ?? null;
    $this->email = $args['email'] ?? "";
    $this->password = $args['password'] ?? ""; 
  }

  public function validate(){
    if(!$this->email){
      self::$errors[] = "Tienes que poner un email";
    }
    if(!$this->password){
      self::$errors[] = "Tienes que poner una password";
    }

    return self::$errors;
  }

  public function userExists(){
    $email = $this->email;
    $query = "SELECT * FROM ". self::$table ." WHERE email = '$email'" . "LIMIT 1";

    $result = self::consultSQL($query);

    if(!$result){
      self::$errors[] = "Usuario no existe";
    }
    
    return $result;
  }

  public function checkPassword($hashedPassword){
    $password = $this->password;

    $auth = password_verify($password, $hashedPassword);

      if(!$auth){
        self::$errors[] = "la password no es correcta";
      }
    return $auth;
  }

  public function authUser(){
    session_start();
    $_SESSION["user"] = $this->email;
    $_SESSION["login"] = true;
    header('location: /admin');
  }


}