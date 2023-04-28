<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>MM - Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      h1 {
         overflow: hidden; 
         border-right: .15em solid orange; 
         white-space: nowrap; 
         margin: 0 auto; 
         animation: 
            typing 3.5s steps(40, end),
            blink-caret .75s step-end infinite;
      }     

         @keyframes typing {
         from { width: 0 }
         to { width: 80% }
         }

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
    <?php include 'design/header.php'; ?>
    <div class="container">
      <form class="login-form" action="Scripts/regscript.php" method="post">
        <center><h1>Hi! What's your name?</h1></center>
        <div class="form-group">
          <label for="first_name">First Name</label>
          <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your first name" required>
        </div>
        <div class="form-group">
          <label for="last_name">Last Name</label>
          <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name" required>
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        <center><p>Already have an account? <a href="index.php">Login</a></p></center>
      </form>
    </div>
    <?php include 'design/footer.php'; ?>
  </body>
</html>