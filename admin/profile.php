<?php
    include('componts/top.php');
    $sql =mysqli_query($con,"SELECT * FROM profile");
    if(mysqli_num_rows($sql)==0){
        $msg = "Please Add Your Profile";
    }else{
        $row = mysqli_fetch_assoc($sql);
    }
?>
<div class="top-headding">
    <h2>My Profile</h2>
    <div class="line"></div>
</div>
<div class="d-flex justify-content-end edit">
   <span class="text-light me-4"><?php echo date("d F Y h : i : s", strtotime($row['added_on']));?></span> <a href="add-profile.php?id=<?php echo $row['id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
</div>
<div class="right-leout">
    <div class="row justify-content-center">
        <div class="col-xl-5 profile-card">
            <h3>Personal Details</h3>
            <ul>
                <li>Name: <span><?php echo $row['name']?></span></li>
                <li>Work: <span><?php echo $row['working1']?></span> <?php echo "&"." ".$row['working2']?></li>
                <li>Birth Date: <span><?php echo date("d F Y", strtotime($row['birthday']));   ?></span></li>
            </ul>
        </div>
        <div class="col-xl-5 profile-card">
            <h3>Countact Details</h3>
            <ul>
                <li>Email Id: <span><?php echo $row['email_id']?></span></li>
                <li>Countact Number: <span><?php echo $row['countact_number']?></span></li>
            </ul>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-5 profile-card">
            <h3>Current Graduation</h3>
            <p><?php echo $row['gradjution_current']?></p>
        </div>
        <div class="col-xl-5 profile-card">
            <h3>Address</h3>
            <p><?php echo $row['address']?></p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-10 profile-card">
            <h3>About Me</h3>
            <p><?php echo $row['about_me']?></p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-10 profile-card">
            <h3>Biography</h3>
            <p>
            <?php echo $row['biography']?></p>
        </div>
        <div class="col-xl-10 profile-card">
            <h3>Summary</h3>
            <p>
            <?php echo $row['summary']?></p>
        </div>
    </div>
</div>
<?php include('componts/footer.php');?>