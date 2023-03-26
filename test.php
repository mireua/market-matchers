<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>MarketMatchers</title>
</head>

<body>
<?php
use People\Account;
 
include "db.php";
include "People/Account.php";

echo "Demonstration of Getting first names:" . "<br>";
$account = new Account();
$account->getFname("check");

echo "<br>";
echo "Demonstration of Setting first names:" . "<br>";
$account->setFname("Samuel", "Sami");

 
?>
</body>
</html>