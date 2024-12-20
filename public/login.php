<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/style.css" rel="stylesheet" type="text/css">

    <title>Login page</title>
</head>
<body>
   <div class="container-fluid">
   <div class="circle-container">
            <div class="leaf"></div>
           <div class="leaf"></div>
            <div class="leaf"></div>
            <br>
            <div class="leaf"></div>
           <div class="leaf"></div>
            <div class="leaf"></div>
   </div>
    <form action="../process/login_process.php" method="post">
      <h1 class="label">Login page</h1>
      <?php
        if(isset($_SESSION["ERROR_MSG_loginform"])){
      ?>
         
         <p class=""><?php echo $_SESSION["ERROR_MSG_loginform"]?></p>

         <?php unset($_SESSION["ERROR_MSG_loginform"])?>

      <?php
        }
      ?>
         <div class="group-input">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-input" >
         </div>
         <div class="group-input">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-input" >
         </div>
        <button type="submit"class="button" name="loginBtn">login</button>
     
        <div class="loginlinks">
        <a href="register.php">Forgot Password?</a>
        <span class="spacer"></span>
        <a href="register.php">Don't have an account register</a>
    </div>
    </form>
      </div>
</body>
</html>