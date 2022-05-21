<?php
require ('config.php');
$return = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "SELECT * FROM i_item WHERE
    i_id LIKE '%".$search."%' OR i_name LIKE '%".$search."%'";
}
else
{
	$query = "SELECT * FROM i_item";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
	while($row = $result->fetch_assoc()) {
        if($row["i_isOld"] == 0 && $row["i_isApproved"] == 1) {
            echo '<div class="row main-row">
                    <div class="col-12 align-center">
                    <div class="row p-3">
                        <div class="col-1 align-middle">
                            <img src="assets/img/items/'.$row["i_image"].'" style="max-width: 50px;">
                        </div>
                        <div class="col-2 align-middle responsive-text">
                            ID:     '. $row["i_id"].'-'. $row["i_name"].'
                        </div>
                        <div class="col-2 responsive-text">
                            Timestamp:       '. $row["i_timestamp"].'
                        </div>
                        <div class="col-2 responsive-text">
                            Owner:       '. $row["i_owner"].' <br>
                            Returner:       '. $row["i_nameReturnedPerson"].'
                        </div>
                        <div class="col-2 responsive-text">
                            Num:       '. $row["i_phoneNumber"].' <br>
                            Num:       '. $row["i_numberReturnedPerson"].'
                        </div>
                        <div class="col-2">
                        <a href="delete.php?id='.$row['i_id'].'"><button type="button" class="btn btn-primary btn-block">Delete</button></a>
                    
                        <a href="addFoundItemPage.php?id='.$row['i_id'].'"><button type="button" class="btn btn-info btn-block">Found</button></a>
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