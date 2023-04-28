<!doctype html>
<html lang="">
<head>
<meta charset="UTF-8">
<title>MarketMatchers</title>
</head>

<body>
    <div style="text-align: center;">
    <form id="accountlookup" method="post" action="demoscript.php">
    <h1>Account Lookup</h1>
    <label for="fname">Name:</label>
        <label for="name"></label><input type="text" id="name" name="name">
    <br>
    <br>
    <input type="submit" value="Lookup">
    </form>
<br>

<form id="changename" method="post" action="demoscript.php">
    <h1>Change First Name</h1>
    <label for="namepre">Name:</label>
    <input type="text" id="namepre" name="namepre">
    <br>
    <br>
    <label for="nameafter">Change to:</label>
    <input type="text" id="nameafter" name="nameafter">
    <br>
    <br>
    <input type="submit" value="Change">
</form>
<br>

<form id="delete" method="post" action="demoscript.php">
    <h1>Delete Account</h1>
    <label for="delete">ID of Account:</label>
    <input type="text" id="delete" name="delete">
    <br>
    <br>
    <input type="submit" value="Delete">
    </div>

    <div style="text-align: center;">
    <form id="admin" method="post" action="demoscript.php">
        <h1>Make Admin</h1>
        <label for="admin">ID of Account:</label>
        <input type="text" id="admin" name="admin">
        <br>
        <br>
        <input type="submit" value="Update">
        </div>

</body>
</html>