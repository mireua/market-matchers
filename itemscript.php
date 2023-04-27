<?php
// Import the 'db.php' file, which contains the database connection details and code
require "products.php";

// Create a new instance of the 'db' class, which establishes a connection to the database
$products = new products;

// Get the connection object from the 'db' class instance
$conn = $products->connection();

// If the connection object is 'false', output an error message and stop the script execution
if($conn === false){
    die("ERROR: Could not connect. ". mysqli_connect_error());
}

// Get the variables from the HTML form submitted via POST method
$itemName = $_REQUEST['item_name'];
$itemPrice = $_REQUEST['item_price'];
$description = $_REQUEST['description'];

// Construct the SQL query to insert the new account into the 'accounts' table
$sql = "INSERT INTO products VALUES (null, '$itemName','$itemPrice', '$description')";

// Execute the SQL query using the 'mysqli_query()' function, and check if it was successful
if(mysqli_query($conn, $sql)){
    // If the query was successful, print a success message
    echo "Item Added to Library!";
}else{
    // If the query failed, print an error message and include the specific error message returned by MySQL
    echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
}
// Close the database connection
mysqli_close($conn);
?>