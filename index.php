<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="login.php"><img style="height: 70px;" src="assets/img/logo.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="signup.php">SignUp</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Lost & Found Website!</div>
                <div class="masthead-heading text-uppercase">Are you looking for something?</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
            </div>
        </header>

        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Service</h2>
                    <h3 class="section-subheading text-muted">HERE IS WHAT WE CAN OFFER THAT YOU CAN GET YOUR LOST ITEM BACK</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-user-plus fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Step 1: Register with us</h4>
                        <p class="text-muted">Don't know how to deal with lost or found items near you? Register with your name and email address. If you have registered already, you can use the same account for posting unlimited ads.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-check fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Step 2: Verify your account</h4>
                        <p class="text-muted">Confirm your registration through the verification link which has sent to the given email address and then you can manage the account details now. Use either username or email address for login to your account.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Step 3: Start reporting</h4>
                        <p class="text-muted">You can start creating the ad for the lost or found items now to claim the item or hand over it to the rightful owner. Once done, we will post the ad on the large community where everybody can potentially take action in searching for what you have lost.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Most Found-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Most Found Items</h2>
                    <h3 class="section-subheading text-muted">Ranking of the people who found the most items:</h3>
                </div>
                <div style="color: white;" class="main-wrapper">
                        <div class="container main-container">
                          <div class="searchBackground">
                          <?php
                              require("config.php");
                              $counter = 0;
                              $founditems = $conn->query("SELECT * FROM u_user WHERE u_countFound > 0 ORDER BY u_countFound DESC");
                              if ($founditems->num_rows > 0) {
                                while($row = $founditems->fetch_assoc()) {
                                    $counter++;
                                    echo '<div class="row main-row">
                                            <div class="col-12 align-center">
                                              <div class="row p-3">
                                                <div class="col-4"></div>
                                                <div class="col-1 masthead-subheading">
                                                    <h4 style="color: #ffc014">'.$counter.'.</h4>
                                                </div>
                                                <div class="col-4 masthead-subheading">
                                                    <h5 style="color: #ffc014">Name: '.$row["u_firstname"].' '.$row["u_lastname"].'</h5>
                                                </div>
                                              </div>
                                            </div>
                                          </div>';
                                }
                              } else {
                                  echo "<div style='padding: 10px;'>No entries!</div>";
                              }
                          ?>
                       
                          </div>
                        
                        </div>
                      </div>
                </div>
            </div>
        </section>

        <!-- Footer-->
        <footer class="footer py-4" style="background-color: #212529;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
