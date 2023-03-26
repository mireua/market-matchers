<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>MarketMatchers</title>
</head>

<body>
 
<?php
include "db.php";

$sql = "SELECT userID, fname, lname, email FROM accounts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["userID"]. " - Name: " . $row["fname"]. " " . $row["lname"]. " ". "Email: ". $row["email"]. "<br>";
  }
} else {
  echo "0 results";
}
?>
</body>
</html>