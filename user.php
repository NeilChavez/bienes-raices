<?php
//importa la conexion
include 'includes/templates/config/db.php';
$db = connectDB();

//crea un mail y password
$email = "lolochavez78@gmail.com";
$password = "12345";

//para hashear, antes se usaba md5, ahora no para passwords
// var_dump(md5($password));

$passwordHash = password_hash($password, PASSWORD_BCRYPT);
var_dump($passwordHash);

// query para crear el usuario, OJO QUI: visto que $email y $password son string, tienen que estar dentro de "quotes" 
$query = "INSERT INTO users (email, password) VALUES ('$email', '$passwordHash');";


//agregarlo a la base de datos
mysqli_query($db, $query);
?>