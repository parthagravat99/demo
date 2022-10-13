<?php

include '../myFiles/connection.php';

if(isset($_POST['submit'])){
    if(isset($_POST['checkbox'])) {
        $checkbox=$_POST['checkbox'];
    }
    $checklist = implode(', ', $checkbox);
    
    $deletquery = "DELETE FROM `demo_11` WHERE id IN ($checklist)";

    $res = mysqli_query($conn,$deletquery);

    header('Location: display.php');
}else{

    $id = $_GET['id'];

    $deletquery = "DELETE FROM `demo_11` WHERE id=$id";

    $res = mysqli_query($conn,$deletquery);

    header('Location: display.php');
}
?>