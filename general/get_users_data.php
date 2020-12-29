<?php
include("../db/connection.php");
$user = "select * from users";
$run_user =mysqli_query($con, $user);

while($row_user=mysqli_fetch_array($run_user)){

    $userId=$row_user['userId'];
    $username=$row_user['username'];
    $user_pic=$row_user['userPic'];
    $login=$row_user['log_in'];
    
    echo"
        <li>
           
           <div class='chat-left-img'>
           <img src='$user_pic'>
           </div>
           <div class='chat-left-detail'>
           <p> <a href='../user/home.php?username=$username'>$username</a></P>";
           if($login=='Online'){
              echo"
        
        <i class='fa fa-circle green icontag' aria-hidden='true'></i>
        ";
           }
           else{
           echo"
           
        <i class='fa fa-circle-o nocolor icontag' aria-hidden='true'></i> 
        ";
           }
         "
           </div>
        </li>
      ";
}

?>