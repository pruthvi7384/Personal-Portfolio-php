<?php
include("componts/top.php");
$cource_name ='';
$start_date ='';
$end_date ='';
$platforn_detailes ='';
$description ='';
$performance ='';
$mode ='';
$msg='';
$id='';
if(isset($_GET['id']) && $_GET['id']>0){
    $id=mysqli_escape_string($con,$_GET['id']);
    $sql_value = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM cources WHERE id='$id'"));
    $cource_name = $sql_value['cource_name'];
    $start_date = $sql_value['start_date'];
    $end_date = $sql_value['end_date'];
    $platforn_detailes = $sql_value['platforn_detailes'];
    $description= $sql_value['description'];
    $performance = $sql_value['performance'];
    $mode = $sql_value['mode'];
}

if(isset($_POST['add'])){
    $cource_name =mysqli_escape_string($con,$_POST['cource_name']);
    $start_date =mysqli_escape_string($con,$_POST['start_date']);
    $end_date =mysqli_escape_string($con,$_POST['End_date']);;
    $platforn_detailes =mysqli_escape_string($con,$_POST['in_details']);
    $description =mysqli_escape_string($con,$_POST['description']);
    $performance =mysqli_escape_string($con,$_POST['performance']);
    $mode =mysqli_escape_string($con,$_POST['Mode']);
    if($id==''){
        $sql_check = mysqli_query($con,"SELECT * FROM cources WHERE cource_name='$cource_name'");
        if(mysqli_num_rows($sql_check)>0){
            $msg = "Cource Already Exists";
        }else{
            mysqli_query($con,"INSERT INTO cources(cource_name,start_date,end_date,platforn_detailes,description,performance,mode,status) VALUES('$cource_name','$start_date','$end_date','$platforn_detailes','$description','$performance','$mode','1')");
            echo "<script>window.location='cources.php';</script>";
        }
    }else{
         mysqli_query($con,"UPDATE cources SET cource_name='$cource_name',start_date='$start_date',end_date='$end_date',platforn_detailes='$platforn_detailes',description='$description',performance='$performance',mode='$mode',status='1' WHERE id='$id'");
         echo "<script>window.location='cources.php';</script>";
    }
   
}
?>
<div class="top-headding">
    <h2>Add Cources</h3>
    <div class="line"></div>
</div>
<div class="right-leout">
    <div class="container P-form">
        <form method="post" action="">
            <div class="row mb-3">
                <div class="col-xl-6">
                        <label for="">Name of Cource</label>
                        <input type="text" class="form-control" name="cource_name" value="<?php echo $cource_name?>" required>
                        <?php echo "<p class='text-danger mt-3'>$msg</p>" ?>
                    </div>
                    <div class="col-xl-6">
                        <label for="">Your Performance 100 out of</label>
                        <input type="number" class="form-control" name="performance" value="<?php echo $performance?>" required>
                    </div>
            </div>
            <div class="row mb-3">
                    <div class="col-xl-6">
                        <label for="">Start Date</label>
                        <input type="date" class="form-control" name="start_date" value="<?php echo $start_date ?>" required>
                    </div>
                    <div class="col-xl-6">
                        <label for="">End Date</label>
                        <input type="date" class="form-control" name="End_date" value="<?php echo $end_date?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="">Platform Details</label>
                        <textarea class="form-control" name="in_details" rows="3" required><?php echo $platforn_detailes?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" rows="3" required><?php echo $description?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="">Mode</label>
                        <input class="form-control" name="Mode" value="<?php echo $mode?>"  required>
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