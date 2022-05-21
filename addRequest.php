<?php
    require("config.php");

    session_start();
    $itemid = $_GET['id'];
    $userid = $_SESSION['userid'];
    $query = "INSERT INTO r_request (r_u_id, r_i_id, r_isClaimRequest) 
                  VALUES ('$userid', '$itemid', 1)";
    mysqli_query($conn, $query);

    echo "<script>location.href = 'userFoundItemsPage.php';</script>";

