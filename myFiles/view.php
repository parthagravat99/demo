<?php

include 'connection.php';

$ids = $_GET['id'];

$selectquery="SELECT * FROM jobregistration WHERE id=$ids";

$query = mysqli_query($conn,$selectquery);

$res = mysqli_fetch_array($query);

    echo "Id = " . $res['id'] . "<br>";
    echo "Name = " . $res['name'] . "<br>";
    echo "Degree = " . $res['degree'] . "<br>";
    echo "Mobile = " . $res['mobile'] . "<br>";
    echo "Email = " . $res['email'] . "<br>";
    echo "Post = " . $res['post'] . "<br>";
?>