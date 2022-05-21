<?php
    require("config.php");

    session_start();
    $id = $_GET['id'];
    $query = "UPDATE FROM `r_request` SET r_isHandled = 1 WHERE r_i_id = $id";
    mysqli_query($conn, $query);

    echo "<script>location.href = 'adminClaimApprovalRequest.php';</script>";