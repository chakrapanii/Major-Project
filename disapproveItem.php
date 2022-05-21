<?php
    require("config.php");

    session_start();
    $id = $_GET['id'];
    echo $id;
    $conn->query("DELETE FROM r_request WHERE r_id = $id");

    $uid = $_GET['u_id'];

    $user = $conn->query("SELECT * FROM u_user WHERE u_id = $uid");
    $row = $user->fetch_assoc();

    $iid = $_GET['i_id'];

    $user = $conn->query("SELECT * FROM i_item WHERE i_id = $iid");
    $rowItem = $user->fetch_assoc();

    $conn->query("DELETE FROM i_item WHERE i_id = $iid");

    $to = $row["u_email"];
    $subject = "Your Item has been declined ".$row["u_firstname"]."!";
    $txt = "We are sorry! The Item with the number: ".$rowItem["i_id"]." and Name: ".$rowItem["i_name"]." has been disapproved because it is not in our interest!";

    mail($to,$subject,$txt);

    echo "<script>location.href = 'adminClaimApprovalRequest.php';</script>";