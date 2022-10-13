<?php

include 'connection.php';

$ids = $_GET['id'];

$deletquery = "DELETE FROM `jobregistration` WHERE id=$ids";

$res = mysqli_query($conn,$deletquery);

header('Location: display.php');

?>