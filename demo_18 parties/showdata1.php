<?php
include '../myFiles/connection.php';
$stateId=$_GET['state_id'];

$selectedQuery="SELECT `state_party`.`id`, `party_id`, `state_id`,`party_list`.`party_name` FROM `state_party` LEFT JOIN `party_list` ON `state_party`.`party_id`=`party_list`.`id` WHERE `state_id`='$stateId'";

$selectedRes=mysqli_query($conn,$selectedQuery);   
 
$partyId=[];
while($selectedFetch=mysqli_fetch_array($selectedRes)){
        $partyId[]=$selectedFetch['party_id'];
    }

if(empty($partyId)){
    $showquery="SELECT * FROM `party_list`";
}else{
$partyList=implode(',',$partyId);   
$showquery="SELECT * FROM `party_list` WHERE `id` NOT IN ($partyList)";
}
$showRes=mysqli_query($conn,$showquery);

while($showFetch=mysqli_fetch_array($showRes)){
    echo "<li class='ui-state-default' id='".$showFetch['id']."'>".$showFetch['party_name']."</li>";

}
?>