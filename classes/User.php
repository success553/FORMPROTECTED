<?php
include_once "Db.php";

class User extends Db{
    //register user to web
    public function registerUsers($user_username,$user_fullname,$user_email,$user_password)
    {
        $user_password_hashed = password_hash($user_password,PASSWORD_DEFAULT);
        // check if the email exist in the database
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
            $sql = "SELECT * FROM users WHERE user_username = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1,$user_username, PDO::PARAM_STR);
            $stmt->execute();
            $user_name_count = $stmt->rowCount();
            if($user_name_count >0){
                echo "error,great minds think alike, username already exists.";
                die();
            }else{
               
            $sql = "INSERT INTO users(user_username,user_fullname,user_email,user_password)VALUES(?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1,$user_username,PDO::PARAM_STR);
            $stmt->bindParam(2,$user_fullname,PDO::PARAM_STR);
            $stmt->bindParam(3,$user_email,PDO::PARAM_STR);
            $stmt->bindParam(4,$user_password_hashed,PDO::PARAM_STR);

            $userInserted = $stmt->execute();
            return $userInserted; 
            }
           
        }
    }
    //Login User to dashboard
    public function loginUsers($input_username,$input_password){

             $sql = "SELECT * FROM users WHERE user_username= ? ";
             $stmt = $this->connect()->prepare($sql);
             $stmt->bindParam(1,$input_username,PDO::PARAM_STR);
             $stmt->execute();
             $user_count = $stmt->rowCount();
             
             if($user_count <1){
                return "User not found,incorrect user data";
                die();

             }else{
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                $password_matches = password_verify($input_password,$user["user_password"]);
                if($password_matches){
                    
                    $_SESSION["logedin_user_id"] =  $user["user_id"];
                    header("location:.../dashboard.php");
                    die();

                }else{
                   echo  "incorrect password";
                }

                echo "Either uername,email or password is incorrect";
                die();

             }

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
    // $insertUser1 = $insertUser->registerUsers("michael5","success michael","michael5@gmail.com","password1234");
    //    $loginUser = new User();
    //    $loginUser1 = $loginUser->loginUsers("michaxel5","password1234");

    // echo $loginUser1;
//       $fetchUser = new User();
//       $fetchUser1 = $fetchUser->getUserInfo(2);
//     //  print($fetchUser1);
//    echo "<pre>";
//     print_r($fetchUser1);
//     echo "<pre>";
?>