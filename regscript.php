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
    $sql = "INSERT INTO accounts VALUES (null, '$first_name','$last_name','$email', '$password')";

    // Execute the SQL query using the 'mysqli_query()' function, and check if it was successful
    if(mysqli_query($conn, $sql)){
        // If the query was successful, print a success message
<<<<<<< Updated upstream:regscript.php
        echo "Data imported successfully!";
    }else{
=======
        $query = $conn->prepare("INSERT INTO accounts VALUES (null, '$first_name','$last_name','$email', '$password')");
        $query->execute();
        header("Location: ../index.php");
    } else if ($numrows > 0){
>>>>>>> Stashed changes:Scripts/regscript.php
        // If the query failed, print an error message and include the specific error message returned by MySQL
        echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
    </center>
</body>
 
</html>