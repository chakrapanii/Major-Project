<?php

    $id = $_GET['id'];
    $rid = $_GET['rid'];
    require("config.php");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to delete a record
    $sql = "DELETE FROM i_item WHERE i_id = $id"; 
    mysqli_query($conn, $sql);
    $conn->query("DELETE FROM r_request WHERE r_id = $rid");

   
    header('Location: userFoundItemsPage.php'); //If book.php is your main page where you list your all records



?>