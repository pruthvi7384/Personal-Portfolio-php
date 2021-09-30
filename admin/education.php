<?php
    include('componts/top.php');
    if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
        $type = mysqli_escape_string($con,$_GET['type']);
        $id= mysqli_escape_string($con,$_GET['id']);
        if($type=='deactive'){
            mysqli_query($con,"UPDATE education SET status='0' WHERE id='$id'");
        }else{
            mysqli_query($con,"UPDATE education SET status='1' WHERE id='$id'");
        }

        if($type=='delete'){
            mysqli_query($con,"DELETE FROM education WHERE id='$id'");
        }
    }
    $sql = mysqli_query($con,"SELECT * FROM education");
?>
<div class="top-headding">
    <h2>Education</h2>
    <div class="line"></div>
</div>
<div class="d-flex justify-content-end edit">
   <span class="text-light me-4"></span> <a href="add-eduction.php"><i class="fa fa-pencil" aria-hidden="true"></i></a>
</div>
<div class="right-leout">
    <div class="table-responsive mt-3">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Course Name</th>
                <th scope="col">Start Year</th>
                <th scope="col">End Year</th>
                <th scope="col">Institution Details</th>
                <th scope="col">Description</th>
                <th scope="col">Added On</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $i=1;
                while ($row = mysqli_fetch_array($sql)){
            ?>
                <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $row['cource_name']; ?></td>
                <td><?php echo date("Y", strtotime($row['start_date'])) ?></td>
                <td><?php echo date("Y", strtotime($row['end_date'])) ?></td>
                <td><?php echo $row['institute_detailes']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo date("d F Y h : i : s", strtotime($row['added_on'])) ?></td>
                <td>
                <?php
                    $id_a = $row['id'];
                    if($row['status'] =='1'){
                        echo "<a href='?type=deactive&id=$id_a'><button class='btn btn-primary'>A</button></a>";
                    }else{
                        echo "<a href='?type=active&id=$id_a'><button class='btn btn-info'>D</button></a>";
                    }
                    
                ?>   
                    <a href="add-eduction.php?id=<?php echo $row['id'] ?>"><button class="btn btn-success mt-1"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                    <a href='?type=delete&id=<?php echo $id_a ?>'><button class="btn btn-danger mt-1"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                    
                </td>
                </tr>
                <?php $i++; } ?>
            </tbody>
            </table>
    </div>
</div>
<?php include('componts/footer.php'); ?>