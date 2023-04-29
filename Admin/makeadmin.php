<?php 
include "../People/Admin.php";
include "../Scripts/db.php";

use \People\Admin;

$admin = new Admin();

if(isset($_POST['accountEmail'])) {
    $email = $_POST['accountEmail'];
    $admin->makeAdmin($email);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>MM - Make Admin</title>
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
		<h2>Make Admin</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="accountEmail">Account E-mail (to make admin):</label>
			<input type="email" id="accountEmail" name="accountEmail" required><br><br>
			<button type="submit">Make Admin</button>
		</form>
	</div>
</body>
<?php include '../Design/footer.php'; ?>
</html>