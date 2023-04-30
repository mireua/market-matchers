<?php

session_start();
$_SESSION["is_admin"] = false;
$_SESSION["logged_in"] = false;

include "db.php";


$db = new db;
$conn = $db->connection();

$email_error = $password_error = "";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM accounts WHERE email = '$email'");
    $query->execute();
    $numrows = $query->rowCount();
    $user = $query->fetch();
    $userID = $user['userID'];
    $name = $user['fname'];

    if ($numrows > 0) {
        if ($password == $user['password']){
            
            $adminquery = $conn->prepare("SELECT * FROM admin WHERE userID = $userID");
            $adminquery->execute();
            $result = $adminquery->fetch();
            $numrows2 = $adminquery->rowCount();

            if($numrows2 > 0){
                $_SESSION["is_admin"] = true;
                $_SESSION["logged_in"] = true;
                $_SESSION["name"] = $name;
                $_SESSION['list']= array();
                header("Location: ../productpage.php");
            } else {
                $_SESSION["logged_in"] = true;
                $_SESSION["name"] = $name;
                $_SESSION['list']= array();
                header("Location: ../productpage.php");
            }

        } else {
            $error_message = "Incorrect email or password";
            header("Location: ../index.php?error=".urlencode($error_message));
        }
    } else {
        $error_message = "Incorrect email or password";
        header("Location: ../index.php?error=".urlencode($error_message));
    }
}
?>