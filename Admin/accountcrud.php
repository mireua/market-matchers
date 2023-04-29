<?php 
include "../People/Account.php";
include "../Scripts/db.php";

use \People\Account;

$account = new Account();
?>
<!DOCTYPE html>
<html>
<head>
	<title>MM - Account CRUD</title>
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
		<h2>Read Accounts</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="accountEmail">Account E-mail:</label>
			<input type="email" id="accountEmail" name="accountEmail" required><br><br>
			<button type="submit">View Account(s)</button>
		</form>
	</div>
	<?php 
	if(isset($_POST['accountEmail'])) {
		$email = $_POST['accountEmail'];
		$account->viewAccount($email);
	}?>
	
	<div class="panel">
		<h2>Update Accounts</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="accountNumber">Account ID (to change):</label>
			<input type="text" id="accountNumber" name="accountID" required><br><br>
			<label for="firstName">First Name:</label>
			<input type="text" id="firstName" name="firstName" required><br><br>
			<label for="lastName">Last Name:</label>
			<input type="text" id="lastName" name="lastName" required><br><br>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required><br><br>
			<button type="submit" name="submit_changes">Submit Changes</button>
		</form>
	</div>
	<?php 
	if(isset($_POST['submit_changes'])) {
		// Get the form data
		$accountID = $_POST['accountID'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$email = $_POST['email'];
		
		$account->updateAccount($accountID,$firstName,$lastName,$email);
	}?>
	
	<div class="panel">
		<h2>Delete Accounts</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="accountNumber">Account ID:</label>
			<input type="text" id="accountNumber" name="accountNumber" required><br><br>
			<button type="submit" name="delete_account">Delete Account</button>
		</form>
	</div>
	<?php 
	if(isset($_POST['delete_account'])) {
		// Get the form data
		$accountID = $_POST['accountNumber'];	
		$account->deleteAccount($accountID);
	}?>
</body>
<?php include '../Design/footer.php'; ?>
</html>