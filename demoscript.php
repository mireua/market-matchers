<?php
use People\Account; // Importing the Account class from the People namespace

include "db.php"; // Including the database connection file
include "People/Account.php"; // Including the Account class file

$account = new Account(); // Creating an instance of the Account class

// If the 'name' form field is submitted, get the first names of all accounts that match the provided name
if (isset($_POST['name']))
{
    $name = $_POST['name'];
    $account->getFname($name);
}

// If the 'namepre' and 'nameafter' form fields are submitted, update the first name of all accounts that match the provided 'namepre'
if (isset($_POST['namepre']) && isset($_POST['nameafter']))
{
    $namepre = $_POST['namepre'];
    $nameafter = $_POST['nameafter'];
    $account->setFname($namepre, $nameafter);
}

// If the 'delete' form field is submitted, delete the account that matches the provided ID
if(isset($_POST['delete']))
{
    $id = $_POST['delete'];
    $account->deleteAccount((int)$id);
}

if(isset($_POST['admin']))
{
    $id = $_POST['admin'];
    $account->isAdmin((int)$id);
}

/* echo "Demonstration of Getting first names:" . "<br>";
$account->getFname("James");
 */
/* echo "Demonstration of Setting first names:" . "<br>";
$account->setFname("James", "Samuel");  */

/* echo "Demonstration of Deleting Accounts:" . "<br>";
$account->deleteAccount(9);  */

?>