<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Lost And Found Page</title>
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
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="signup.php">SignUp</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <section>
                <div class="container-fluid h-custom">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                      
                      <form action="login.php" method="POST">
              
                        <!-- Email input 
                        <div class="form-outline mb-4">
                          <input type="email" id="form3Example3" class="form-control form-control-lg"
                            placeholder="Email adress" name="email" required/>
                        </div>
              
                      
                        <div class="form-outline mb-3">
                          <input type="password" id="form3Example4" class="form-control form-control-lg"
                            placeholder="Password" name="password" required/>
                        </div>
                        -->
                        <div class="d-flex justify-content-between align-items-center">
                          <!-- Checkbox -->
                          <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                              Remember me
                            </label>
                          </div>
                          <a href="#!" class="link-danger">Forgot password?</a>
                        </div>
              
                        <div class="text-center text-lg-start mt-4 pt-2">
                          <button type="button" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;" name="submit">Login</button>
                          <!--<p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="signup.php"
                              class="link-danger">Register</a></p>-->
                        </div>
              
                      </form>
                    </div>
                  </div>
                </div>

              </section>
    
        </header>

        <!-- Footer-->
        <footer class="footer py-4" style="background-color: #212529;">
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


<?php
    require('config.php');

    if(isset($_POST["submit"])) {
      echo '<script>alert("Welcome to Geeks for Geeks")</script>';
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      $statement = $pdo->prepare("SELECT * FROM u_user WHERE email = :email");
      $result = $statement->execute(array('email' => $email));
      $user = $statement->fetch();
          
      if ($user !== false && password_verify($passwort, $user['password'])) {
          $_SESSION['userid'] = $user['id'];
          die('Login erfolgreich. Weiter zu <a href="geheim.php">internen Bereich</a>');

      } else {
          $errorMessage = "E-Mail oder Passwort war ungültig<br>";
      }
    }
?>