<?php
  include 'top.php';
  if(isset($_GET['id']) && $_GET['id']>0){
    $id=mysqli_escape_string($con,$_GET['id']);
    $project_details = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM project WHERE id = '$id'"));
  }
?>

  <main id="main">

    <!-- ======= Portfolio Details ======= -->
    <div id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row">
        
          <div class="col-lg-8">
           <h2 class="portfolio-title">Project Details</h2>

            <div class="portfolio-details-slider swiper-container">
                  <img src="<?php echo SITE_PROJECT_IMAGE.$project_details['images'] ?>" alt="" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-4 portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong>: <?php echo $project_details['type'];?></li>
              <li><strong>Project Name</strong>: <?php echo $project_details['name'];?></li>
              <li><strong>Project Start date</strong>: <?php echo date("d F Y",strtotime($project_details['start_date'])); ?></li>
              <li><strong>Project End date</strong>: <?php echo date("d F Y",strtotime($project_details['end_date'])); ?></li>
              <li><strong>Project Name</strong>: <?php echo $project_details['language'];?></li>
              <li><strong>Project URL</strong>: <a href="<?php echo $project_details['url'];?>" target="_blank"> <?php echo $project_details['url'];?></a></li>
            </ul>

            <p>
              <?php echo $project_details['description']; ?>
            </p>
          </div>

        </div>

      </div>
    </div><!-- End Portfolio Details -->

  </main><!-- End #main -->

  <?php include "footer.php"?>