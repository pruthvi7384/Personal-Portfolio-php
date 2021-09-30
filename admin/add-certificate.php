<?php
    include('componts/top.php');
    $typee = '';
    $name='';
    $description='';
    $msg='';
    $id ='';
    $image_error='';
    $image_status='required';
    if(isset($_GET['id']) && $_GET['id']>0){
        $id = mysqli_escape_string($con,$_GET['id']);
        $sql_result = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM certificate WHERE id='$id'"));
        $name=$sql_result['name'];
        $description=$sql_result['description'];
        $typee = $sql_result['type'];
        $image_status='';
    }

    if(isset($_POST['add'])){
        $name=mysqli_escape_string($con,$_POST['name']);
        $description=mysqli_escape_string($con,$_POST['description']);
        $typee = mysqli_escape_string($con,$_POST['type']);
         
        if($id==''){
            $sql = mysqli_query($con,"SELECT * FROM certificate WHERE name ='$name'");
            if(mysqli_num_rows($sql)>0){
                $msg = "Certificate name Alredy exists";
            }else{ 
                $type=$_FILES['certificate']['type'];
                if($type!='image/jpeg' && $type!='image/png'){
                    $image_error="Invalid image format";
                }else{
                    $image = rand(111111,999999).'_'.$_FILES['certificate']['name'];
                    move_uploaded_file($_FILES['certificate']['tmp_name'],SERVER_CERTIFICATE_IMAGE.$image);
                    mysqli_query($con,"INSERT INTO certificate(type,name,certificate,description,status) VALUES('$typee','$name','$image','$description','1')");
                    echo "<script>window.location='certificate.php'</script>";
                }
            }
        }else{ 
            if($_FILES['certificate']['type']==''){
                mysqli_query($con,"UPDATE certificate SET type='$typee',name='$name',description='$description',status='1' WHERE id='$id'");
                echo "<script>window.location='certificate.php'</script>";
            }else{
                $type=$_FILES['certificate']['type'];
                if($type!='image/jpeg' && $type!='image/png' ){
                    $image_error="Invalid image format";
                }else{
                    $img = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM certificate WHERE id='$id'"));
                    unlink(SERVER_CERTIFICATE_IMAGE.$img['certificate']);
                    $image = rand(111111,999999).'_'.$_FILES['certificate']['name'];
                    move_uploaded_file($_FILES['certificate']['tmp_name'],SERVER_CERTIFICATE_IMAGE.$image);
                    mysqli_query($con,"UPDATE certificate SET type='$typee',name='$name',certificate='$image',description='$description',status='1' WHERE id='$id'");
                    echo "<script>window.location='certificate.php'</script>";
                }
            }
        }
    }
?>
<div class="top-headding">
    <h2>Add Certificate</h3>
    <div class="line"></div>
</div>
<div class="right-leout">
    <div class="container P-form">
        <form method="post" action="" enctype="multipart/form-data">
            <p class='text-danger mt-3'>Make Shure Check Speling Of Type <b>Internship || Traning.</b></p>
            <div class="row mb-3">
                <div class="col-xl-6">
                        <label for="">Type</label>
                        <input type="text" class="form-control" placeholder="ex:Internship || Traning" name="type" value="<?php echo $typee; ?>" required>
                </div>
                <div class="col-xl-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
                        <?php echo "<p class='text-danger mt-3'>$msg</p>"; ?>
                </div>
            </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="">Certificate</label>
                        <input type="file" class="form-control" name="certificate" <?php $image_status; ?>>
                        <?php echo "<p class='text-danger mt-3'>$image_error</p>"; ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" rows="3" required><?php echo $description?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 d-flex justify-content-around">
                        <button class="btn" name="add">Add</button>
                    </div>
                </div>
        </form>
        </div>
</div>
<?php include('componts/footer.php');