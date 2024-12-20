<?php

  session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/style.css" rel="stylesheet" type="text/css">
    <title>Register page</title>
</head>
<body>

<div class="container-fluid">
  
<div class="container">
   <div class="leaf"></div>
           <div class="leaf"></div>
            <div class="leaf"></div>
            <br>
            <div class="leaf"></div>
           <div class="leaf"></div>
            <div class="leaf"></div>
           <div class="leaf"></div>
           <div class="leaf"></div>
            <div class="leaf"></div>
        
           
   </div>
   
    <form action="../process/register_process.php"method="post">
        
    <h1 class="label">Register page</h1>
     <?php
       if(isset($_SESSION["ERROR_MSG_registerform"])){
     ?>
      <p class="eror-alert error-type "><?php echo $_SESSION["ERROR_MSG_registerform"]?></p>
      <?php unset($_SESSION["ERROR_MSG_registerform"])?>
     <?php
        }
     ?>
        <div class="group-input">
        <label for="fullname">fullname:</label>
        <input type="text" name="fullname"  class="form-input">
        </div>
        <div class="group-input">
        <label for="email">email:</label>
        <input type="email" name="email" class="form-input">
        </div>

        <div class="group-input">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-input">
        </div>

        <div class="group-input">
            <label for="confirmPassword">confirmPassword:</label>
        <input type="password" name="confirmPassword" class="form-input">
        </div>
        <button type="submit"class="button" name="registerBtn">Register</button>
    
        <div class="loginlinks">
        <a href="index.php">back</a>
        <span class="spacer"></span>
        <a href="login.php">Already have an acount?Login</a>
        </div>
    </form>
   
</div>
   
    
</body>
</html>