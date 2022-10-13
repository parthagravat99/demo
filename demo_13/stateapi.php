<?php

include '../myFiles/connection.php';

$countryId=$_GET['country_id'];
$statequery="SELECT * FROM `tbl_states` WHERE country_id='".$countryId."'";
$stateRes=mysqli_query($conn,$statequery);


echo"<option>Select State</option>";
while($stateFetch=mysqli_fetch_array($stateRes)){
    echo "<option value='".$stateFetch['id']."'>".$stateFetch['name']."</option>";
}
?>