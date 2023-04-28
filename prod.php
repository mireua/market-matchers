<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MarketMatchers</title>
</head>

<body>
<center>
    <form id="accountlookup" method="post" action="prodscript.php">
        <h1>Item Lookup</h1>
        <label for="itemName">Name:</label>
        <input type="text" id="itemID" name="itemID">
        <br>
        <br>
        <input type="submit" value="Lookup">
    </form>
    <br>

    <form id="changename" method="post" action="prodscript.php">
        <h1>Change Item Name</h1>
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

    <form id="delete" method="post" action="prodscript.php">
        <h1>Delete Item</h1>
        <label for="delete">ID of Item:</label>
        <input type="text" id="delete" name="delete">
        <br>
        <br>
        <input type="submit" value="Delete">
</center>
</form>
</body>
</html>