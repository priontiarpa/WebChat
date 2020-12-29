<?php
include("../db/connection.php");

if(isset($_POST['signup'])){
    
    $username =htmlentities(mysqli_real_escape_string($con, $_POST['username']));
    $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
    $pass = htmlentities(mysqli_real_escape_string($con, $_POST['password']));
   
    
    
    
    $check_username="select * from users where username='$username'";
    $run_username=mysqli_query($con, $check_username);
    $check_this=mysqli_num_rows($run_username);
    $userPic="../img/user.png";
    
    if($check_this==1){
        echo"<script>alert('Username already exist,please try again!')</script>";
        echo"<script>window.open('../signup.php','_self')</script>";
        exit();
    }
    
    $check_email="select * from users where email='$email'";
    $run_email=mysqli_query($con, $check_email);
    $check=mysqli_num_rows($run_email);
    
    if($check==1){
        echo"<script>alert('Email already exist,please try again!')</script>";
        echo"<script>window.open('../signup.php', '_self')</script>";
        exit();
    }
    if(strlen($pass)<8){
        echo"<script>alert('Password should be 8 Characters!')</script>";
        exit();
    }
    
  $insertUser="insert into users (username, email, password, userPic) values('$username', '$email', '$pass', '$userPic')"  ;
    
    $query = mysqli_query($con,$insertUser);
     if($query){
        echo"<script>alert('Congratulations $username, your account has been created succesfully')</script>";
        echo"<script>window.open('../signin.php', '_self')</script>";
        
    }
    else{
        echo"<script>alert('Registration failed,try again!')</script>";
        echo"<script>window.open('../signup.php', '_self')</script>";
        
    }
}

?>