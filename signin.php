<!DOCTYPE html>
<html lang="en">
<head>

    <title> Fairy Place for Message</title>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
  <link rel="stylesheet" href="css/style.css">
  
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <!----------font awesome--------------->
   
   <script src="https://kit.fontawesome.com/c8e4d183c2.js"  ></script>
   
   <!----------font awesome--------------->
   <!-------favicon------------------------------>
	<link rel="shortcut icon" type="image/x-icon" href="img/fav.png" />
	<!------- end favicon------------------------------>
   
<link href="https://fonts.googleapis.com/css2?family=Courgette&family=Pacifico&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
   <!------------bootstrap css----------->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <!------------bootstrap css----------->
</head>
<body>

<div class="signin-form">
  <div class="img">
      <img class="chatpic" src="img/chat.png" alt="Chat image" width="500" height="400">
  </div>
  <div class="inputform">
   <form action="general/signin_user.php" method="POST" autocomplete="off">
       <div class="form-header">
           <h1>sign in</h1>
           <p class="small">don't have an account?<a href="signup.php">create your account</a></p>
       </div>
       <div class="form-group user">
          
           <i class="fas fa-user icon" ></i>
           <input type="name" class="form-control" name="username" placeholder="Enter Your UserName " required>
       </div>
       <div class="form-group pass">
            <i class="fas fa-lock icon"></i>
           <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required>
       </div>
        <div class="small frgtpass"><a href="">Forgot password?</a></div>
       
       
           <button class="butn" type="submit"  name="signin">
             sign in  
           </button>
          
       
   </form>
   </div>
    
</div> 
            <?php include_once('general/footer.php'); ?>
      
     
        
            
                
<!------------bootstrap js----------->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

<!------------bootstrap js----------->
                        
</body>
</html>