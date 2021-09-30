<?php
    include('componts/top.php');
   $name ='';
   $working1 ='';
   $working2 ='';
   $birthday ='';
   $email_id ='';
   $countact_number ='';
   $linkdin_link ='';
   $github_link ='';
   $facebook_link ='';
   $Instagram_link ='';
   $twitter_link ='';
   $gradjution_current ='';
   $address ='';
   $about_me ='';
   $biography ='';
   $summary ='';
   $msg ='';
   $image_error='';
   $id_e ='';
   $image_status='required';
    if(isset($_GET['id']) && $_GET['id']!=''){
        $id_e = mysqli_escape_string($con,$_GET['id']);
        $e_sql = mysqli_query($con,"SELECT * FROM profile WHERE id ='$id_e'");
        $result_sql = mysqli_fetch_assoc($e_sql);
        $image_status='';
    }

   if(isset($_POST['submit'])){
        $name =mysqli_escape_string($con,$_POST['name']);
        $working1 =mysqli_escape_string($con,$_POST['work1']);
        $working2 =mysqli_escape_string($con,$_POST['work2']);
        $birthday =mysqli_escape_string($con,$_POST['birth']);
        $email_id =mysqli_escape_string($con,$_POST['email']);
        $countact_number =mysqli_escape_string($con,$_POST['number']);
        $linkdin_link =mysqli_escape_string($con,$_POST['linkedin']);
        $github_link =mysqli_escape_string($con,$_POST['github']);
        $facebook_link =mysqli_escape_string($con,$_POST['facebook']);
        $Instagram_link =mysqli_escape_string($con,$_POST['instagram']);
        $twitter_link =mysqli_escape_string($con,$_POST['twitter']);
        $gradjution_current =mysqli_escape_string($con,$_POST['degree']);
        $address =mysqli_escape_string($con,$_POST['address']);
        $about_me =mysqli_escape_string($con,$_POST['about']);
        $biography =mysqli_escape_string($con,$_POST['Bio']);
        $summary =mysqli_escape_string($con,$_POST['summary']);
        $sql_fetch = mysqli_query($con,"SELECT * FROM profile");
        if(mysqli_num_rows($sql_fetch)==1){
            if($id_e==''){
                $type=$_FILES['image']['type'];
                if($type!='image/jpeg' && $type!='image/png'){
                    $image_error="Invalid image format";
                }else{
                $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],SERVER_PROFILE_IMAGE.$image);
                $sql = "INSERT INTO profile(name,image,working1,working2,birthday,email_id,countact_number,linkdin_link,github_link,facebook_link,Instagram_link,twitter_link,gradjution_current,address,about_me,biography,summary) VALUES('$name','$image','$working1','$working2','$birthday','$email_id','$countact_number','$linkdin_link','$github_link','$facebook_link','$Instagram_link','$twitter_link','$gradjution_current','$address','$about_me','$biography','$summary')";
                $query = mysqli_query($con,$sql);
                echo "<script>window.location='profile.php';</script>";
                }
            }else{
                if($_FILES['image']['type']==''){
                    mysqli_query($con,"UPDATE profile SET name='$name',working1='$working1',working2='$working2',birthday='$birthday',email_id='$email_id',countact_number='$countact_number',linkdin_link='$linkdin_link',github_link='$github_link',facebook_link='$facebook_link',Instagram_link='$Instagram_link',twitter_link='$twitter_link',gradjution_current='$gradjution_current',address='$address',about_me='$about_me',biography='$biography',summary='$summary'");
                    echo "<script>window.location='profile.php';</script>";
                }else{
                    $img = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM profile WHERE id='$id_e'"));
                    unlink(SERVER_PROFILE_IMAGE.$img['image']);
                    $type=$_FILES['image']['type'];
                    if($type!='image/jpeg' && $type!='image/png'){
                        $image_error="Invalid image format";
                    }else{
                    $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'],SERVER_PROFILE_IMAGE.$image);
                    mysqli_query($con,"UPDATE profile SET name='$name',image='$image',working1='$working1',working2='$working2',birthday='$birthday',email_id='$email_id',countact_number='$countact_number',linkdin_link='$linkdin_link',github_link='$github_link',facebook_link='$facebook_link',Instagram_link='$Instagram_link',twitter_link='$twitter_link',gradjution_current='$gradjution_current',address='$address',about_me='$about_me',biography='$biography',summary='$summary'");
                    echo "<script>window.location='profile.php';</script>";
                    }
                }
            }
           
        }else{
            $msg = "You Are Alrady Added Your Profile";
        }
    }
