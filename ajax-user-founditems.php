<?php
require ('config.php');
session_start();
$return = '';
error_reporting(0);
if(isset($_POST["query"]))
{
    $userid = $_SESSION["userid"];
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "SELECT * FROM i_item WHERE i_isApproved = 1 AND i_createdUserId != ".$userid." AND 
    i_id LIKE '%".$search."%' OR i_name LIKE '%".$search."%'";
}
else
{
    $userid = $_SESSION["userid"];
	$query = "SELECT * FROM i_item WHERE i_isApproved = 1 AND i_createdUserId != ".$userid;
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
	while($row = $result->fetch_assoc()) {
        $newDate = date("Y/m/d", strtotime($row["i_timestamp"]));  
        $itemid = $row["i_id"]; 
        $request = $conn->query("SELECT * FROM r_request WHERE r_i_id = $itemid AND r_u_id = $userid");
        $requestnew = $request->fetch_assoc();
        if($row["i_createdUserId"] != $userid) {
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
                        '.($requestnew["r_isClaimed"] == 0 ? '
                        <div class="col-2">
                        '.($request->num_rows == 0 ? '
                            <a href="addRequest.php?id='.$row['i_id'].'"><button type="button" class="btn btn-info btn-block">Claim</button></a>
                        ' : '
                            <a href="deleteRequest.php?id='.$row['i_id'].'"><button type="button" class="btn btn-primary btn-block">Unclaim</button></a>').'

                            ' : '' ).'
                        </div>
                    </div>
                    </div>
                </div>';
        }
    }
}
else
{
	echo 'No results containing all your search terms were found.';
}
?>