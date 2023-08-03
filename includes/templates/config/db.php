<?php 
function connectDB(){ 
  $db = new mysqli("localhost","root", "", "bienesraices_database");
  
  if($db){
    return  $db;
  }else{
    echo "DB could not connect";
  }
}
