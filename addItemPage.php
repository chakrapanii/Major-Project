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
            <a class="navbar-brand" href="login.php"><img style="height: 70px;" src="assets/img/logo.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="adminFoundItemsPage.php">Main Page</a></li>
                        <li class="nav-item"><a class="nav-link" href="adminClaimApprovalRequest.php">Requests</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
                <div class="container-fluid h-custom">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                  <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                      <!-- Found Items List -->
                      <div class="masthead-subheading">Create an Item</div>
                        <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-outline mb-3">
                                <input type="text" id="form3Example4" class="form-control form-control-lg"
                                    placeholder="Item-name" name="itemname" required/>
                                </div>
                                <div class="form-outline mb-3">
                                <input type="text" id="form3Example4" class="form-control form-control-lg"
                                    placeholder="Returners Name" name="personname" required/>
                                </div>
                                <div class="form-outline mb-3">
                                <input type="text" id="form3Example4" class="form-control form-control-lg"
                                    placeholder="Returners Number" name="personnumber" required/>
                                </div>
                            <div class="masthead-subheading">Item Image</div>
                            <input type="file" name="uploadfile" value=""/>
                            <div>
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="margin-top: 2.5rem;" name="upload">UPLOAD</button>
                            </div>
                        </form>
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

<?php
    require("config.php");
    $msg = "";
    if (isset($_POST['upload'])) {
    
            $filename = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];    
            $folder = "assets/img/items/".$filename;
            $name = $_POST['itemname'];
            $personname = $_POST['personname'];
            $personnumber = $_POST['personnumber'];
    
            //Get all the submitted data from the form
            $sql = "INSERT INTO i_item (i_image, i_name, i_nameReturnedPerson, i_numberReturnedPerson, i_createdUserId) VALUES ('$filename', '$name', '$personname', '$personnumber', 0)";
    
            //Execute query
            mysqli_query($conn, $sql);
            
            //Move the uploaded image into the folder
            if (move_uploaded_file($tempname, $folder))  {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
        }
    }
?>
