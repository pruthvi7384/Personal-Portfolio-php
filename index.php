<?php
    include('top.php');
    $msg ='';
    $name = '';
    $email ='';
    $subject = '';
    $message = '';
    if(isset($_POST['submit'])){
      $name = mysqli_escape_string($con,$_POST['name']);
      $email = mysqli_escape_string($con,$_POST['email']);
      $subject = mysqli_escape_string($con,$_POST['subject']);
      $message = mysqli_escape_string($con,$_POST['message']);
      mysqli_query($con,"INSERT INTO contact(name,email,subject,meassage) VALUES('$name','$email','$subject','$message')");
      $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Your Data Sussesfuly Submited !!</strong> 
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    $sql_profile = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM profile"));
    // ===========Age Calculate Here===========
    $birth_date = $sql_profile['birthday'];
    $dob = new DateTime($birth_date);
    $now = new DateTime();
    $difference = $now->diff($dob);
    $age = $difference->y;

    $internship = mysqli_num_rows(mysqli_query($con,"SELECT * FROM certificate WHERE type ='Internship' AND status = '1'"));

    $institution = mysqli_num_rows(mysqli_query($con,"SELECT * FROM education WHERE status = '1'"));

    $project = mysqli_num_rows(mysqli_query($con,"SELECT * FROM project WHERE status='1'"));
    
    $certificate = mysqli_num_rows(mysqli_query($con,"SELECT * FROM certificate WHERE status = '1'"));

    $cources = mysqli_query($con,"SELECT * FROM cources WHERE status = '1'");

    $eduction = mysqli_query($con,"SELECT * FROM education WHERE status = '1'");

    $experience = mysqli_query($con,"SELECT * FROM experience WHERE status = '1'");

    $projects = mysqli_query($con,"SELECT * FROM project WHERE status = '1'");

    $cs_exp = mysqli_query($con,"SELECT * FROM cs WHERE status = '1' order by order_no");
    
    $certifi = mysqli_query($con,"SELECT * FROM certificate WHERE status = '1'");

?>

  <!-- ======= Header ======= -->
  <?php echo $msg; ?>
  
  <header id="header">
  
    <div class="container">

      <h1><a href="index.php"><?php echo $sql_profile['name']?></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      <h2>I'm a passionate <span><?php echo $sql_profile['working1'];?></span></h2>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link active" href="#header">Home</a></li>
          <li><a class="nav-link" href="#about">About</a></li>
          <li><a class="nav-link" href="#resume">Resume</a></li>
          <li><a class="nav-link" href="#services">Certificates</a></li>
          <li><a class="nav-link" href="#portfolio">Projects</a></li>
          <li><a class="nav-link" href="#cybersecurity">Cyber Security</a></li>
          <li><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="social-links">
        <a href="<?php echo $sql_profile['twitter_link'];?>" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="<?php echo $sql_profile['facebook_link'];?>" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="<?php echo $sql_profile['Instagram_link'];?>" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="<?php echo $sql_profile['linkdin_link'];?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
        <a href="<?php echo $sql_profile['github_link'];?>" class="linkedin"><i class="bi bi-github"></i></a>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <!-- ======= About Me ======= -->
    <div class="about-me container">

      <div class="section-title">
        <h2>About</h2>
        <p>Learn more about me</p>
      </div>

      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          <img src="<?php echo SITE_PROFILE_IMAGE.$sql_profile['image'] ?>" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3 style="font-size: 30px;">Hello ! am <span style="font-size: 35px;"><?php echo $sql_profile['name'] ?></span>.</h3>
          <h3><span><?php echo $sql_profile['working1']; ?></span>.</h3>
          <p class="fst-italic">
           <?php echo $sql_profile['about_me'];?>
          </p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?php echo date("d F Y",strtotime($sql_profile['birthday']));?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?php echo $sql_profile['countact_number'];?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span><?php echo $sql_profile['address'];?></span></li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?php echo  $age ?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span><?php echo $sql_profile['gradjution_current'];?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Emailone:</strong> <span><?php echo $sql_profile['email_id'];?></span></li>
              </ul>
            </div>
          </div>
          <p>
          <?php echo $sql_profile['biography'];?>
          </p>
        </div>
      </div>

    </div><!-- End About Me -->

    <!-- ======= Counts ======= -->
    <div class="counts container">

      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-emoji-smile"></i>
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $certificate?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Certificates</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
          <div class="count-box">
            <i class="bi bi-journal-richtext"></i>
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $project; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Projects</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-headset"></i>
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $internship?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Internships</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-award"></i>
            <span data-purecounter-start="0" data-purecounter-end="<?php echo  $institution; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Orgnization</p>
          </div>
        </div>

      </div>

    </div><!-- End Counts -->

    <!-- ======= Skills  ======= -->
    <div class="skills container">

      <div class="section-title">
        <h2>Skills</h2>
      </div>

      <div class="row skills-content">
      <?php
            while($row = mysqli_fetch_assoc($cources)){
        ?>
        <div class="col-lg-6">
          <div class="progress">
            <span class="skill"><?php echo $row['cource_name'];?> <i class="val"><?php echo $row['performance'];?></i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $row['performance'];?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>

    </div><!-- End Skills -->

  </section><!-- End About Section -->

  <!-- ======= Resume Section ======= -->
  <section id="resume" class="resume">
    <div class="container">

      <div class="section-title">
        <h2>Resume</h2>
        <p>Check My Resume</p>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <h3 class="resume-title">Sumary</h3>
          <div class="resume-item pb-0">
            <h4><?php echo $sql_profile['name']; ?></h4>
            <p><em><?php echo $sql_profile['summary']; ?></em></p>
            <p>
            <ul>
              <li><?php echo $sql_profile['address']; ?></li>
              <li><?php echo $sql_profile['countact_number']; ?></li>
              <li><?php echo $sql_profile['email_id']; ?></li>
            </ul>
            </p>
          </div>
        </div>
      </div>  
      <div class="row">
        <div class="col-lg-6">
          <h3 class="resume-title">Education</h3>
          <?php while($edu = mysqli_fetch_assoc($eduction)) {?>
          <div class="resume-item">
            <h4><?php echo $edu['cource_name'];?></h4>
            <h5><span><?php echo date("Y", strtotime($edu['start_date'])); ?></span> - <span><?php echo date("Y", strtotime($edu['end_date'])); ?></span></h5>
            <p><em><?php echo $edu['institute_detailes'];?></em></p>
            <p><?php echo $edu['description'];?></p>
          </div>
          <?php } ?>
        </div>
         
        <div class="col-lg-6">
          <h3 class="resume-title">Past Experience</h3>
          <?php while($exp = mysqli_fetch_assoc($experience)){?>
          <div class="resume-item">
            <h4><?php echo $exp['working'];?></h4>
            <h5><span><?php echo date("d F Y",strtotime($exp['start_date']));?></span> - <span><?php echo date("d F Y",strtotime($exp['end_date']));?></span></h5>
            <p><em><?php echo $exp['company_name'];?></em></p>
            <p><em><?php echo $exp['address'];?></em></p>
            <p>
            <?php echo $exp['description']; ?>
            </p>
          </div>
          <?php }?>
        </div>
      </div>

    </div>
  </section><!-- End Resume Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Certificates</h2>
        <p>My Certificates</p>
      </div>

      <div class="row portfolio-container">
            <?php while($cer = mysqli_fetch_assoc($certifi)){?>
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="<?php echo SITE_CERTIFICATE_IMAGE.$cer['certificate']; ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?php echo $cer['name']?></h4>
              <p><?php echo $cer['type']?></p>
              <div class="portfolio-links">
                <a href="<?php echo SITE_CERTIFICATE_IMAGE.$cer['certificate']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Certificates Gallery"><i class="bx bx-plus"></i></a>
                <a href="certificate-details.php?id=<?php echo $cer['id'] ?>" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox" title="Certificates Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>
       <?php } ?>
      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Projects</h2>
        <p>My Project</p>
      </div>

      <div class="row portfolio-container">
        <?php while($pro = mysqli_fetch_assoc($projects)){?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?php echo SITE_PROJECT_IMAGE.$pro['images'];?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?php echo $pro['name'];?></h4>
                <p><?php echo $pro['type'];?></p>
                <div class="portfolio-links">
                  <a href='<?php echo $pro['url'] ?>' target='_blank' title="Live Preview" ><i class="bx bx-link"></i></a>
                  <a href="project-detailes.php?id=<?php echo $pro['id']; ?>" data-glightbox="type: external" class="portfolio-details-lightbox" title="Project Details"><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
      </div>

    </div>
  </section><!-- End Portfolio Section -->

  <!-- =======Cyber Security Section ======= -->
   <section id="cybersecurity" class="portfolio">
    <div class="container">
      <div class="section-title">
        <h2>Cyber Security Experiments</h2>
        <p>My Cyber Security Experiments</p>
      </div>
      <div class="row cs-container">
        <?php while($cs = mysqli_fetch_assoc($cs_exp)){?>
          <div class="col-lg-4 col-md-6 cs-item">
              <h4><?php echo $cs['name']; ?></h4>
              <p><span>AIM:- </span>  <?php echo $cs['aim']; ?></p>
              <a href="cs_experiment.php?id=<?php echo $cs['id']; ?>" data-glightbox="type: external" class="portfolio-details-lightbox" title="Project Details"><button>Read More</button></a>
          </div>
          <?php } ?>
      </div>
    </div>
  </section><!-- End Portfolio Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Me</p>
      </div>

      <div class="row mt-2">

        <div class="col-md-6 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-map"></i>
            <h3>My Address</h3>
            <p><?php echo $sql_profile['address'];?></p>
          </div>
        </div>

        <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-share-alt"></i>
            <h3>Social Profiles</h3>
            <div class="social-links">
              <a href="<?php echo $sql_profile['twitter_link'];?>" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="<?php echo $sql_profile['facebook_link'];?>" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="<?php echo $sql_profile['Instagram_link'];?>" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="<?php echo $sql_profile['linkdin_link'];?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
              <a href="<?php echo $sql_profile['github_link'];?>" class="linkedin"><i class="bi bi-github"></i></a>
            </div>
          </div>
        </div>

        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-envelope"></i>
            <h3>Email Me</h3>
            <p><?php echo $sql_profile['email_id'];?></p>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-phone-call"></i>
            <h3>Call Me</h3>
            <p><?php echo $sql_profile['countact_number'];?></p>
          </div>
        </div>
      </div>
      <form method="post" action=""class="php-email-form mt-4">
        <div class="row">
          <div class="col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
          </div>
          <div class="col-md-6 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
          </div>
        </div>
        <div class="form-group mt-3">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        <div class="text-center mt-2"><button type="submit" name="submit">Send Message</button></div>
      </form>

    </div>
  </section><!-- End Contact Section -->

<?php 
   require "footer.php";
?>