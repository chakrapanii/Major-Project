<?php
    require("config.php");

    session_start();
    $id = $_GET['id'];
    echo $id;
    $conn->query("UPDATE r_request SET r_isHandled = 1 WHERE r_id = $id");
    $conn->query("UPDATE r_request SET r_isApproved = 1 WHERE r_id = $id");
    $conn->query("UPDATE r_request SET r_isClaimed = 1 WHERE r_id = $id");

    $uid = $_GET['u_id'];

    $user = $conn->query("SELECT * FROM u_user WHERE u_id = $uid");
    $row = $user->fetch_assoc();

    $iid = $_GET['i_id'];

    $user = $conn->query("SELECT * FROM i_item WHERE i_id = $iid");
    $rowItem = $user->fetch_assoc();

    $to = $row["u_email"];
    $subject = "Your Claim has been approved ".$row["u_firstname"]."!";
    $txt = "Congratulations! The Item with the number: ".$rowItem["i_id"]." and Name: ".$rowItem["i_name"]." has been approved. The admin will contact you soon per call or message!";

    mail($to,$subject,$txt);

    echo "<script>location.href = 'adminClaimApprovalRequest.php';</script>";


