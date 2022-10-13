<?php
   include '../myFiles/connection.php';
   
   $selectCountry = "SELECT * FROM `tbl_countries`";
   $countryRes = mysqli_query($conn,$selectCountry);
   
   
   $data=[];
   $data[]="<--select an option-->";
   while($countryData = mysqli_fetch_array($countryRes)){
      $row=[];
      $row['id']=$countryData['id'];
      $row['text']=$countryData['name'];
      $data[]=$row;
}
   $results['results']=$data;
   echo json_encode($results);
   

?>