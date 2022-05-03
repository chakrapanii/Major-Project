<?php
  require("config.php");
?>
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
                <a class="navbar-brand" href="index.html"><img src="assets/img/navbar-logo.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="addItemPage.php">Add Item</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.html">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
                <div class="container-fluid h-custom">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    
                      <!-- Found Items List -->
                      <div class="masthead-subheading">Found Items</div>

                      <div class="main-wrapper">
                        <div class="container main-container">
                          <div class="searchBackground">
                          <?php
                              $date = new DateTime();
                              $date->modify('+3 month');
                              $founditems = $conn->query("SELECT * FROM i_item WHERE i_isOld = 0");
                              if ($founditems->num_rows > 0) {
                                while($row = $founditems->fetch_assoc()) {
                                  if($row["i_timestamp"] <= $date) {
                                    echo '<div class="row main-row">
                                            <div class="col-12 align-center">
                                              <div class="row p-3">
                                                <div class="col-1 align-middle">
                                                    <img src="assets/img/items/'.$row["i_image"].'" style="max-width: 50px;">
                                                </div>
                                                <div class="col-2 align-middle responsive-text">
                                                    ID:     '. $row["i_id"].'-'. $row["i_name"].'
                                                </div>
                                                <div class="col-5 responsive-text">
                                                    Timestamp:       '. $row["i_timestamp"].'
                                                </div>
                                                <div class="col-1 responsive-text">
                                                    Owner:       '. $row["i_owner"].'
                                                </div>
                                                <div class="col-1">
                                                  <a href="delete.php?id='.$row['i_id'].'"><button type="button" class="btn btn-primary btn-block">Delete</button></a>
                                                </div>
                                                <div class="col-1">
                                                  <a href="addFoundItemPage.php?id='.$row['i_id'].'"><button type="button" class="btn btn-info btn-block">Found</button></a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>';
                                  }
                                }
                              } else {
                                  echo "No entries!";
                              }
                          ?>
                          </div>
                        </div>
                      </div>

                      <!-- Found Old Items List -->
                      <div class="masthead-subheading" style="padding-top: 20px;">Old Items</div>
                      <div class="main-wrapper">
                        <div class="container main-container">
                          <div class="searchBackground">
                          <?php
                              $founditems = $conn->query("SELECT * FROM i_item WHERE i_isOld = 1");

                              if ($founditems->num_rows > 0) {
                                while($row = $founditems->fetch_assoc()) {
                                  if($row["i_timestamp"] <= $date) {
                                    echo '<div class="row main-row">
                                            <div class="col-12 align-center">
                                              <div class="row p-3">
                                                <div class="col-1 align-middle">
                                                    <img src="assets/img/items/'.$row["i_image"].'" style="max-width: 50px;">
                                                </div>
                                                <div class="col-2 align-middle responsive-text">
                                                    ID:     '.$row["i_id"].'-'.$row["i_name"].'
                                                </div>
                                                <div class="col-5 responsive-text">
                                                    Timestamp:       '.$row["i_timestamp"].'
                                                </div>
                                                <div class="col-1 responsive-text">
                                                    Owner:       '.$row["i_owner"].'
                                                </div>
                                                <div class="col-1">
                                                  <a href="delete.php?id='.$row['i_id'].'"><button type="button" class="btn btn-primary btn-block">Delete</button></a>
                                                </div>
                                                <div class="col-1">
                                                  <a href="addFoundItemPage.php?id='.$row['i_id'].'"><button type="button" class="btn btn-info btn-block">Found</button></a>       
                                                </div>
                                              </div>
                                            </div>
                                          </div>';
                                  }
                                }
                              } else {
                                echo "No entries!";
                              }
                          ?>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
    
        </header>

        <!-- Footer-->
        <footer class="footer py-4 navbar-fixed-bottom" style="background-color: #212529;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2022</div>
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
