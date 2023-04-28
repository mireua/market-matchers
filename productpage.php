<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <style>
        .product {
            display: inline-block;
            margin: 20px;
            text-align: center;
            border: 1px solid #ccc;
            padding: 10px;
            width: 200px;
        }
        .product img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .product h2 {
            margin-top: 0;
        }
        .product .price {
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php include 'design/header.php'; ?>
    <div id="product-container">
        <?php
        include "Library/Products.php";
        include "db.php";
        
        use Library\Products;

        $products = new Products();

        $products->getAllProducts();
        ?>
    </div>
    <?php include 'design/footer.php'; ?>