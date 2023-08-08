<?php
use Model\ActiveRecord;

require "functions.php";
require "config/db.php";
require __DIR__ . "/../vendor/autoload.php";

//conectarnos a la base de datos
$db = connectDB();

 ActiveRecord::setDB($db);
