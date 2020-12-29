<?php
session_start();

include("../db/connection.php");

if(isset($_POST['signin'])){
    $username =htmlentities(mysqli_real_escape_string($con, $_POST['username']));
   
    $pass = htmlentities(mysqli_real_escape_string($con, $_POST['password']));
    
     $query="select * from users where username='$username' AND password='$pass'";
    $run_query=mysqli_query($con, $query);
    $check_user=mysqli_num_rows($run_query);
    
    if($check_user == 1){
        $_SESSION['username']=$username;
        $update_status=mysqli_query($con, "UPDATE users SET log_in='Online' WHERE username='$username'");
        
        $user =$_SESSION['username'];
        $get_user="select * from users where username='$user'";
        $run_user=mysqli_query($con, $get_user);
        $row=mysqli_fetch_array($run_user);
        $user_name=$row['username'];
         header('location:../user/home.php');
   
    }
    else{
        echo"
        <div class='alert alert-danger'> <strong>Check your email and password </strong>
        </div>
        ";
        echo"<script>window.open('../signin.php', '_self')</script>";
        
    }
    
}

?>