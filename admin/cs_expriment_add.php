<?php
include("componts/top.php");
$name ='';
$aim = '';
$content = '';
$start_date ='';
$end_date ='';
$order_no = '';
$msg='';
$id='';
if(isset($_GET['id']) && $_GET['id']>0){
    $id=mysqli_escape_string($con,$_GET['id']);
    $sql_value = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM cs WHERE id='$id'"));
    $name = $sql_value['name'];
    $order_no = $sql_value['order_no'];
    $aim = $sql_value['aim'];
    $start_date = $sql_value['start_date'];
    $end_date = $sql_value['end_date'];
    $content = $sql_value['content'];
}

if(isset($_POST['add'])){
    $order_no = mysqli_escape_string($con,$_POST['order_no']);
    $name =mysqli_escape_string($con,$_POST['name']);
    $aim =mysqli_escape_string($con,$_POST['aim']);
    $start_date =mysqli_escape_string($con,$_POST['start_date']);
    $end_date =mysqli_escape_string($con,$_POST['end_date']);;
    $content =mysqli_escape_string($con,$_POST['content']);
    if($id==''){
        $sql_check = mysqli_query($con,"SELECT * FROM cs WHERE name='$name'");
        if(mysqli_num_rows($sql_check)>0){
            $msg = "Experiment Already Exists";
        }else{
            mysqli_query($con,"INSERT INTO cs(order_no,name,aim,start_date,end_date,content,status) VALUES('$order_no','$name','$aim','$start_date','$end_date','$content','1')");
            echo "<script>window.location='cs_experiments.php';</script>";
        }
    }else{
         mysqli_query($con,"UPDATE cs SET order_no='$order_no',name='$name',aim='$aim',start_date='$start_date',end_date='$end_date',content='$content', status='1' WHERE id='$id'");
         echo "<script>window.location='cs_experiments.php';</script>";
    }
   
}
?>
<div class="top-headding">
    <h2>Add Experiment</h3>
    <div class="line"></div>
</div>
<div class="right-leout">
    <div class="container P-form">
        <form method="post" action="">
            <div class="row mb-3">
                <div class="col-xl-6">
                        <label for="">Name of Experiment</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $name?>" required>
                        <?php echo "<p class='text-danger mt-3'>$msg</p>" ?>
                    </div>
                    <div class="col-xl-6">
                        <label for="">Aim</label>
                        <input type="text" class="form-control" name="aim" value="<?php echo $aim?>" required>
                    </div>
            </div>
            <div class="row mb-3">
                    <div class="col-xl-4">
                        <label for="">Order NO</label>
                        <input type="number" class="form-control" name="order_no" value="<?php echo $order_no ?>" required>
                    </div>
                    <div class="col-xl-4">
                        <label for="">Start Date</label>
                        <input type="date" class="form-control" name="start_date" value="<?php echo $start_date ?>" required>
                    </div>
                    <div class="col-xl-4">
                        <label for="">End Date</label>
                        <input type="date" class="form-control" name="end_date" value="<?php echo $end_date?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="">Experiment Details</label>
                        <textarea class="form-control" name="content" id="experimant_detailes" rows="3" required><?php echo $content ?></textarea>
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