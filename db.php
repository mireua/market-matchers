<?php

class db {
  public function connection(){
    $conn = new mysqli("localhost","root","","marketmatchers");
    return $conn;
  }
}
?>