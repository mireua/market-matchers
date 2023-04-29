<?php
  $password = "secret123"; // define your secret password here
  if(isset($_POST["password"]) && $_POST["password"] == $password) {
    // if the correct password is entered, redirect to the next page
    header("Location: Admin/makeadmin.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MM - Admin Panel</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .card {
      margin-top: 50px;
      width: 400px;
      margin-left: auto;
      margin-right: auto;
    }
    .card-header {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
    }
    .card-body {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .btn {
      margin-top: 20px;
      width: 100%;
    }
  </style>
</head>
<body>
    <?php include 'Design/header.php'; ?>
    <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card">
          <div class="card-header">Admin Panel</div>
          <div class="card-body">
            <a href="../Admin/accountcrud.php" class="btn btn-primary btn-lg btn-block">Accounts</a>
            <a href="Admin/productcrud.php" class="btn btn-primary btn-lg btn-block">Products</a>
            <form method="post">
              <?php if(isset($_POST["make-admin"])) { ?>
                <!-- show the password field only if the "Make Admin" button is clicked -->
                <br>
                <center><label for="password">Password:</label></center>
                <input type="password" id="password" name="password" class="form-control" required>
                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block mt-3">Submit</button>
              <?php } else { ?>
                <button type="submit" name="make-admin" class="btn btn-primary btn-lg btn-block">Make Admin</button>
              <?php } ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
    <?php include 'Design/footer.php'; ?>
</html>
