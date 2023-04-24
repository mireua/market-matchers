<!DOCTYPE html>
<html>
 
<head>
    <title>Register</title>
</head>
 
<body>
    <center>
    <?php
    // Import the 'db.php' file, which contains the database connection details and code
    require "db.php";

    // Create a new instance of the 'db' class, which establishes a connection to the database
    $db = new db;

    // Get the connection object from the 'db' class instance
    $conn = $db->connection();

    // If the connection object is 'false', output an error message and stop the script execution
    if($conn === false){
        die("ERROR: Could not connect. ". mysqli_connect_error());
    }
        
    // Get the variables from the HTML form submitted via POST method
    $email =  $_REQUEST['email'];
    $password = $_REQUEST['password'];
    
    //rewrite validation
    $query = "SELECT * FROM accounts WHERE  email = '$email' AND password = '$password'";
    $result = $conn->query($query);
    $numrows = mysqli_num_rows($result);  
    if($numrows!=0)  
    {  
    while($row = $result->fetch_assoc())  
    {  
    $dbemail=$row['email'];  
    $dbpassword=$row['password'];
    }  
  
    if($email == $dbemail && $password == $dbpassword)  
    {  
        echo "You have succesfully logged in!";
        session_start();
        header('Location: demo.php');
    }  
    } else {  
        echo "Invalid username or password!";  
    }  

    // Close the database connection
    mysqli_close($conn);
    ?>
    </center>
</body>
 
</html>