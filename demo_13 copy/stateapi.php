<?php

include '../myFiles/connection.php';

$countryId=$_GET['country_id'];
$statequery="SELECT * FROM `tbl_states` WHERE country_id='".$countryId."'";
$stateRes=mysqli_query($conn,$statequery);

$state=array();
while($stateFetch=mysqli_fetch_array($stateRes)){
    $state[]=array("id"=>$stateFetch['id'],"name"=>$stateFetch['name']);
    
}
echo json_encode($state);
?>