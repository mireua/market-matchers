<?php
use People\Account;
 
include "db.php";
include "People/Account.php";

$account = new Account();

if (isset($_POST['name']))
{
    $name = $_POST['name'];
    $account->getFname($name);
}

if (isset($_POST['namepre']) && isset($_POST['nameafter']))
{
    $namepre = $_POST['namepre'];
    $nameafter = $_POST['nameafter'];
    $account->setFname($namepre, $nameafter);
}

if(isset($_POST['delete']))
{
    $id = $_POST['delete'];
    $account->deleteAccount((int)$id);
}

/* echo "Demonstration of Getting first names:" . "<br>";
$account->getFname("James");
 */
/* echo "Demonstration of Setting first names:" . "<br>";
$account->setFname("James", "Samuel");  */

/* echo "Demonstration of Deleting Accounts:" . "<br>";
$account->deleteAccount(9);  */

?>