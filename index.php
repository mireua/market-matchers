<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
 
 <?php
   $servername = "localhost"; 
   $username = "root"; 
   $password = "";
   $dbname = "marketmatchers"; 

   $conn = mysqli_connect($servername, 
                        $username, 
                        $password, 
                        $dbname);

   if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
   }
   else
   {
     echo "Successfully Connected to Database<br/><br/>";
   }

   $sql = "SELECT * FROM accounts;"; 
   $qryResult = mysqli_query($conn, $sql);
	 
    mysqli_close($conn);
?>

</body>
</html>