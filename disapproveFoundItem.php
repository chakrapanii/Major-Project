<?php
    require("config.php");
    error_reporting(0);
    session_start();
    $itemid = $_GET['id'];
    $userid = $_SESSION['userid'];
    $query = "UPDATE i_item SET i_owner = '', i_phoneNumber = '', i_isOld = 0 WHERE i_id = $itemid";
    
    mysqli_query($conn, $query);

    echo "<script>location.href = 'adminFoundItemsPage.php';</script>";











































