<?php
include "db.php";
session_start();

    // Create a new instance of the 'db' class, which establishes a connection to the database
    $db = new db;

    // Get the connection object from the 'db' class instance
    $conn = $db->connection();

$email_error = $password_error = "";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM accounts WHERE email = ?");
    $query->execute([$email]);
    $user = $query->fetch();

    if ($user && $user['password'] == $password) {
        header("Location: productpage.php");
        exit();
    } else {
        if (!$user) {
            $email_error = "Invalid email address";
        } else {
            $password_error = "Invalid password";
        }
    }
}
?>