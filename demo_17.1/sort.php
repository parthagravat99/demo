<?php
include '../myFiles/connection.php';
$table1=$_GET['table1'];
$table2=$_GET['table2'];

foreach($table1 as $key=>$value){
    $table1Query="UPDATE `demo_17.1` SET `order`= ($key+1),`type`='type-1' WHERE `id`= $value";
    $table1Res=mysqli_query($conn,$table1Query);

}
foreach($table2 as $key=>$value){
    $table2Query="UPDATE `demo_17.1` SET `order`= ($key+1),`type`='type-2' WHERE `id`= $value";
    
    $table2Res=mysqli_query($conn,$table2Query);
    
    }
?>