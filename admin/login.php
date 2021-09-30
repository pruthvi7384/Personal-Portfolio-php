<?php
session_start();
 require('../include.inc/database.inc.php');
$msg='';
if(isset($_POST['submit'])){
	$username=mysqli_escape_string($con,$_POST['userName']);
	$password=mysqli_escape_string($con,$_POST['password']);
	
	$sql="select * from admin_users where user_name='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_assoc($res);
		$_SESSION['IS_LOGIN']='yes';
		$_SESSION['ADMIN_USER']=$row['name'];
		header('Location:index.php');
	}else{
		$msg="Please Enter valid login Details other wise click forgot password";
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Admin</title>
    <link href="../assets/icon.svg" rel="icon" type="image/x-icon" />
    <!-- FontAwsome CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Fira+Sans:ital@0;1&family=Poppins:ital@0;1&display=swap" rel="stylesheet">
    <!-- Boostrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- External Style Sheet -->
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="login-container">
        <img src="../assets/login-banner/login.jpg" alt="">
    </div>
    <div class="login-body">
        <div class="row">
            <h1>Welcome!</h1>
            <h2>Portfolio Management System</h2>
        </div>
        <?php echo "<p class='text-danger text-center'>$msg</p>" ?>
        <div class="row d-flex justify-content-around">
            <div class="col-xl-6">
              <form method="post" action="">
                  <div>
                    <label for="">User Name</label>
                    <input type="text" class="form-control" name="userName" required>
                  </div>
                  <div>
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" required>
                  </div>
                  <div>
                      <button class="btn" name="submit">Login</button>
                      <a href="#">Forgot Password.</a>
                  </div>
              </form>
            </div>
        </div>
    </div>
    <!--Jquery CDN-->
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <!-- Boostrap Js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <!-- External JS -->
    <script src="js/script.js"></script>
</body>
</html>