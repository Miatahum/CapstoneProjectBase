
<?php
 include "conn.php";
 session_start(); 
if(empty($_SESSION['email'])){
    ?>
        <script>
            alert("Session Empty Please Login");
            window.location.href="../index.php";
        </script>
    <?php
 }else{
    $e= $_SESSION['email'];

    $getusers = mysqli_query($conn, "SELECT * FROM users WHERE email ='$e'");
    while($users = mysqli_fetch_array($getusers)){
        
    }
 }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FINDIT: LOST AND FOUND MANAGEMENT APP</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Favicons -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="assets/img/logo.png">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>



  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">FINDIT<span>
            <div class=""></div>
          </span></a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto active" href="#lost">Lost & Found Items</a></li>
          <li><a class="nav-link scrollto active" href="#contact">Contact</a></li>

          <li class="dropdown"><a href="#"><span>Register</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1">Register as User</a></li>


          </li>

        </ul>
        </li>
        <li class="dropdown"><a href="#"><span>Login</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2">Login as Admin</a></li>
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3">Login as User</a></li>


        </li>

        </ul>
        </ul>

        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>FINDIT: LOST AND FOUND </br> MANAGEMENT APP</span></h1>
      <h2>We FINDIT ensures that your lost items will be retrieve at ease.</h2>
      <div class="d-flex">
        <a href="" class="btn-get-started scrollto">Get Started</a>
      </div>
    </div>
  </section><!-- End Hero -->

  <section id="lost">
    <div class="container mt-3">
      <h2>LIST OF ITEMS</h2>
      <br>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="tab" href="#home">Lost</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#menu1">Found</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#menu2">Claimed</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#menu3">Unclaimed</a>
        </li>
      </ul>

      <!-- Tab panes -->
                    <div class="tab-content">
                                <div class="tab-pane container active" id="home">
                                    <div class="row py-2 px-2">
                                        <?php 
                                            $get_lost = mysqli_query($conn,"SELECT * FROM items WHERE itemtype = 'Lost'");
                                            while($lost = mysqli_fetch_array($get_lost)){

                                        ?>
                                        <div class="col-md-4">
                                            <div class="card" style="width: 18rem;">
                                                <img class="card-img-top" src="../uploads/<?php echo $lost['picture']; ?>" alt="Card image cap">
                                                <div class="card-body">
                                                    <p class="card-text">Item Name: <?php echo $lost['itemname']; ?></p>
                                                    <p class="card-text">Item Description: <?php echo $lost['description']; ?></p>
                                                    <p class="card-text">Date Found: <?php echo $lost['datefound']; ?></p>
                                                    <p class="card-text">Item Status: <?php echo $lost['item_status']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                              }
                                        ?>
                                    </div>
                                </div>
                            <div class="tab-pane container fade" id="menu1">
                                <div class="row py-2 px-2">
                                <?php
                                    $get_found = mysqli_query($conn,"SELECT * FROM items WHERE itemtype = 'Found'");
                                    while($found = mysqli_fetch_array($get_found)){
                                    ?>
                                    <div class="col-md-4">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="../uploads/<?php echo $found['picture']; ?>" alt="Card image cap">
                                                <div class="card-body">
                                                    <p class="card-text">Item Name: <?php echo $found['itemname']; ?></p>
                                                    <p class="card-text">Item Description: <?php echo $found['description']; ?></p>
                                                    <p class="card-text">Date Found: <?php echo $found['datefound']; ?></p>
                                                    <p class="card-text">Item Status: <?php echo $found['item_status']; ?></p>
                                                </div>
                                        </div>
                                    </div>
                                <?php 
                                        }
                                    ?>
                                </div>
                            </div>
                                
                                <div class="tab-pane container fade" id="menu2">
                                    <div class="row py-2 px-2">
                                <?php
                                    $get_claimed = mysqli_query($conn,"SELECT * FROM items WHERE itemtype = 'Claimed'");
                                    while($claimed = mysqli_fetch_array($get_claimed)){
                                    ?>
                                    <div class="col-md-4">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="../uploads/<?php echo $claimed['picture']; ?>" alt="Card image cap">
                                                <div class="card-body">
                                                    <p class="card-text">Item Name: <?php echo $claimed['itemname']; ?></p>
                                                    <p class="card-text">Item Description: <?php echo $claimed['description']; ?></p>
                                                    <p class="card-text">Date Found: <?php echo $claimed['datefound']; ?></p>
                                                    <p class="card-text">Item Status: <?php echo $claimed['item_status']; ?></p>
                                                </div>
                                        </div>
                                    </div>
                                
                                <?php 
                                        }
                                    ?>
                                    </div>
                                
                            </div>

                        </div>
                    </section>

   <!-- ======= Contact Section ======= -->
   <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact</h2>
        <h3><span>Contact Us</span></h3>

      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-6">
          <div class="info-box mb-4">
            <i class="bx bx-map"></i>
            <h3>Our Address</h3>
            <p>PHINMA UNIVERSITY OF ILOILO, Rizal St, Iloilo City Proper, 5000</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-envelope"></i>
            <h3>Email Us</h3>
            <p>ui@phinmaed.com</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-phone-call"></i>
            <h3>Call Us</h3>
            <p>+63 9056439404</p>
          </div>
        </div>

      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-6 ">
          <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
        </div>

        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">



    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>FINDIT<span>.</span></h3>
            <p>
              PHINMA UNIVERSITY OF ILOILO<br>
              RIZAL ST, ILOILO CITY PROPER, 5000<br>
              ILOILO, PHILIPPINES <br><br>
              <strong>Phone:</strong> +63 9056439404<br>
              <strong>Email:</strong> ui@phinmaed.com<br>
            </p>
          </div>



          <div class="container py-4">
            <div class="copyright">
              &copy; Copyright <strong><span>Phinma University of Iloilo</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
              Designed by <a href="index.php"><b>ONEOFTHEBOYS</b></a>
            </div>
          </div>
  </footer><!-- End Footer -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


  <!-- Modal for Register as Users -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">REGISTER AS USER</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="process.php" method="POST">

          <label>Full Name:</label></br>
            <div class="input-group mb-3">
              <div class="input-group-text">
              <i class="fa fa-user-circle-o" aria-hidden="true"></i>
              </div>
              <input type="text" name="fullname" placeholder="Enter your Full Name" class="form-control" required></p>
            </div>

            <label>Address:</label></br>
            <div class="input-group mb-3">
              <div class="input-group-text">
              <i class="fa fa-location-arrow" aria-hidden="true"></i>
              </div>
              <input type="text" name="address" placeholder="Enter your Address" class="form-control" required></p>
            </div>


            <label>Course:</label></br>
            <div class="input-group mb-3">
              <div class="input-group-text">
              <i class="fa fa-building" aria-hidden="true"></i>
              </div>
              <input type="text" name="course" placeholder="Enter your Course" class="form-control" required></p>
            </div>

            <label>Contact Number:</label></br>
            <div class="input-group mb-3">
              <div class="input-group-text">
              <i class="fa fa-phone-square" aria-hidden="true"></i>
              </div>
              <input type="text" name="contactnumber" placeholder="Enter your Contact Number" class="form-control" required></p>
            </div>

            <label>Email:</label></br>
            <div class="input-group mb-3">
              <div class="input-group-text">
                <i class="fa fa-regular fa fa-envelope"></i>
              </div>
              <input type="text" name="email" placeholder="Enter your Email" class="form-control" required></p>
            </div>

            <label>Password:</label></br>
            <div class="input-group">
              <div class="input-group-text">
                <i class="fa fa-solid fa fa-lock"></i>
              </div>

              <input type="text" name="pass" id="myInput1" placeholder="Enter your Password" required class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">


            </div>
            <div class="float-end">
            <input type="checkbox" onclick="myFunction1()">Show Password</p>
            </div></br>

            <label>ID Number:</label></br>
            <div class="input-group mb-3">
              <div class="input-group-text">
              <i class="fa fa-id-card-o" aria-hidden="true"></i>
              </div>

              <input type="text"  name="stud_num" placeholder="Enter your Student Number!!" class="form-control" required></p>
            </div>


        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-secondary" value="CLEAR">
          <input type="submit" class="btn btn-primary" name="reg" value="REGISTER">
          </form>
        </div>
      </div>
    </div>
  </div>




  <!-- Modal for Login as Admin -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">LOGIN AS ADMIN</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                
          <form action="process.php" method="POST">
       
            <label>Email:</label></br>
            <div class="input-group mb-3">
              <div class="input-group-text">
                <i class="fa fa-regular fa fa-envelope"></i>
              </div>

              <input type="email" name="email" placeholder="Enter your Email" class="form-control" required></p>
            </div>
            <label>Password:</label></br>
            <div class="input-group">
              <div class="input-group-text">
                <i class="fa fa-solid fa fa-lock"></i>
              </div>

              <input type="password" name="pass" id="myInput2" placeholder="Enter your Password" required class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">


            </div>
            <div class="float-end">
            <input type="checkbox" onclick="myFunction2()">Show Password
            </div>

        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-secondary" value="CLEAR">
          <input type="submit" class="btn btn-primary" name="login_admin" value="LOGIN">
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal for Login as Users -->
  <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">LOGIN AS USER</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="process.php" method="POST">


            <label>Email:</label></br>
            <div class="input-group mb-3">
              <div class="input-group-text">
                <i class="fa fa-regular fa fa-envelope"></i>
              </div>

              <input type="email" name="email" placeholder="Enter your Email" class="form-control" required></p>
            </div>
            <label>Password:</label></br>
            <div class="input-group">
              <div class="input-group-text">
                <i class="fa fa-solid fa fa-lock"></i>
              </div>

              <input type="password" name="pass" id="myInput3" placeholder="Enter your Password" required class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">


            </div>
            <div class="float-end">
            <input type="checkbox" onclick="myFunction3()">Show Password</p>
            </div>

        </div>
        <div class="modal-footer">
          <input type="reset" class="btn btn-secondary" value="CLEAR">
          <input type="submit" class="btn btn-primary" name="login_user" value="LOGIN">
          </form>
        </div>
      </div>
    </div>
  </div>







  <!--JS Show Password-->
  <script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>

  <script>
    function myFunction1() {
      var x = document.getElementById("myInput1");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>

  </script>

  <script>
    function myFunction2() {
      var x = document.getElementById("myInput2");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>



  </script>

  <script>
    function myFunction3() {
      var x = document.getElementById("myInput3");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>

    








</body>
</html>


    