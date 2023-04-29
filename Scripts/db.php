<?php

class db {
  // Create a function to establish a database connection.
  public function connection(){
    // Create a new PDO object to connect to the database.
    $conn = new PDO('mysql:host=localhost;dbname=marketmatchers', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Return the database connection object.
    return $conn;
  }
}
?>