<?php
    include('componts/top.php');
    if(isset($_GET['type']) && $_GET['type']!='' && isset($_GET['id']) && $_GET['id']!=''){
        $type = mysqli_escape_string($con,$_GET['type']);
        $id = mysqli_escape_string($con,$_GET['id']);
        if($type=='delete'){
            mysqli_query($con,"DELETE FROM contact WHERE id='$id'");
            echo "<script>window.location='countact.php'</script>";
        }
    }
    $sql = mysqli_query($con,"SELECT * FROM contact");
?>
<div class="top-headding">
    <h2>Countacts</h2>
    <div class="line"></div>
</div>
<div class="right-leout">
    <div class="table-responsive mt-5">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email Id</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $i=1;
                while ($row = mysqli_fetch_assoc($sql)){
            ?>
                <tr>
                <th scope="row">1</th>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['subject']?></td>
                <td><?php echo $row['meassage']?></td>
                <td><?php echo date("d F Y h : i : s", strtotime($row['added_on'])) ?></td>
                <td>
                    <button class="btn btn-info mt-1"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button> 
                    <a href='?type=delete&id=<?php echo $row['id']?>'><button class="btn btn-danger mt-1"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                </td>
                </tr>
                <?php $i++; } ?>
            </tbody>
            </table>
    </div>
</div>

<?php include('componts/footer.php'); ?>