<?php
	include "Library/shoppingList.php";
  	include "Scripts/db.php";
  
  	$list = new shoppingList();

	$list->addtoList();
	$list->getProductComparisons();
?>

<!DOCTYPE html>
<html>
<head>
<title>MM - Shopping List</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-M0VwxKjP/c5uZ7cjoZwcnzWWLhQ96trqlAV7Vjj5HLt/5YJwwkLpPl5GxNmsznuGLCx/+jJnNtj/L4IF2+mvCg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f2f2f2;
		}

		h1 {
			text-align: center;
			padding-top: 40px;
			padding-bottom: 20px;
		}

		table {
			margin: 0 auto;
			border-collapse: collapse;
			width: 80%;
			background-color: white;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
			border-radius: 10px;
			overflow: hidden;
            border: 5px solid #ccc;
		}

		table th, table td {
			padding: 10px;
			text-align: center;
			border: none;
		}

		table th {
			background-color: grey;
			font-weight: bold;
			border-bottom: 1px solid #dee2e6;
		}

		.price {
			font-size: 24px;
			font-weight: bold;
			color: green;
		}

		.strike {
			text-decoration: line-through;
			color: red;
		}
	</style>
</head>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php include 'Design/header.php'; ?>
	<h1><?php echo $_SESSION['name']?>'s Shopping List</h1>
	<table>
		<thead>
			<tr>
				<th>Product</th>
				<th>Store</th>
				<th>Price</th>
                <th></th>
			    
			</tr>
		</thead>
		<tbody>
			<?php
            
            ?>
		</tbody>
	</table>
</body>
<?php include 'Design/footer.php'; ?>
</html>