<?php
session_start();
error_reporting(E_ALL);
include "../classes/User.php";
include "../utilities/sanitizer.php";

    if($_POST){

        if(isset($_POST["registerBtn"])){
            
                  $fullname = sanitizer($_POST["fullname"]);
                  $email = sanitizer($_POST["email"]);
                 $password = sanitizer($_POST["password"]);
                 $confirmPassword =sanitizer( $_POST["confirmPassword"]);

                 if(empty($fullname)||empty($email)||empty($password)||empty($confirmPassword)){
                    $_SESSION["ERROR_MSG_registerform"] = "All fields are required";
                    header("location:../public/register.php");
                    
                 }else{
                    if (strlen($password) <8) {
                     $_SESSION["ERROR_MSG_registerform"] = "Password must be grater than (8) characters.";
                      header("location:../public/register.php");
                    }else{
                        if ($password != $confirmPassword) {
                               $_SESSION["ERROR_MSG_registerform"]= "password must match";
                               header("location:../public/register.php");
                        } else {
                              $user_password_hashed = password_hash($password,PASSWORD_DEFAULT);

                              $newUser = new User();
                             $insertNewUser = $newUser->registerUsers($fullname,$email,$user_password_hashed);

                             if($insertNewUser){
                              $_SESSION["ERROR_MSG_registerform"]= "user registered successfully";
                                header("location:../public/register.php");
                             }else{
                                $_SESSION["ERROR_MSG_registerform"]= "error";
                                 header("location:../public/register.php");
                             }

                        }
                        

                    }
                 }


                 
        }else {
          return  "error"; 
        }
    }else {
        header("location:../https://www.google.co.in/");
    }


?>