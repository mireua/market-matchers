<meta charset="UTF-8">
<title>MarketMatchers</title>
</head>


<body>
<center>
    <h1>MarketMatchers</h1>
    <form action="itemscript.php" method="post">


        <p>
            <label for="itemName">Item Name:</label>
            <input type="text" name="item_name" id="itemName" required>
        </p>


        <p>
            <label for="itemPrice">Item Price:</label>
            <input type="double" name="item_price" id="itemPrice" required>
        </p>


        <p>
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" required>
        </p>



        <input type="submit" value="Create">
    </form>
</center>
</body>
</html>