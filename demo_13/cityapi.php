<?php

include '../myFiles/connection.php';

$stateId=$_GET['state_id'];
$cityquery="SELECT * FROM `tbl_cities` WHERE state_id='".$stateId."'";
$cityRes=mysqli_query($conn,$cityquery);

echo"<option>Select State</option>";
while($cityFetch=mysqli_fetch_array($cityRes)){
    echo "<option >".$cityFetch['name']."</option>";

}
?>