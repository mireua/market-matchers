<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MarketMatchers</title>
</head>

<body>
<body>
<center>

    <h3><?php
        session_start();
        if(isset($_SESSION['name'])) {
            echo "Hello, " . $_SESSION['name'];
        } ?></h3>
    <h1>View Products</h1>



        <p>Are you an admin?</p> <a href="adminpanel.php">CRUD Panel</a>

</center>
</body>
</html>