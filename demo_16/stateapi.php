<?php

include 'connection.php';

$countryId=$_GET['country_id'];
$statequery="SELECT * FROM `tbl_states` WHERE country_id='".$countryId."'";
$stateRes=mysqli_query($conn,$statequery);



$data=[];
   // $data[]="<--select an option-->";
   while($stateFetch = mysqli_fetch_array($stateRes)){
      $row=[];
      $row['id']=$stateFetch['id'];
      $row['text']=$stateFetch['name'];
      $data[]=$row;
   }
   $results['results']=$data;
   echo json_encode($results);
   exit();
?>