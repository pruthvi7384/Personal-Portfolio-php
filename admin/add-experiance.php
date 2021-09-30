<?php
include("componts/top.php");
$working ='';
$start_date ='';
$end_date ='';
$company_name ='';
$address ='';
$description ='';
$mode ='';
$msg='';
$id='';
if(isset($_GET['id']) && $_GET['id']>0){
    $id=mysqli_escape_string($con,$_GET['id']);
    $sql_value = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM experience WHERE id='$id'"));
    $working = $sql_value['working'];
    $start_date = $sql_value['start_date'];
    $end_date = $sql_value['end_date'];
    $company_name = $sql_value['company_name'];
    $address= $sql_value['address'];
    $description = $sql_value['description'];
    $mode = $sql_value['mode'];
}

if(isset($_POST['add'])){
    $working =mysqli_escape_string($con,$_POST['working_name']);
    $start_date =mysqli_escape_string($con,$_POST['start_date']);
    $end_date =mysqli_escape_string($con,$_POST['End_date']);;
    $company_name =mysqli_escape_string($con,$_POST['name']);
    $address =mysqli_escape_string($con,$_POST['addres']);
    $description =mysqli_escape_string($con,$_POST['description']);
    $mode =mysqli_escape_string($con,$_POST['Mode']);
    if($id==''){
        $sql_check = mysqli_query($con,"SELECT * FROM experience WHERE company_name='$company_name'");
        if(mysqli_num_rows($sql_check)>0){
            $msg = "Company Name Already Exists";
        }else{
            mysqli_query($con,"INSERT INTO experience(working,start_date,end_date,company_name,address,description,mode,status) VALUES('$working','$start_date','$end_date','$company_name','$address','$description','$mode','1')");
            echo "<script>window.location='experiance.php';</script>";
        }
    }else{
         mysqli_query($con,"UPDATE experience SET working='$working',start_date='$start_date',end_date='$end_date',company_name='$company_name',address='$address',description='$description',mode='$mode',status='1' WHERE id='$id'");
         echo "<script>window.location='experiance.php';</script>";
    }
   
}
?>
<div class="top-headding">
    <h2>Add Experiance</h3>
    <div class="line"></div>
</div>
<div class="right-leout">
    <div class="container P-form">
        <form method="post" action="">
            <div class="row mb-3">
                <div class="col-xl-6">
                        <label for="">Name of Working</label>
                        <input type="text" class="form-control" name="working_name" value="<?php echo $working?>" required>
                    </div>
                    <div class="col-xl-6">
                        <label for="">Company Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $company_name?>" required>
                        <?php echo "<p class='text-danger mt-3'>$msg</p>" ?>
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
                        <label for="">Address</label>
                        <textarea class="form-control" name="addres" rows="3" required><?php echo $address ?></textarea>
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