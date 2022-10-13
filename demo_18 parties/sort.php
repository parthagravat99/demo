<?php

include '../myFiles/connection.php';

$stateId=$_GET['state_id'];
$droppedElement=$_GET['droppedElement'];
$srcId=$_GET['srcId'];
$destId=$_GET['destId'];


if($srcId=="sortable1"){
    $sortQuery="INSERT INTO `state_party`(`party_id`, `state_id`) VALUES ('$droppedElement','$stateId')";
}elseif($srcId=="sortable2"){
    $sortQuery="DELETE FROM `state_party` WHERE `party_id`='$droppedElement' && `state_id`='$stateId'";
}

$sortRes=mysqli_query($conn,$sortQuery);

?>