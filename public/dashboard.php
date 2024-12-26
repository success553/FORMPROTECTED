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
    <link href="../assets/font-awesome-4.7.0/css/font-awesome.css" rel="styleSheet" type="text/css">
    <title>dashboard</title>
</head>
<body>

<div class="container">
  <div class="header">
     
    <h1 class="app-name">Todo App</h1>
    <h2 class="time"><i class="fa fa-clock-o fa-lg"></i> 02:9pm</h2>

   
  </div>
  <div class="menu">
  <div class="user">
        <!-- <div class="user-display-picture">

        </div> -->
        <div class="user-full-name">Michael Success <i class="fa fa-circle-o fill"></i></div>
      </div>
       <ul class="menu-item">
           <li class="menu-list"><a href="#"><i class="fa fa-home fa-lg"></i><b class="nav-name">home</b></a></li>
           <li class="menu-list"><a href="#"><i class="fa fa-list-alt fa-lg"></i><b class="nav-name">schedule</b></a></li>
           <li class="menu-list"><a href="#"><i class="fa fa-calendar-o fa-lg"></i><b class="nav-name">calender</b></a></li>
           <li class="menu-list"><a href="#"><i class="fa fa-cloud fa-lg"></i><b class="nav-name">Memories</b></a></li>
           <li class="menu-list"><a href="#"><i class="fa fa-wechat fa-lg"></i> <b class="nav-name">chat</b></a></li>
           <li class="menu-list"><a href="#"><i class="fa fa-user fa-lg"></i><b class="nav-name">profile</b></a></li>
           
           
           <li class="menu-footer"> 
             <ul class="bottom-menu-item">
             <li class="menu-list"><a href="#"><i class="fa fa-gear fa-lg"></i> <b class="nav-name">settings</b></a></li>
             <li class="menu-list"><a href="#"><i class="fa fa-home fa-lg"></i> <b class="nav-name">logout</b></a></li>
             </ul>
           </li>
           
           
      
       </ul>
  </div>
  <div class="content">
     <div  class="main-content">
        
       
     </div>
  </div>
  
</div>
 
</body>
</html>