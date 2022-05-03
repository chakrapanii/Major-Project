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
                      
                      <form>

                        <!-- Firstname input -->
                        <div class="form-outline mb-4">
                            <input type="email" class="form-control form-control-lg"
                              placeholder="Firstname" name="firstname" required/>
                          </div>

                        <!-- Lastname input -->
                        <div class="form-outline mb-4">
                            <input type="email" class="form-control form-control-lg"
                              placeholder="Lastname" name="lastname" required/>
                          </div>
              
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                          <input type="email" class="form-control form-control-lg"
                            placeholder="Email adress" name="email" required/>
                        </div>

                        <!-- Phone input -->
                        <div class="form-outline mb-4">
                          <input type="email" class="form-control form-control-lg"
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
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                          <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="login.html"
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

