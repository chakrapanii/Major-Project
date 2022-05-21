<?php
  require("config.php");
  session_start();
  error_reporting(0);
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script>
          $(document).ready(function(){
            load_data();
            function load_data(query)
            {
              $.ajax({
              url:"ajax-user-founditems.php",
              method:"POST",
              data:{query:query},
              success:function(data)
              {
                $('#result').html(data);
              }
              });
            }
            $('#search').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
              load_data(search);
            }
            else
            {
              load_data();
            }
            });
          });
          </script>
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
                        <li class="nav-item"><a class="nav-link" href="userRequestTable.php">Lost an Item?</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Logout</a></li>
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
                          <div style="margin-top: 20px;" class="searchBackground">
                          <input type="text" name="search" id="search" placeholder="Search" class="form-control" />
			              <div id="result"></div>
                          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                          <script type="text/javascript">
                              $(document).ready(function () {
                                  $("#live_search").keyup(function () {
                                      var query = $(this).val();
                                      if (query != "") {
                                          $.ajax({
                                              url: 'ajax-user-founditems.php',
                                              method: 'POST',
                                              data: {
                                                  query: query
                                              },
                                              success: function (data) {
                                                  $('#search_result').html(data);
                                                  $('#search_result').css('display', 'block');
                                                  $("#live_search").focusout(function () {
                                                      $('#search_result').css('display', 'none');
                                                  });
                                                  $("#live_search").focusin(function () {
                                                      $('#search_result').css('display', 'block');
                                                  });
                                              }
                                          });
                                      } else {
                                          $('#search_result').css('display', 'none');
                                      }
                                  });
                              });
                          </script>
                          <?php
                             /* $founditems = $conn->query("SELECT * FROM i_item WHERE i_isApproved = 1");
                              if ($founditems->num_rows > 0) {
                                while($row = $founditems->fetch_assoc()) {
                                    $newDate = date("Y/m/d", strtotime($row["i_timestamp"]));  
                                    $userid = isset($_SESSION["userid"]);
                                    $itemid = $row["i_id"]; 
                                    $request = $conn->query("SELECT * FROM r_request WHERE r_i_id = $itemid AND r_isHandled = 0");
                                    $lol = $request -> fetch_assoc();
                                    if($row["i_createdUserId"] == $uid) {
                            
                                    echo '<div class="row main-row">
                                            <div class="col-12 align-center">
                                              <div class="row p-3">
                                                <div class="col-1 align-middle">
                                                    <img src="assets/img/items/'.$row["i_image"].'" style="max-width: 50px;">
                                                </div>
                                                <div class="col-4 align-middle responsive-text">
                                                    Name:     '. $row["i_name"].'
                                                </div>
                                                <div class="col-4 responsive-text">
                                                    Date when found:       '. $newDate.'
                                                </div>
                                                <div class="col-2">
                                                '.($request->num_rows == 0 ? '
                                                    <a href="addRequest.php?id='.$row['i_id'].'"><button type="button" class="btn btn-info btn-block">Claim</button></a>
                                                ' : '
                                                    <a href="deleteRequest.php?id='.$row['i_id'].'"><button type="button" class="btn btn-primary btn-block">Unclaim</button></a>').'
                                                </div>
                                              </div>
                                            </div>
                                          </div>';
                                    }
                                  
                                }
                              } else {
                                  echo "No entries!";
                              }
                         */ ?>
                          </div>
                        
                        </div>
                      </div>



                      <!-- Found Items List -->
                      <div class="masthead-subheading p-3">Your Lost Items</div>
                      
                      <div class="main-wrapper">
                        <div class="container main-container">
                          <div class="searchBackground">
                          <?php
                              $uid = $_SESSION["userid"];
                              $founditems = $conn->query("SELECT * from hilfe.u_user
                                                            inner join hilfe.r_request
                                                            On hilfe.u_user.u_id = hilfe.r_request.r_u_id 
                                                            inner join hilfe.i_item
                                                            On hilfe.i_item.i_id = hilfe.r_request.r_i_id
                                                            WHERE r_isClaimRequest = 0 AND i_createdUserId = ".$uid);
                              if ($founditems->num_rows > 0) {
                                while($row = $founditems->fetch_assoc()) {
                                    if($row["r_isClaimRequest"] == 0 && $row["i_createdUserId"] == $uid) {
                                        echo '<div class="row main-row">
                                                <div class="col-12 align-center">
                                                <div class="row p-3">
                                                    <div class="col-1 align-middle">
                                                        <img src="assets/img/items/'.$row["i_image"].'" style="max-width: 50px;">
                                                    </div>
                                                    <div class="col-4 align-middle responsive-text">
                                                        Name:     '. $row["i_name"].'
                                                    </div>
                                                    <div class="col-3 responsive-text">
                                                        Date when found:       '. $row["i_timestamp"].'
                                                    </div>
                                                    <div class="col-2">
                                                    '.($row["i_isApproved"] == 1 ? '
                                                        <p style="color: green;">Approved!</p>
                                                    ' : '
                                                        <p style="color: red;">Not approved yet!</p>').'
                                                    </div>
                                                    <div class="col-1">
                                                        <a href="deleteUserRequest.php?id='.$row['i_id'].'&rid='.$row['r_id'].'"><button type="button" class="btn btn-primary btn-block">Delete</button></a>
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

                      <!-- Claim Requests List -->
                      <div class="masthead-subheading p-3">Your Claim Requests</div>
                      
                      <div class="main-wrapper">
                        <div class="container main-container">
                          <div class="searchBackground">
                          <?php
                              $uid = $_SESSION["userid"];
                              $founditems = $conn->query("SELECT * from hilfe.u_user
                                                            inner join hilfe.r_request
                                                            On hilfe.u_user.u_id = hilfe.r_request.r_u_id 
                                                            inner join hilfe.i_item
                                                            On hilfe.i_item.i_id = hilfe.r_request.r_i_id
                                                            WHERE r_isClaimRequest = 1 AND r_u_id = ".$uid);
                              if ($founditems->num_rows > 0) {
                                while($row = $founditems->fetch_assoc()) {
                                        echo '<div class="row main-row">
                                                <div class="col-12 align-center">
                                                <div class="row p-3">
                                                    <div class="col-1 align-middle">
                                                        <img src="assets/img/items/'.$row["i_image"].'" style="max-width: 50px;">
                                                    </div>
                                                    <div class="col-4 align-middle responsive-text">
                                                        Name:     '. $row["i_name"].'
                                                    </div>
                                                    <div class="col-3 responsive-text">
                                                        Date when found:       '. $row["i_timestamp"].'
                                                    </div>
                                                    <div class="col-2">
                                                    '.($row["r_isApproved"] == 1 ? '
                                                        <p style="color: green;">Approved!</p>
                                                    ' : '
                                                        <p style="color: red;">Not approved yet!</p>').'
                                                    </div>
                                                </div>
                                                </div>
                                            </div>';
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
    
        </header>

        <!-- Footer-->
        <footer class="footer py-4 navbar-fixed-bottom" style="background-color: #212529;">
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
