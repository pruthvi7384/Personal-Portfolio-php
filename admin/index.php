<?php
 include('componts/top.php');
 $institution = mysqli_num_rows(mysqli_query($con,"SELECT * FROM education"));
 if($institution<10){
    $institution = "0$institution";
 }else{
    $institution=$institution;
 }

$cources = mysqli_num_rows(mysqli_query($con,"SELECT * FROM cources"));
if($cources<10){
    $cources = "0$cources";
}else{
    $cources=$cources;
}

$project = mysqli_num_rows(mysqli_query($con,"SELECT * FROM project"));
if($project<10){
    $project = "0$project";
}else{
    $project=$project;
}

$certificate = mysqli_num_rows(mysqli_query($con,"SELECT * FROM certificate"));
if($certificate<10){
    $certificate = "0$certificate";
}else{
    $certificate=$certificate;
}

$contact = mysqli_num_rows(mysqli_query($con,"SELECT * FROM contact"));
if($contact<10){
    $contact="0$contact";
}else{
    $contact=$contact;
}

$internship = mysqli_num_rows(mysqli_query($con,"SELECT * FROM certificate WHERE type ='Internship'"));
if($internship<10){
    $internship = "0$internship";
}else{
    $internship = $internship;
}
?>
    <div class="top-headding">
        <h2>My Dashboard</h2>
        <div class="line"></div>
    </div>
    <div class="right-leout mt-3">
        <div class="row justify-content-center">
            <div class="col-xl-5 dashboard-card">
                <h3>Total Institution</h3>
                <p><?php echo  $institution; ?></p>
            </div>
            <div class="col-xl-5 dashboard-card">
                <h3>Total Courses</h3>
                <p><?php echo $cources; ?></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-5 dashboard-card">
                <h3>Total Internships</h3>
                <p><?php echo $internship; ?></p>
            </div>
            <div class="col-xl-5 dashboard-card">
                <h3>Total Projects</h3>
                <p><?php echo $project?></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-5 dashboard-card">
                <h3>Total Certificates</h3>
                <p><?php echo $certificate?></p>
            </div>
            <div class="col-xl-5 dashboard-card">
                <h3>Countact</h3>
                <p><?php echo $contact?></p>
            </div>
        </div>
    </div>
<?php include('componts/footer.php');