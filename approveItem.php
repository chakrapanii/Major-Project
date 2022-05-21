<?php
    require("config.php");

    session_start();
    $id = $_GET['id'];
    echo $id;
    $conn->query("UPDATE r_request SET r_isHandled = 1 WHERE r_id = $id");

    $uid = $_GET['u_id'];

    $user = $conn->query("SELECT * FROM u_user WHERE u_id = $uid");
    $row = $user->fetch_assoc();

    $iid = $_GET['i_id'];

    $user = $conn->query("SELECT * FROM i_item WHERE i_id = $iid");
    $rowItem = $user->fetch_assoc();

    $conn->query("UPDATE i_item SET i_isApproved = 1 WHERE i_id = '$iid'");

    $to = $row["u_email"];
    $subject = "Your Item has been approved ".$row["u_firstname"]."!";
    $txt = "Congratulations! The Item with the number: ".$rowItem["i_id"]." and Name: ".$rowItem["i_name"]." has been approved and other People can see it now!";

    mail($to,$subject,$txt);

    echo "<script>location.href = 'adminClaimApprovalRequest.php';</script>";


