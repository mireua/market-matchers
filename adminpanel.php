<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
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
            <a href="#" class="btn btn-primary btn-lg btn-block">Accounts</a>
            <a href="#" class="btn btn-primary btn-lg btn-block">Products</a>
            <a href="#" class="btn btn-primary btn-lg btn-block">Make Admin</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
    <?php include 'Design/footer.php'; ?>
</html>