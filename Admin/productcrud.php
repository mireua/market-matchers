<?php 
include "../Library/Products.php";
include "../Scripts/db.php";

use \Library\Products;

$product = new Products();
?>

<!DOCTYPE html>
<html>
<head>
	<title>MM - Product CRUD</title>
	<style>
	body {
	font-family: Arial, sans-serif;
}

.container {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
	margin: 0 auto;
	max-width: 90%;
}

.panel {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	flex-basis: calc(33.33% - 40px);
	margin: 20px;
	background-color: #f1f1f1;
	border-radius: 5px;
	box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
	padding: 20px;
}

.panel h2 {
	margin-top: 0;
}

form {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	width: 70%;
}

label {
	font-weight: bold;
	margin-bottom: 5px;
}

input {
	padding: 10px;
	margin-bottom: 20px;
	width: 100%;
	border-radius: 5px;
	border: 1px solid #ccc;
	font-size: 16px;
}

button[type="submit"] {
	padding: 10px 20px;
	border-radius: 5px;
	background-color: darkgray;
	color: white;
	font-weight: bold;
	text-decoration: none;
	text-align: center;
	transition: background-color 0.3s;
	margin: 10px 0;
	cursor: pointer;
	border: none;
	font-size: 16px;
}

button[type="submit"]:hover {
	background-color: gray;
}

@media (max-width: 767px) {
	.panel {
		flex-basis: 100%;
		margin: 20px 0;
	}
}


	</style>
</head>
<body>
<?php include '../Design/header.php'; ?>
	
<div class="panel">
		<h2>Create Product</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="productName">Product Name:</label>
			<input type="text" id="productName" name="productName" required><br><br>
            <label for="productPrice">Product Price:</label>
			<input type="text" id="productPrice" name="productPrice" required><br><br>
            <label for="productDesc">Product Description:</label>
			<input type="text" id="productDesc" name="productDesc" required><br><br>
			<label for="productType">Product Type:</label>
			<select id="productType" name="productType" required>
				<option value="">Select Product Type</option>
				<option value="food">Food</option>
				<option value="nonfood">Non-Food</option>
			</select><br><br>
			<label for="productStore">Store:</label>
			<select id="productStore" name="productStore" required>
				<option value="">Select Store:</option>
				<option value="Aldi">Aldi</option>
				<option value="Lidl">Lidl</option>
				<option value="Tesco">Tesco</option>
				<option value="Dunnes">Dunnes</option>
			</select><br><br>
			<label for="productImage">Product Image:</label>
			<input type="text" id="productImage" name="productImage" required><br><br>
			<button type="submit" name="create_product">Create Product</button>
		</form>
	</div>
	<?php 
	if(isset($_POST['create_product'])) {
		
		$name = $_POST['productName'];
		$price = $_POST['productPrice'];
		$desc = $_POST['productDesc'];
		$type = $_POST['productType'];
		$image = $_POST['productImage'];
		$store = $_POST['productStore'];
		
		$product->createItem($name, $price, $desc, $store, $type, $image);
	}?>

    <div class="panel">
		<h2>Read Product</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="productReadName">Product Name:</label>
			<input type="text" id="productReadName" name="productReadName" required><br><br>	
			<button type="submit" name="view_product">View product(s)</button>
		</form>
	</div>
	<?php 
	if(isset($_POST['view_product'])) {
		
		$name = $_POST['productReadName'];
		
		$product->getItemNames($name);
	}?>
	
	<div class="panel">
		<h2>Update Product</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="productNumber">Product ID (to change):</label>
			<input type="text" id="productNumber" name="productChangeID" required><br><br>
			<label for="firstName">Product Name:</label>
			<input type="text" id="firstName" name="productChangeName" required><br><br>
			<label for="lastName">Product Price:</label>
			<input type="text" id="lastName" name="productChangePrice" required><br><br>
			<label for="email">Product Description:</label>
			<input type="text" id="email" name="productChangeDesc" required><br><br>
			<button type="submit" name = "submit_changes">Submit Changes</button>
		</form>
	</div>
	<?php 
	if(isset($_POST['submit_changes'])) {
		
		$id = $_POST['productChangeID'];
		$name = $_POST['productChangeName'];
		$price = $_POST['productChangePrice'];
		$desk = $_POST['productChangeDesc'];
		
		$product->setItem($id, $name, $price, $desk);
	}?>
	
	
	<div class="panel">
		<h2>Delete Product</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="productDeleteID">Product ID:</label>
			<input type="text" id="productDeleteID" name="productDeleteID" required><br><br>
			<button type="submit" name = "delete_product">Delete Product</button>
		</form>
	</div>
	<?php 
	if(isset($_POST['delete_product'])) {
		
		$id = $_POST['productDeleteID'];
		$product->deleteItem($id);
	}?>
</body>
<?php include '../Design/footer.php'; ?>
</html>