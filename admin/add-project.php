<?php
    include('componts/top.php');
    $order_by='';
    $type ='';
    $name ='';
    $start_date ='';
    $end_date ='';
    $language ='';
    $url ='';
    $github_url ='';
    $description ='';
    $msg='';
    $image_error='';
    $id ='';
    $image_status='required';
    if(isset($_GET['id']) && $_GET['id']>0){
        $id =mysqli_escape_string($con,$_GET['id']);
        $sql_result = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM project WHERE id='$id'"));
        $order_by =$sql_result['order_by'];
        $type =$sql_result['type'];
        $name =$sql_result['name'];
        $start_date =$sql_result['start_date'];
        $end_date =$sql_result['end_date'];
        $language =$sql_result['language'];
        $url =$sql_result['url'];
        $github_url =$sql_result['github_url'];
        $description =$sql_result['description'];
        $image_status='';
    }

    if(isset($_POST['Add'])){
        $order_by =mysqli_escape_string($con,$_POST['order_by']);
        $type =mysqli_escape_string($con,$_POST['type']);
        $name =mysqli_escape_string($con,$_POST['name']);
        $start_date =mysqli_escape_string($con,$_POST['start_date']);
        $end_date =mysqli_escape_string($con,$_POST['end_date']);
        $language =mysqli_escape_string($con,$_POST['language']);
        $url =mysqli_escape_string($con,$_POST['url']);
        $github_url =mysqli_escape_string($con,$_POST['github_url']);
        $description =mysqli_escape_string($con,$_POST['about']);

        $sql_name =mysqli_query($con,"SELECT * FROM project WHERE name='$name'");
        if($id==''){
            if(mysqli_num_rows($sql_name)>0){
                $msg = "Project name already exists";
            }else{
                if($_FILES['project_imges']['type']!='image/jpeg' && $_FILES['project_imges']['type']!='image/png'){
                    $image_error="Invalid image format";
                }else{
                    $image = rand(11111,99999).'_'.$_FILES['project_imges']['name'];
                    move_uploaded_file($_FILES['project_imges']['tmp_name'],SERVER_PROJECT_IMAGE.$image);
                    mysqli_query($con,"INSERT project(order_by,type,name,images,start_date,end_date,language,url,github_url,description,status) VALUES('$order_by','$type','$name','$image','$start_date','$end_date','$language','$url','$github_url','$description','1')");
                    echo "<script>window.location='project.php'</script>";
                }
            }
        }else{
            if($_FILES['project_imges']['type']==''){
                mysqli_query($con,"UPDATE project SET order_by='$order_by',type='$type',name='$name',start_date='$start_date',end_date='$end_date',language='$language',url='$url',github_url='$github_url',description='$description',status='1' WHERE id='$id'");
                 echo "<script>window.location='project.php'</script>";
            }else{
                $img = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM project WHERE id='$id'"));
                unlink(SERVER_PROJECT_IMAGE.$img['images']);
                if($_FILES['project_imges']['type']!='image/jpeg' && $_FILES['project_imges']['type']!='image/png'){
                    $image_error="Invalid image format";
                }else{
                $image = rand(11111,99999).'_'.$_FILES['project_imges']['name'];
                move_uploaded_file($_FILES['project_imges']['tmp_name'],SERVER_PROJECT_IMAGE.$image);
                mysqli_query($con,"UPDATE project SET order_by='$order_by', type='$type',name='$name',images='$image',start_date='$start_date',end_date='$end_date',language='$language',url='$url',github_url='$github_url',description='$description',status='1' WHERE id='$id'");
                 echo "<script>window.location='project.php'</script>";
                }
            }
        }
    }
?>
<div class="top-headding">
    <h2>Add Projects</h3>
    <div class="line"></div>
</div>
<div class="right-leout">
    <div class="container P-form">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-xl-4">
                        <label for="">Order No</label>
                        <input type="number" class="form-control" name="order_by" value="<?php echo $order_by?>"required>
                </div>
                <div class="col-xl-4">
                        <label for="">Project Type</label>
                        <input type="text" class="form-control" name="type" value="<?php echo $type?>"required>
                </div>
                <div class="col-xl-4">
                    <label for="">Project Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $name?>" required>
                    <?php echo "<p class='text-danger mt-3'>$msg</p>" ?>
            </div>
            </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="">Project Images</label>
                        <input type="file" class="form-control" name="project_imges" <?php echo $image_status; ?>>
                        <?php echo "<p class='text-danger mt-3'>$image_error</p>" ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-6">
                        <label for="">Start Date</label>
                        <input type="date" class="form-control" name="start_date" value="<?php echo $start_date ?>"required>
                    </div>
                    <div class="col-xl-6">
                        <label for="">End Date</label>
                        <input type="date" class="form-control" name="end_date" value="<?php echo $end_date ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-4">
                        <label for="">Language Uses</label>
                        <input type="text" class="form-control" name="language" value="<?php echo $language ?>" required>
                    </div>
                    <div class="col-xl-4">
                        <label for="">URL <span><i class="fa fa-link" aria-hidden="true"></i></span> </label>
                        <input type="text" class="form-control" name="url" value="<?php echo $url ?>" required>
                    </div>
                    <div class="col-xl-4">
                        <label for="">Github URL <span><i class="fa fa-link" aria-hidden="true"></i></span> </label>
                        <input type="text" class="form-control" name="github_url" value="<?php echo $github_url ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="">Description</label>
                        <textarea class="form-control" name="about" rows="3" required><?php echo $description ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 d-flex justify-content-around">
                        <button class="btn" name="Add">Add</button>
                    </div>
                </div>
        </form>
        </div>
</div>
<?php include('componts/footer.php');