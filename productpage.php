<?php 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MM - Products</title>
    <style>
    #product-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: stretch;
    }

    .product {
      display: flex;
      flex-direction: column;
      text-align: center;
      border: 1px solid #ccc;
      height: 300px;
      width: 200px;
      margin: 20px;
      padding: 10px;
      box-sizing: border-box;
    }

    .product img {
      max-width: 100%;
      height: 150px; /* Set a fixed height for all images */
      margin-bottom: 20px;
    }

    .product h2 {
      margin: 0 0 10px 0;
    }

    .product .price {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .product a button {
      background-color: grey;
      border: none;
      color: white;
      padding: 8px 14px;
      text-align: center;
      text-decoration: none;
      font-size: 14px;
      margin-top: auto;
      cursor: pointer;
    }
    </style>
</head>
<body>
<?php include 'Design/header.php'; ?>
    <div id="product-container">
        <?php
        include "Library/Products.php";
        include "Scripts/db.php";

        use Library\Products;

        $products = new Products();

        $products->getAllProducts();
        ?>
    </div>
    <?php include 'Design/footer.php'; ?>
</body>
</html>