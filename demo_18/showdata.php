<?php
include '../myFiles/connection.php';
$categoryId=$_GET['category_id'];

$selectedProductQuery="SELECT `product_id`, `product_list` FROM `product_list` WHERE `category_id`=$categoryId";
$selectedProductRes=mysqli_query($conn,$selectedProductQuery);   
    while($selectedProductFetch=mysqli_fetch_array($selectedProductRes)){
        echo "<li class='ui-state-default' id='".$selectedProductFetch['product_id']."'>".$selectedProductFetch['product_list']."</li>";
    }
    
?>