<?php
  error_reporting(E_ALL);
  session_start();
  include "../classes/User.php";
  include "../utilities/sanitizer.php";
  if($_POST){
     if(isset($_POST["loginBtn"])){
         $email = sanitizer($_POST["email"]);
         $password = sanitizer($_POST["password"]);
        if(empty($email)||empty($password)){
          $_SESSION["ERROR_MSG_loginform"] = "All fields ar required";
         header("location:../login.php");
        
        }else{
            $loginUser = new User();
      $loginNewUser = $loginUser->loginUsers($email,$password);
        
          }
     }else{
        header("location:../login.php");
     }
  }else {
    header("location:../https://www.google.co.in/");
  }
    

?>