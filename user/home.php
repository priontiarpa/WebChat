<!DOCTYPE html>
<?php
session_start();

include("../db/connection.php");
if(!isset($_SESSION['username'])){
    header("location:../signin.php");
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> My Fairy Place for Message</title>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
 <link rel="stylesheet" href="../css/home.css">
 
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <!----------font awesome--------------->
   
   <script src="https://kit.fontawesome.com/c8e4d183c2.js"  ></script>
   
   <!----------font awesome--------------->
   <!-------favicon------------------------------>
		<link rel="shortcut icon" type="image/x-icon" href="../img/fav.png" />
	<!------- end favicon------------------------------>
   
<link href="https://fonts.googleapis.com/css2?family=Courgette&family=Pacifico&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
   <!------------bootstrap css----------->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <!------------bootstrap css----------->
</head>
<body>
 
<div class="container main-section">
   <div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
        <div class="input-group searchbox">
            <div class="input-group-btn">
            <form action="search.php" class="search_form">
                 <input type="text" id="myInput" placeholder="Search for names..">
              </form>
            </div>
        </div>
        <div class="left-chat" style="overflow:scroll; height:500px;">
            <ul>
                <?php include("../general/get_users_data.php")?>
            </ul>
        </div>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
        <div class="row">
            <?php 
            $user=$_SESSION['username'];
                $get_user ="select * from users where username='$user'" ;
                $run_user=mysqli_query($con, $get_user);
                $row=mysqli_fetch_array($run_user);
                
                $user_id=$row['userId'];
                $user_name=$row['username'];
                
            ?>
            
            <?php
            if(isset($_GET['username'])){
                global $con;
                
                $get_username=$_GET['username'];
                $get_user ="select * from users where username='$get_username'" ;
                $run_user =mysqli_query($con, $get_user);
                $row_user=mysqli_fetch_array($run_user);
                 $username=$row_user['username'];
                 $user_pic=$row_user['userPic'];
                
            }
            
            $total_messages ="select * from users_chat where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username')";
            $run_messages =mysqli_query($con, $total_messages);
            $total =mysqli_num_rows($run_messages );
            ?>
            <div class="col-md-12 right-header">
                <div class="right-header-img">
                    <img src="<?php echo "$user_pic";?>">
                </div>
                <div class="right-header-detail">
                    <form action="" method="post">
                        <p> <?php echo "$username"?></p>
                        <span><?php echo $total; ?> messages</span>&nbsp &nbsp  
                        
                        <button class="btn float-right" style="color:#A918AC;font-size:20px;" name="logout"><i class="fas fa-sign-out-alt"></i></button>
                        <a href="settings.php" class="float-right" style="color:#A918AC;font-size:20px;"><i class="fas fa-cog"></i></a>
                     </form> </div>
            </div>
        </div>
                    <?php 
                      if (isset($_POST['logout'])){
                          $update_msg=mysqli_query($con, "UPDATE users SET log_in='Offline' WHERE username='$user'");
                     
                     header('location:logout.php');
                    exit(); }
                    ?>
            
        <div class="row">
            <div id="scrolling_to_bottom" style="overflow-y:scroll; height:450px;" class="col-md-12 right-header-contentChat">
               <?php 
                    $update_msg=mysqli_query($con, "UPDATE users_chat SET chat_status='read' WHERE sender_username='$username' AND receiver_username='$user_name'");
                
                   $sel_msg="select * from users_chat where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username') ORDER by 1 ASC";
                $run_msg =mysqli_query($con, $sel_msg);
                while($row=mysqli_fetch_array($run_msg)){
                    $sender_username=$row['sender_username'];
                     $receiver_username=$row['receiver_username'];
                    $chat_content =$row['chat_content'];
                    $chat_date =$row['chat_date'];
                    
                 ?>
                    <ul>
                        <?php
                        if ($user_name==$sender_username AND $username==$receiver_username){
                            echo"
                            <li>
                            <div class='rightside-right-chat'>
                            <span>
                            <div class='margespan'> 
                           $user_name <small> $chat_date </small></div>
                           <br>
                           <br>
                           <p>$chat_content</P></span>
                            </li>
                            ";
                        }
                        else if ($user_name==$receiver_username AND $username==$sender_username){
                            echo"
                            <li>
                            <div class='rightside-left-chat'>
                            <span>
                         $username <small> $chat_date </small>
                           <br><br>
                           <p>$chat_content</P></span>
                            </li>
                            ";
                        }
                        ?>
                    </ul>
                     
                         <?php
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 right-chat-textbox">
                <form action="" method="post">
                    <input type="text" name="chat_content" placeholder="Write your message ......">
                    <button class="btn submit" name="submit"><i class="fab fa-telegram sendicon" aria-hidden="true" name=submit></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
     </div> 
         
        <?php include_once('../general/footer.php'); ?>
          
 
      <?php
        if(isset($_POST['submit'])){
            $chat=htmlentities($_POST['chat_content']);
            if($chat == ""){
                echo"
                <div class='alert alert-danger'>
                  <strong> <center> Message was unable to send </center> </strong>
                  </div>
                  ";
                  
            }
            else if(strlen($chat) >100){
                echo"
                <div class='alert alert-danger'>
                  <strong> <center> Message is too long.Use only 100 characters.</center> </strong>
                  </div>
                  ";
            }
            else{
                $insert_chat="insert into users_chat (sender_username, receiver_username,chat_content,chat_status,chat_date) values('$user_name','$username','$chat','unread',Now())";
                $run_insert_chat = mysqli_query($con, $insert_chat);
            }
        }
      ?>
           
            
        <script>
            $('#scrolling_to_bottom').animate({
                scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight}, 1000);
        </script>
           
                         
                                                 
<!------------bootstrap js----------->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

<!------------bootstrap js----------->                   
</body>
</html>