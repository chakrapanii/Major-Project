<?php

    $id = $_GET['id'];
    //Connect DB
    //Create query based on the ID passed from you table
    //query : delete where Staff_id = $id
    // on success delete : redirect the page to original page using header() method
    require("config.php");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to delete a record
    $sql = "DELETE FROM i_item WHERE i_id = $id"; 

    if($_GET["rid"]) {
        $rid = $_GET["rid"];
        $conn->query("DELETE FROM `r_request` WHERE r_id = $rid");
    }

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header('Location: adminFoundItemsPage.php'); //If book.php is your main page where you list your all records
        exit;
    } else {
        echo "Error deleting record";
    }



?>