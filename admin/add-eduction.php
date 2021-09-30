<?php
 include('componts/top.php');
 $cource_name='';
 $start_date='';
 $end_date='';
 $institute_detailes='';
 $description='';
 $msg='';
$id='';
 if(isset($_GET['id'])&& $_GET['id']!=''){
    $id = mysqli_escape_string($con,$_GET['id']);
    $sql_e = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM education WHERE id='$id'"));
    $cource_name=$sql_e['cource_name'];
    $start_date=$sql_e['start_date'];
    $end_date=$sql_e['end_date'];
    $institute_detailes=$sql_e['institute_detailes'];
    $description=$sql_e['description'];
    
 }
 if(isset($_POST['add'])){
    $cource_name=mysqli_escape_string($con,$_POST['cource_name']);
    $start_date =mysqli_escape_string($con,$_POST['start_date']);
    $end_date =mysqli_escape_string($con,$_POST['End_date']);
    $institute_detailes=mysqli_escape_string($con,$_POST['in_details']);
    $description= mysqli_escape_string($con,$_POST['description']);

    if($id == ''){
        $sql = mysqli_query($con,"SELECT * FROM education WHERE cource_name='$cource_name'");
        if(mysqli_num_rows($sql)>0){
            $msg="Cource Alredy Added";
        }else{
            mysqli_query($con,"INSERT INTO education(cource_name,start_date,end_date,institute_detailes,description,status) VALUES('$cource_name','$start_date','$end_date','$institute_detailes','$description','1')");
            echo "<script>window.location='education.php';</script>";
        }
    }else{
        mysqli_query($con,"UPDATE education SET cource_name='$cource_name',start_date='$start_date',end_date='$end_date',institute_detailes='$institute_detailes',description='$description',status='1' WHERE id='$id'");
        echo "<script>window.location='education.php';</script>";
    }
    
 }
?>
<div class="top-headding">
    <h2>Add Education</h3>
    <div class="line"></div>
</div>
<div class="right-leout">
    <div class="container P-form">
        <form method="post" action="">
            <div class="row mb-3">
                <div class="col-xl-12">
                        <label for="">Cource Name</label>
                        <input type="text" class="form-control" name="cource_name" value="<?php echo $cource_name ?>" required>
                        <?php echo "<p class='text-danger mt-2'>$msg</p>" ?>
                    </div>
            </div>
            <div class="row mb-3">
                    <div class="col-xl-6">
                        <label for="">Start Date</label>
                        <input type="date" class="form-control" name="start_date" value="<?php echo $start_date ?>" required>
                    </div>
                    <div class="col-xl-6">
                        <label for="">End Date</label>
                        <input type="date" class="form-control" name="End_date" value="<?php echo $end_date; ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="">Instructions Details</label>
                        <textarea class="form-control" name="in_details" rows="3" required><?php echo $institute_detailes; ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="">Cource Description</label>
                        <textarea class="form-control" name="description" rows="3" required><?php echo $description;?></textarea>
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
<?php include('componts/footer.php'); ?>