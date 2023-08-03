<?php 
function connectDB(){ 
  $db = mysqli_connect("localhost","root", "", "bienesraices_database");
  
  if($db){
    return  $db;
  }else{
    echo "DB could not connect";
  }
}
