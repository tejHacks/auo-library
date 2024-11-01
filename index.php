<?php


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Site Metas -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Achievers University Health Center Management System">
    <meta name="theme-color" content="green">
    <meta name="application-name" content="Achievers Health Center Management System">
    <meta name="robots" content="all">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="green">
    <meta name="description" content="A web application for managing and providing digital services that are required by an Healthcare Organizatio of the Achievers University,Owo.">
    <meta name="author" content="Olamide Olateju Emmanuel">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="Achievers University Health Center Management System,AUO HCMS, Achievers University Health Center">
    
    <meta name="theme-color" content="#19B10E">
    <title>ACHIEVERS UNIVERSITY LIBRARY | HOME PAGE</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/boxicons/css/boxicons.css">
    <link rel="stylesheet" type="text/css" href="assets/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="assets/main.css">
    <link rel="icon" href="assets/school.png" type="image/png">

</head>

<body class="index-page">
    
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-end">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/download.png" alt=""> -->
        <h1 class="sitename">AUO LIBRARY</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">SERVICES</a></li>
          <li><a href="#services">FEATURES</a></li>
          <li><a href="#directions">NAVIGATE</a></li>
          <li class="dropdown"><a href="#"><span>USER MENU</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>SIGNUP</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="signup_student.php">STUDENT<i class="fa fa-user text-primary"></i></a></li>
                  <li><a href="lecturer/signup.php">LECTURER<i class="fa fa-user text-primary"></i></a></li>
                </ul>
              </li><li class="dropdown"><a href="#"><span>LOGIN</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="login_student.php">STUDENT<i class="fa fa-user text-success"></i></a></li>
                  <li><a href="lecturer/login.php">LECTURER<i class="fa fa-user text-success"></i></a></li>
                </ul>
              </li>
             
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <!-- <a class="btn-getstarted" href="index.php#about">GET STARTED</a> -->

    </div>
  </header>


  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/1.jpg" alt="" data-aos="fade-in" class="">

      <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <h2>WELCOME TO THE ACHIEVERS UNIVERSITY LIBRARY</h2>
            <p>Your online digital library access tool and mini academic companion.</p>
            <a href="#about" class="btn-get-started">Get Started</a>
          </div>
        </div>
      </div>

    </section>


    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <!-- <div class="col-lg-6 position-relative align-self-start order-lg-last order-first" data-aos="fade-up" data-aos-delay="200"> -->
          <div class="col-lg-6 cold-md-6 position-relative mt-4">
          <img src="assets/img/clark-tibbs-oqStl2L5oxI-unsplash.jpg" class="img-fluid" alt="">
          
          </div>

          <div class="col-lg-6 content order-last  order-lg-first" data-aos="fade-up" data-aos-delay="100">
            <h3>About Us</h3>
            <p>
              The ACHIEVERS UNIVERSITY LIBRARY is an incredible section on the campus, you have access to a wide variety of material for your academic pursuits, various subjects from the arts,sciences,philosophy,engineering and a wide range of material on other fields are made available at the library.Here,you get to access the system by which you can interface with the library on your mobile phone, desktop or tablet. You can search for books of interest, read quotes from inspiring people, tr out some reading goals.All together this small web app is tailored to the success of students. Enjoy your stay on the campus.
            </p>
            <ul>
              <li>
                <i class="bi bi-diagram-3"></i>
                <div>
                  <h5>Find Books</h5>
                  <p>Gain access to a wide variety of material available in the library</p>
                </div>
              </li>
              <li>
                <i class="bi bi-fullscreen-exit"></i>
                <div>
                  <h5>Find your way around the library</h5>
                  <p>With an inbuilt mini navigator,this system is designed to help you find your way around the library and around key places on the campus.</p>
                </div>
              </li>
              <li>
                <i class="bx bx-book-reader"></i>
                <div>
                  <h5>An Online Reader</h5>
                  <il>Along with an online reader, you can read materials available in the library online too</p>
                </div>
              </li>
            </ul>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->


    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>OUR LIBRARY OFFERS</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>USER DASHBOARD</h3>
              </a>
              <p>Here you've got your very own dashboard to give you your freedom of engagement with the library. You can keep track of borrowed books,read books,find books and even get academic inspiration.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bx bx-book-reader"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>READING / RELAXATION</h3>
              </a>
              <p>A place of reading is also a home to men who learn how to keep their minds engaged,the library boasts of a conducive environment for proper reading and study sessions.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bx bx-notification"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>REMINDERS</h3>
              </a>
              <p>We keep track of our materials and we'll make sure to remind you of when borrowed books are overdue,just make sure to open your notifications tab.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-search"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>FIND BOOKS EASILY</h3>
              </a>
              <p>An interface tailored to student needs, find books easily and get accurate and sufficient information needed on them too.</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-calendar4-week"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>READING PLANS</h3>
              </a>
              <p>Get access to a wide range of reading and study plans for effective growth and success in your field of study.</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-chat-square-text"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>CONSULTANCY</h3>
              </a>
              <pt>Need help? We have trained and professional counsellors who can provide help to students and they are good at their job too!</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

    

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Your Name</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Message</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">AUO LIBRARY  <i class="bx bx-library"></i> </span>
          </a>
          <p>KNOWLEDGE, INTEGRITY AND LEADERSHIP.</p>
         
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Sign Up</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">Reset Password</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Find the Library</a></li>
            <li><a href="#">Get My Library Card</a></li>
            <li><a href="#">Find A Place in School</a></li>
            <li><a href="#">Converters</a></li>
            <li><a href="#">Read A Quote</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>Achievers University Library Opp Chemistry Laboratory,Achievers University Idasen-Ute Road,Owo,Ondo State</p>
         
          <p>Nigeria</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
          <p><strong>Email:</strong> <span>info@example.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">ACHIEVERS UNIVERSITY LIBRARY</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
       
        Designed by <a href="achieversuniversity.edu.ng">AUO COMPUTER SCIENCE DEPARTMENT</a>
      </div>
    </div>

  </footer>


    </main>


    <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

</body>


 <!-- Vendor JS Files -->
 <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/main.js"></script>
</html>