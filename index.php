<?php
  $_SESSION["is_admin"] = false;
  $_SESSION["logged_in"] = false;
  $_SESSION["name"] = null;
  $_SESSION["list"] = null;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>MM - Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      h1 {
         overflow: hidden; /* Ensures the content is not revealed until the animation */
         border-right: .15em solid orange; /* The typwriter cursor */
         white-space: nowrap; /* Keeps the content on a single line */
         margin: 0 auto; /* Gives that scrolling effect as the typing happens */
         animation: 
            typing 3.5s steps(40, end),
            blink-caret .75s step-end infinite;
      }     

         /* The typing effect */
         @keyframes typing {
         from { width: 0 }
         to { width: 80% }
         }

         /* The typewriter cursor effect */
         @keyframes blink-caret {
         from, to { border-color: transparent }
         50% { border-color: black }
      }
      
      .navbar-brand {
        font-size: 28px;
        font-weight: bold;
        color: #333;
      }
      .navbar-nav {
        margin-left: auto;
      }
      .nav-link {
        font-size: 18px;
        font-weight: 500;
        color: #333;
        margin-left: 30px;
      }
      .container {
        margin-top: 80px;
        margin-bottom: 80px;
      }
      .login-form {
        padding: 30px;
        background-color: #f2f2f2;
        border-radius: 10px;
      }
    </style>
  </head>
  <body>
    <?php include 'Design/header.php'; ?>
    <div class="container">
      <form class="login-form" action="Scripts/logscript.php" method="post">
        <center><h1>Welcome back! Please login.</h1></center>
        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $_GET['error']; ?>
          </div>
        <?php } ?>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
        <center><p>Don't have an account? <a href="register.php">Register</a></p></center>
      </form>
    </div>
    <?php include 'Design/footer.php'; ?>
  </body>
</html>