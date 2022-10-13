<?php
include 'connection.php';
$sortdata=$_GET['item'];
var_dump($sortdata);
foreach ($sortdata as $key=>$value) {
$sortQuery="UPDATE `demo_17` SET `order`=($key+1) WHERE `id`=$value";
$sortRes = mysqli_query($conn,$sortQuery);

}

?>