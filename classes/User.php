<?php
include_once "Db.php";

class User extends Db{
    //register user to web
    public function registerUsers($user_fullname,$user_email,$user_password)
    {
        // $user_password_hashed = password_hash($user_password,PASSWORD_DEFAULT);
        // // check if the email exist in the database
        $sql="SELECT * FROM users WHERE user_email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1,$user_email, PDO::PARAM_STR);
        $stmt->execute();
        $user_count = $stmt->rowCount();

        //when email exists
        if($user_count>0){
             echo "error, email already exist in our database";
             die();
        }else{
            
               
            $sql = "INSERT INTO users(user_fullname,user_email,user_password)VALUES(?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1,$user_fullname,PDO::PARAM_STR);
            $stmt->bindParam(2,$user_email,PDO::PARAM_STR);
            $stmt->bindParam(3,$user_password,PDO::PARAM_STR);

            $userInserted = $stmt->execute();
            return $userInserted; 

               
            
           
        }
    }
    //Login User to dashboard
    public function loginUsers($input_username,$input_password){

             $sql = "SELECT * FROM users WHERE user_email= ? ";
             $stmt = $this->connect()->prepare($sql);
             $stmt->bindParam(1,$input_username,PDO::PARAM_STR);
             $stmt->execute();
             $user_count = $stmt->rowCount();
             
             if($user_count < 1){
             echo   $_SESSION["ERROR_MSG_loginform"] = "User not found,incorrect user data";
               header("location:../public/login.php");
                die();

             }
                //    we want the full details of the owner of the email
                        $user=$stmt->fetch(PDO::FETCH_ASSOC);
                        // check if password matches
                          $Dbpassword = $user["user_password"];
                                              
                           if (password_verify($input_password, $Dbpassword)) {
                                $_SESSION["user_id"]=$user["user_id"];
                              header("location:../public/dashboard.php");
                              die();
                            
                        } else {
                          $_SESSION["ERROR_MSG_loginform"] ="Invalid password.";
                          header("location:../public/login.php");
                            die();
                        }
                   
                    
                       $_SESSION["ERROR_MSG_loginform"] ="Either email or password is incorrect";
                        header("location:../public/login.php");
                        die();

    }
    public function getUserInfo($logedin_user_id){

        $sql = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1,$logedin_user_id,PDO::PARAM_INT);
        $stmt->execute();
        $userInfo = $stmt->fetchALL(PDO::FETCH_ASSOC);
           if($userInfo == null){
               return "unauthorized entry";
           }else{
            return $userInfo ;
            die();
           }
        

    }
  
}
    // $insertUser =new User();
    // $insertUser1 = $insertUser->registerUsers("success michael","michaelsuccess098@gmail.com","password098");
      // $loginUser = new User();
      // $loginUser1 = $loginUser->loginUsers("Successkelechi879@gmail.com","1234567890");
      // echo $loginUser1;

    // echo $loginUser1;
//       $fetchUser = new User();
//       $fetchUser1 = $fetchUser->getUserInfo(2);
//     //  print($fetchUser1);
//    echo "<pre>";
//     print_r($fetchUser1);
//     echo "<pre>";
?>