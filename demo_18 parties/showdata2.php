<?php
include '../myFiles/connection.php';
$stateId=$_GET['state_id'];

$selectedQuery="SELECT `state_party`.`id`, `party_id`, `state_id`,`party_list`.`party_name` FROM `state_party` LEFT JOIN `party_list` ON `state_party`.`party_id`=`party_list`.`id` WHERE `state_id`=$stateId";

$selectedRes=mysqli_query($conn,$selectedQuery);   
    
while($selectedFetch=mysqli_fetch_array($selectedRes)){
        echo "<li class='ui-state-default' id='".$selectedFetch['party_id']."'>".$selectedFetch['party_name']."</li>";
    }
    
?>