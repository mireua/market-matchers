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
         <form action="regscript.php" method="post">
             
            <p>
               <label for="firstName">First Name:</label>
               <input type="text" name="first_name" id="firstName" required>
            </p>
 
             
            <p>
               <label for="lastName">Last Name:</label>
               <input type="text" name="last_name" id="lastName" required>
            </p>
 
             
            <p>
               <label for="emailAddress">Email Address:</label>
               <input type="text" name="email" id="emailAddress" required>
            </p>

            <p>
               <label for="password">Password:</label>
               <input type="password" name="password" id="password" required>
            </p>
 
            <input type="submit" value="Register">
            <p>Have an account?</p> <a href="index.php">Login</a>
         </form>
      </center>
</body>
</html>