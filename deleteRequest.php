<?php
    require("config.php");
    error_reporting(0);
    session_start();
    $itemid = $_GET['id'];
    $userid = $_SESSION['userid'];
    $query = "DELETE FROM `r_request` WHERE r_i_id = $itemid AND r_u_id = $userid";
    
    mysqli_query($conn, $query);

    echo "<script>location.href = 'userFoundItemsPage.php';</script>";

