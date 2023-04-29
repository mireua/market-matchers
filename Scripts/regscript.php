<!DOCTYPE html>
<html>
 
<head>
    <title>Logging in...</title>
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
    $first_name =  $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    // Construct the SQL query to insert the new account into the 'accounts' table
    $query2 = $conn->prepare("SELECT * FROM accounts WHERE email = '$email'");
    $query2->execute();
    $numrows = $query2->rowCount();

    // Execute the SQL query using the 'mysqli_query()' function, and check if it was successful
    if($numrows == 0){
        // If the query was successful, print a success message
<<<<<<< HEAD:regscript.php
<<<<<<< Updated upstream:regscript.php
        echo "Data imported successfully!";
    }else{
=======
        $query = $conn->prepare("INSERT INTO accounts VALUES (null, '$first_name','$last_name','$email', '$password')");
        $query->execute();
        header("Location: ../index.php");
    } else if ($numrows > 0){
>>>>>>> Stashed changes:Scripts/regscript.php
=======
        $query = $conn->prepare("INSERT INTO accounts VALUES (null, '$first_name','$last_name','$email', '$password')");
        $query->execute();
        header("Location: index.php");
    } else if ($numrows > 0){
>>>>>>> 6e47efc3a894c98e57db1f12e0ec5c0e23c52d96:Scripts/regscript.php
        // If the query failed, print an error message and include the specific error message returned by MySQL
        echo "Someone already has an account with this e-mail!";
    } else {
        echo "There was an error making your account.";
    }

    // Close the database connection
    $conn = null;
    ?>
    </center>
</body>
 
</html>