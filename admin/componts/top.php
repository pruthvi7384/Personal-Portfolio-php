<?php
    session_start();
    require('../include.inc/database.inc.php');
    include('../include.inc/constant.php');
    if(!isset($_SESSION['IS_LOGIN'])){
        header('Location:login.php');
    }
    $sql = mysqli_query($con,"SELECT * FROM profile");
    $res = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME_ADMIN; ?></title>
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
    <!-- top bar -->
    <div class="top-nav">
            <div class="top">
                <h3>Welcome!<span> <?php echo $_SESSION['ADMIN_USER']; ?></span></h3>
                <p class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></p>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="componts/logout.php">Logout</a></li>
                  </ul>
            </div>
    </div>
    <!-- X-top bar-X -->
    <div class="wrapper">
        <!--Left side bar-->
            <div class="left-side-bar">
                <div class="profile-img text-center">
                    <img src="<?php echo SITE_PROFILE_IMAGE.$res['image'] ?>" class="img-fluid" alt="">
                    <h2 class="text-capitalize"><?php echo $res['name']?></h2>
                    <ul>
                        <li><a href="<?php echo $res['facebook_link']?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo $res['Instagram_link']?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo $res['twitter_link']?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo $res['linkdin_link']?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo $res['github_link']?>" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a></li>
                     </ul>
                </div>
                <div class="menu">
                    <ul>
                        <li>
                            <a href="index.php"><span><i class="fa fa-th-large" aria-hidden="true"></i></span> Dashboard</a>
                        </li>
                        <li>
                            <a href="profile.php"><span><i class="fa fa-user" aria-hidden="true"></i></span> Profile</a>
                        </li>
                        <li>
                            <a href="education.php"><span><i class="fa fa-graduation-cap" aria-hidden="true"></i></span> Education</a>
                        </li>
                        <li>
                            <a href="experiance.php"><span><i class="fa fa-briefcase" aria-hidden="true"></i></span> Experiance</a>
                        </li>
                        <li>
                            <a href="cources.php"><span><i class="fa fa-desktop" aria-hidden="true"></i></span> Courses</a>
                        </li>
                        <li>
                            <a href="certificate.php"><span><i class="fa fa-certificate" aria-hidden="true"></i></span> Certificates</a>
                        </li>
                        <li>
                            <a href="project.php"><span><i class="fa fa-code" aria-hidden="true"></i></span> Projects</a>
                        </li>
                        <li>
                            <a href="countact.php"><span><i class="fa fa-commenting" aria-hidden="true"></i></span> Contacts</a>
                        </li>
                        <li>
                            <a href="cs_experiments.php"><span><i class="fa fa-lock" aria-hidden="true"></i></span> Cyber Security</a>
                        </li>
                    </ul>
                </div>
            </div>
        <!--x-Left side bar-x-->

        <!--Right side bar-->
            <div class="right-side-bar">
