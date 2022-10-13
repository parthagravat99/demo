<?php

include '../myFiles/connection.php';

$ids = $_GET['id'];

$deletquery = "DELETE FROM `demo_11` WHERE id=$ids";

$res = mysqli_query($conn,$deletquery);

header('Location: demo_15.php');

?>