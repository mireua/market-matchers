<!DOCTYPE html>
<html>
 
<head>
    <title>Register</title>
</head>
 
<body>
    <center>
        <?php
 
        require "db.php";
         
        $db = new db;
        $conn = $db->connection();
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        $first_name =  $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
         
        $sql = "INSERT INTO accounts VALUES (null, '$first_name','$last_name','$email', '$password', 1)";
         
        if(mysqli_query($conn, $sql)){
            echo "Data imported successfully!";
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
 
</html>