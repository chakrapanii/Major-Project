<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sign Up</title>
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
                <a class="navbar-brand" href="index.php"><img style="height: 70px;" src="assets/img/logo.png" alt="..." /></a>
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
            <section>
                <div class="container-fluid h-custom">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <div class="masthead-subheading">Sign yourself Up</div>
                      <form method="POST" action="" enctype="multipart/form-data">

                        <!-- Firstname input -->
                        <div class="form-outline mb-4">
                            <input type="text" class="form-control form-control-lg"
                              placeholder="Firstname" name="firstname" required/>
                          </div>

                        <!-- Lastname input -->
                        <div class="form-outline mb-4">
                            <input type="text" class="form-control form-control-lg"
                              placeholder="Lastname" name="lastname" required/>
                          </div>
              
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                          <input type="email" class="form-control form-control-lg"
                            placeholder="Email adress" name="email" required/>
                        </div>

                        <!-- Phone input -->
                        <div class="form-outline mb-4">
                          <input type="text" class="form-control form-control-lg"
                            placeholder="Phone number" name="number" required/>
                        </div>
              
                        <!-- Password input -->
                        <div class="form-outline mb-3">
                          <input type="password" class="form-control form-control-lg"
                            placeholder="Password" name="password" required/>
                        </div>

                        <!-- Password confirm input -->
                        <div class="form-outline mb-3">
                            <input type="password" class="form-control form-control-lg"
                              placeholder="Confirm Password" name="confirmpassword" required/>
                          </div>
              
                        <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg"
                                style="margin-top: 2.5rem;" name="upload">Sign Up</button>
                          <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="login.php"
                              class="link-danger" name="sumbit">Login</a></p>
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

<?php
  require("config.php");
  $error = 0;
  // REGISTER USER
  if (isset($_POST['upload'])) {
      // receive all input values from the form
      $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
      $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
      $number = mysqli_real_escape_string($conn, $_POST['number']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password_1 = mysqli_real_escape_string($conn, $_POST['password']);
      $password_2 = mysqli_real_escape_string($conn, $_POST['confirmpassword']);

      if ($password_1 != $password_2) {
        echo "<script> alert('Passwords do not match!')</script>";
        $error++;
      }

      $user_check_query = "SELECT * FROM u_user WHERE u_email='$email' LIMIT 1";
      $result = mysqli_query($conn, $user_check_query);
      $user = mysqli_fetch_assoc($result);
      
      if ($user) { 

        if ($user['u_email'] === $email) {
          echo "<script> alert('Username already exists!')</script>";
          $error++;
        }
      }

      if($error == 0) {
      
        $password = md5($password_1);

        $query = "INSERT INTO u_user (u_email, u_password, u_number, u_firstname, u_lastname) 
                  VALUES ('$email', '$password', '$number', '$firstname', '$lastname')";
        mysqli_query($conn, $query);

        $sql = "SELECT * FROM u_user WHERE u_email='$email'";
        $result = $conn -> query($sql);

        // Associative array
        $row = $result -> fetch_assoc();
        $_SESSION['userid'] = $row['u_id'];
        echo "<script>location.href = 'userFoundItemsPage.php';</script>";
      }
}

?>