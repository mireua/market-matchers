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
		<form>
			<label for="productName">Product Name:</label>
			<input type="text" id="productName" name="productName" required><br><br>
            <label for="productName">Product Price:</label>
			<input type="text" id="productName" name="productName" required><br><br>
            <label for="productName">Product Description:</label>
			<input type="text" id="productName" name="productName" required><br><br>
			<label for="productType">Product Type:</label>
			<select id="productType" name="productType" required>
				<option value="">Select Product Type</option>
				<option value="food">Food</option>
				<option value="nonfood">Non-Food</option>
			</select><br><br>
			<button type="submit">Create Product</button>
		</form>
	</div>

    <div class="panel">
		<h2>Read Product</h2>
		<form>
			<label for="productNumber">Product Name:</label>
			<input type="email" id="productNumber" name="productNumber" required><br><br>
			<button type="submit">View product(s)</button>
		</form>
	</div>
	
	<div class="panel">
		<h2>Update Product</h2>
		<form>
			<label for="productNumber">Product ID (to change):</label>
			<input type="text" id="productNumber" name="productNumber" required><br><br>
			<label for="firstName">Product Name:</label>
			<input type="text" id="firstName" name="firstName" required><br><br>
			<label for="lastName">Product Price:</label>
			<input type="text" id="lastName" name="lastName" required><br><br>
			<label for="email">Product Description:</label>
			<input type="email" id="email" name="email" required><br><br>
			<button type="submit">Submit Changes</button>
		</form>
	</div>
	
	<div class="panel">
		<h2>Delete Product</h2>
		<form>
			<label for="productNumber">Product ID:</label>
			<input type="text" id="productNumber" name="productNumber" required><br><br>
			<button type="submit">Delete Product</button>
		</form>
	</div>
</body>
<?php include '../Design/footer.php'; ?>
</html>