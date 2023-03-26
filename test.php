<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>MarketMatchers</title>
</head>

<body>
    <center>
<?php
use People\Account;
 
include "db.php";
include "People/Account.php";

$account = new Account();

echo "Demonstration of Getting first names:" . "<br>";
$account->getFname("Bukayo");

/* echo "Demonstration of Setting first names:" . "<br>";
$account->setFname("Bukayo", "Samuel"); */

/* echo "Demonstration of Deleting Accounts:" . "<br>";
$account->deleteAccount(5);  */



 
?>
    </center>
</body>
</html>