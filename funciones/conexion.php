<?php

$conn = new mysqli('localhost', 'root', 'root', 'manu');

if($conn->connect_error) {
    echo $error -> $conn->connect_error;
  }
  
  $conn->set_charset("utf8");
?>