?>
<div class="top-headding">
    <h2>Add Profile</h3>
    <div class="line"></div>
</div>
<?php echo"<p class='text-danger mt-3 text-center'>$msg</>" ?>
<div class="right-leout">
    <div class="container P-form">
        <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-xl-6">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $result_sql['name'] ?>" required>
                </div>
                <div class="col-xl-6">
                        <label for="">Profile Picture</label>
                        <input type="file" class="form-control" name="image" value="" <?php echo  $image_status; ?>>
                        <?php echo "<p class='text-light mt-3'>$image_error</p>" ?>
                </div>
            </div>
            <div class="row mb-3">
                    <div class="col-xl-4">
                        <label for="">Birth Date</label>
                        <input type="date" class="form-control" name="birth" value="<?php echo $result_sql['birthday'] ?>" required>
                    </div>
                    <div class="col-xl-4">
                        <label for="">Email Id</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $result_sql['email_id'] ?>" required>
                    </div>
                    <div class="col-xl-4">
                        <label for="">Cuntact Number</label>
                        <input type="number" value="<?php echo $result_sql['countact_number'] ?>" class="form-control" name="number" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-4">
                        <label for="">Linked In <span><i class="fa fa-link" aria-hidden="true"></i></span></label>
                        <input type="text" value="<?php echo $result_sql['linkdin_link'] ?>" class="form-control" name="linkedin">
                    </div>
                    <div class="col-xl-4">
                        <label for="">Github <span><i class="fa fa-link" aria-hidden="true"></i></span></label>
                        <input type="text" class="form-control" value="<?php echo $result_sql['github_link'] ?>" name="github" >
                    </div>
                    <div class="col-xl-4">
                        <label for="">facebook <span><i class="fa fa-link" aria-hidden="true"></i></span></label>
                        <input type="text" class="form-control" value="<?php echo $result_sql['facebook_link'] ?>" name="facebook" >
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-6">
                        <label for="">Instagram <span><i class="fa fa-link" aria-hidden="true"></i></span></label>
                        <input type="link" class="form-control" value="<?php echo $result_sql['Instagram_link'] ?>" name="instagram">
                    </div>
                    <div class="col-xl-6">
                        <label for="">Twitter <span><i class="fa fa-link" aria-hidden="true"></i></span></label>
                        <input type="text" class="form-control" value="<?php echo $result_sql['twitter_link'] ?>" name="twitter" >
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="">Address</label>
                        <textarea class="form-control" name="address"  rows="3" required>
                        <?php echo $result_sql['address'] ?>
                        </textarea>
                    </div> 
                </div>
                <div class="row mb-3">
                    <div class="col-xl-6">
                    <label for="">Working</label>
                    <input type="text" class="form-control" name="work1" value="<?php echo $result_sql['working1'] ?>" required>
                    </div>
                    <div class="col-xl-6">
                        <label for="">Working 2</label>
                        <input type="text" class="form-control" value="<?php echo $result_sql['working2'] ?>" name="work2">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="">Degree</label>
                        <input type="text" class="form-control" name="degree" value="<?php echo $result_sql['gradjution_current'] ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="">About you</label>
                        <textarea class="form-control" name="about" rows="3"  required><?php echo $result_sql['about_me'] ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="">Bio</label>
                        <textarea class="form-control" name="Bio" rows="3" required><?php echo $result_sql['biography'] ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="">Summary</label>
                        <textarea class="form-control" name="summary" rows="3" required><?php echo $result_sql['summary'] ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 d-flex justify-content-around">
                        <button class="btn" name="submit">Submit</button>
                    </div>
                </div>
        </form>
        </div>
</div>
<?php include('componts/footer.php'); ?>