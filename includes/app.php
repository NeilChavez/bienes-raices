<?php


require "functions.php";
require "templates/config/db.php";
require __DIR__ . "/../vendor/autoload.php";


//conectarnos a la base de datos
$db = connectDB();

use App\ActiveRecord;

ActiveRecord::setDB($db);
