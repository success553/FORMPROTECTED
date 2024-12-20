<?php
 session_start();
 include "../classes/User.php";
       
  

      if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
        $fetchUser = new User();
        $fetchUserDetails = $fetchUser->getUserInfo($user_id);

        // echo "<pre>";
        // print_r($fetchUserDetails);
        // echo "<pre>";

      }else{

      }
     
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/dashboard.css" rel="stylesheet" type="text/css">
    <title>dashboard</title>
</head>
<body>
     <div class="container-fluid">
         <nav class="nav-bar">
             <h1>dashboard</h1>
         </nav>
        <div class="container-row">
            <aside class="side-menu"></aside>
            <main class="main-body"></main>
        </div>
    
     </div>
 
</body>
</html>