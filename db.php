<?php

class db {
  // Create a function to establish a database connection.
  public function connection(){
    // Create a new mysqli object to connect to the database.
    $conn = new mysqli("localhost","root","","marketmatchers");
    // Return the database connection object.
    return $conn;
  }
}
?>