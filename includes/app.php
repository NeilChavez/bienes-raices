<?php


require "functions.php";
require "config/db.php";
require __DIR__ . "/../vendor/autoload.php";


//conectarnos a la base de datos
$db = connectDB();

use App\ActiveRecord;

ActiveRecord::setDB($db);
