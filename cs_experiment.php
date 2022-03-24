<?php
  include 'top.php';
  if(isset($_GET['id']) && $_GET['id']>0){
    $id=mysqli_escape_string($con,$_GET['id']);
    $cs_experiment = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM cs WHERE id = '$id'"));
  }
?>

  <main id="main">
    <!-- ======= Portfolio Details ======= -->
    <div id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
           <h1 class="portfolio-title text-center mb-5"><span style="color: #18d26e;">Cyber Security ~</span> <?php echo $cs_experiment['name']; ?></h1>
           <?php echo $cs_experiment['content']; ?>
          </div>
        </div>
      </div>
    </div><!-- End Portfolio Details -->
  </main><!-- End #main -->

  <?php include "footer.php"?>