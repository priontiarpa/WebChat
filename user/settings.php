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
    <title> Your Account </title>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
 <link rel="stylesheet" href="../css/settings.css">
 
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
<form action="#" method="POST" name="account">


	
			<?php
			$user=$_SESSION['username'];	
            $query="select * from users where username='$user'" ;
			$res=mysqli_query($con, $query);
	
			$count=mysqli_num_rows($res);
	
				while($row = mysqli_fetch_array($res))
				{
                   $user_id=$row['userId'];
				   $username=$row['username'];
                   $email=$row['email'];
				  $user_Pic=$row['userPic'];
				   
                }
			?>
			
			<div class="header-section">
			<div class="header-left">
			<h1 class="header-name">Account Settings</h1>
                </div>
                <div class="header-right">
			<a href="home.php" class="chat"  style="color:#A918AC;font-size:20px;" ><i class="fab fa-facebook-messenger icon-chat"></i> </a>
			<button class="float-right logout" style="color:#A918AC;font-size:20px;" name="logout"><i class="fas fa-sign-out-alt"></i></button></div></div>
           
                    <?php 
                      if (isset($_POST['logout'])){
                          $update_msg=mysqli_query($con, "UPDATE users SET log_in='Offline' WHERE username='$user'");
                     
                     header('location:logout.php');
                    exit(); }
                    ?>
				
			
			<div class="col-md-6 col-sm-9 col-xs-12 left-section">
			
			<table>
			<tr>
				<td>Your Username</td>
				<td><input type="text" name="username" value="<?php echo $username;?>" readonly></td>
			</tr>
               <th/>
			
			<tr>
				<td>Your Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<th/>
			
			<tr>
				<td>Current Password</td>
				<td><input type="password" name="ctpassword" value="" ></td>
			</tr>
			<th/>
			<tr>
			
				<td>New Password</td>
				<td><input type="password" name="password" value="" ></td>
			</tr>
			<th/>
			
			
			</table>
			
			
			
			<input type="submit"  name="confirm" value="CONFIRM" class="btn updatebtn">
		
	
		</div>
		</form>
		
		<div class="col-md-3 col-sm-3 col-xs-12  right-section">
           
		    <div class="profile-pic"><img src="../img/<?php echo $user_Pic ?>" width="135" height="135" alt="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp No Image Found "/>
		    
		   </div>
		   
		</div>

</div>
<?php include_once('../general/footer.php'); ?>


<?php
	
	if(isset($_POST['confirm']))
	{
		
		$email=$_POST['email'];
		
		$password=$_POST['password'];
		
		$ctpassword=$_POST['ctpassword'];
		
		
		
		if($ctpassword == "")
        {echo '<script type="text/javascript">Swal.fire({
					icon: "info",
					title: "Oops...",
					text: "Please, enter Current Password!",
					})
				</script>';}
				
				
				else
				{
					$stmt="select password from users where username='$user' ";
				    $res=mysqli_query($con, $stmt);
	
				    while($row = mysqli_fetch_array($res))
			
			        if($ctpassword==$row["password"]){
				
				
				
				     $update_query="UPDATE users SET email='$email',password='$password' WHERE username='$user'";
				
				
				$query_run= mysqli_query($con, $update_query);
		
		if($query_run)
		{
			echo '<script type="text/javascript">Swal.fire({
						icon: "success",
						title: "Data Updated!",
						showConfirmButton: false,
						timer: 1500
						})
					</script>';
		}
		else{
			echo '<script type="text/javascript">Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "Data Failed!",
					})
				</script>';
		}	
		}
		else{
			echo '<script type="text/javascript">Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "Current password does not match!",
					})
				</script>';
		}
					
					
					
				}
		
	}
	
	
?>
 
<!------------bootstrap js----------->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>	


<!------------bootstrap js----------->   

</body>
</html>