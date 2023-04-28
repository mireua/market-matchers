<!doctype html>
<html lang="">
<style>
    #Accounts{
        text-align: left;
    }
    #Products{
        text-align: right;
    }
</style>

<?php
session_start();
?>
<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>

</head>

<body>
<div style="text-align: center;">
    <h1>Admin CRUD Panel</h1>
<div id="Accounts">

    <h2>Edit Accounts</h2>
    <button><a href="index.php" >Create</a></button> <br>
        <button><a href="demo.php">Read</a></button> <br>
        <button><a href="demo.php">Update</a></button> <br>
        <button><a href="demo.php">Delete</a></button> <br>
</div>

    <div id="Products">
        <h2>Edit Products</h2>
        <button><a href="items.php">Create</a></button> <br>
        <button><a href="prod.php">Read</a></button> <br>
        <button><a href="prod.php">Update</a> </button> <br>
        <button><a href="prod.php">Delete</a> </button> <br>

    </div>
</div>
</body>
</html>