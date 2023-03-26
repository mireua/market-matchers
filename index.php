<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>MarketMatchers</title>
</head>

<body>
 
<?php
include "db.php";

//Build Query
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
    echo "Connected successfully!";
?>

</body>
</html>