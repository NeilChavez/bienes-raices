<?php
use Model\ActiveRecord;

require "functions.php";
require "config/db.php";
require __DIR__ . "/../vendor/autoload.php";

//conectarnos a la base de datos
$db = connectDB();
 
echo '<pre>';
var_dump(new ActiveRecord);
echo '</pre>'; 
// ActiveRecord::setDB($db);
