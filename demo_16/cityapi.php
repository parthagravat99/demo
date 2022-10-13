<?php

include '../myFiles/connection.php';

$stateId=$_GET['state_id'];
$cityquery="SELECT * FROM `tbl_cities` WHERE state_id='".$stateId."'";
$cityRes=mysqli_query($conn,$cityquery);

$data=[];
   $data[]="<--select an option-->";
   while($cityFetch = mysqli_fetch_array($cityRes)){
      $row=[];
      $row['id']=$cityFetch['id'];
      $row['text']=$cityFetch['name'];
      $data[]=$row;
   }
   $results['results']=$data;
   echo json_encode($results);
?>