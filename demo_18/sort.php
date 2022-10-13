<?php

include '../myFiles/connection.php';

$categoryId=$_GET['category_id'];
$droppedElement=$_GET['droppedElement'];


$sortQuery="UPDATE `product_list` SET `category_id`=$categoryId WHERE `product_id`=$droppedElement";

$sortRes=mysqli_query($conn,$sortQuery);

?>