<?php

if($curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) == 'index.php' | $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) == 'register.php'){
  session_reset();
} else {
  session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>MarketMatchers</title>
  <?php 
    $page_names = array('index.php', 'register.php');
  ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .navbar-brand {
      font-size: 28px;
      font-weight: bold;
      color: #333;
    }
    .nav-link {
      font-size: 18px;
      font-weight: 500;
      color: #333;
      margin-left: 30px;
    }
    html,
    body {
      height: 100%;
      margin: 0;
    }

    .wrapper {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .content {
      flex: 1;
    }

    .footer {
      flex-shrink: 0;
    }

    .navbar {
      width: 100%;
    }

    .navbar-nav {
      width: 100%;
      justify-content: flex-end;
    }

    .container-fluid {
        padding-left: 0;
        padding-right: 0;
    }

    .nav-item.disabled a.nav-link {
        opacity: 0.5;
        pointer-events: none;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">MarketMatchers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
          <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) { ?>
            <li class="nav-item">
              <a class="nav-link" href="../adminpanel.php">Admin Panel</a>
            </li>
          <?php } ?>
            <li class="nav-item <?php echo in_array(basename($_SERVER['PHP_SELF']), $page_names) ? 'd-none' : ''; ?>">
              <a class="nav-link" href="../productpage.php">Products</a>
            </li>
            <li class="nav-item <?php echo in_array(basename($_SERVER['PHP_SELF']), $page_names) ? 'd-none' : ''; ?>">
              <a class="nav-link" href="../mylist.php">Shopping List</a>
            </li>
            <li class="nav-item <?php echo in_array(basename($_SERVER['PHP_SELF']), $page_names) ? 'd-none' : ''; ?>">
              <a class="nav-link" href="https://tracker.gg/valorant/profile/riot/messo%230161/overview">About Us</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
</body>
</html>