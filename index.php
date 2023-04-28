<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>MarketMatchers</title>
</head>

<body>
<body>
      <center>
         <h1>MarketMatchers</h1>
         <form action="logscript.php" method="post">
             
            <p>
               <label for="email">E-mail:</label>
               <input type="text" name="email" id="email" required>
            </p>

<<<<<<< Updated upstream
            <p>
               <label for="password">Password:</label>
               <input type="password" name="password" id="password" required>
            </p>
 
            <input type="submit" value="Login">
         </form>
         <p>Don't have an account?</p> <a href="register.php">Register</a>
      </center>
</body>
=======
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
      <form class="login-form" action="logscript.php" method="post">
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
>>>>>>> Stashed changes
</html>