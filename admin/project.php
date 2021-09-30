<?php
    include('componts/top.php');

    if(isset($_GET['type']) && $_GET['type']!='' && isset($_GET['id']) && $_GET['id']>0){
        $id = mysqli_escape_string($con,$_GET['id']);
        $type = mysqli_escape_string($con,$_GET['type']);
        if($type=='deactive'){
            mysqli_query($con,"UPDATE project SET status='0' WHERE id='$id'");
        }else{
            mysqli_query($con,"UPDATE project SET status='1' WHERE id='$id'");
        }

        if($type=='delete'){
            $img = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM project WHERE id='$id'"));
            unlink(SERVER_PROJECT_IMAGE.$img['images']);
            mysqli_query($con,"DELETE FROM project WHERE id='$id'");
        }
    }
    $sql = mysqli_query($con,"SELECT * FROM project");

?>
<div class="top-headding">
    <h2>Projects</h2>
    <div class="line"></div>
</div>
<div class="d-flex justify-content-end edit">
   <span class="text-light me-4"></span> <a href="add-project.php"><i class="fa fa-pencil" aria-hidden="true"></i></a>
</div>
<div class="right-leout">
    <div class="table-responsive mt-3">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Type</th>
                <th scope="col">Name</th>
                <th scope="col">images</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Languages</th>
                <th scope="col">URL</th>
                <th scope="col">Description</th>
                <th scope="col">Added On</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $i=1;
                while ($row =mysqli_fetch_assoc($sql)){
            ?>
                <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $row['type']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><img src="<?php echo SITE_PROJECT_IMAGE.$row['images']; ?>" alt="" width="80px" height="80px" alt="" class="rounded-circle"></td>
                <td><?php echo $row['start_date']; ?></td>
                <td><?php echo $row['end_date']; ?></td>
                <td><?php echo $row['language']; ?></td>
                <td><a href="<?php echo $row['url']; ?>" target="_blank"><?php echo $row['url']; ?></a></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo date("d F Y h : i : s", strtotime($row['added_on'])); ?></td>
                <td>
                <?php
                    $id_a=$row['id'];
                    if ($row['status']=='1'){
                        echo "<a href='?type=deactive&id=$id_a'><button class='btn btn-primary'>A</button></a>";
                    }else{
                        echo "<a href='?type=active&id=$id_a'><button class='btn btn-info'>D</button></a>";
                    }
                ?>
                    <a href="add-project.php?id=<?php echo $id_a; ?>"><button class="btn btn-success mt-1"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>&nbsp;
                    <a href="?type=delete&id=<?php echo $id_a ?>"><button class="btn btn-danger mt-1"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                </td>
                </tr>
                <?php $i++; } ?>
            </tbody>
            </table>
    </div>
</div>
<?php include('componts/footer.php'); ?>