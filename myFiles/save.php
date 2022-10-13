<?php

include 'connection.php';

if(isset($_POST['submit'])){
    $name = $_REQUEST['name'];
    $degree = $_REQUEST['degree'];
    $mobile = $_REQUEST['mobile'];
    $email = $_REQUEST['email'];
    $post = $_REQUEST['post'];
    
    $ids = $_GET['id'];

    if(isset($_GET['id'])){
       
        
        $updatequery = "UPDATE `jobregistration` SET `name`='$name',`degree`='$degree',`mobile`='$mobile',`email`='$email',`post`='$post' WHERE id='$ids'";
        
        $res = mysqli_query($conn,$updatequery);

    }else{

        $insertquery = "INSERT INTO jobregistration (name,degree,mobile,email,post) values ('$name','$degree','$mobile','$email','$post ')";
    
        $res = mysqli_query($conn,$insertquery);
    }
 
    if($res){?>
        <script>
            alert('data inserted successfully');
        </script>
    <?php }else{ ?>
        <script>
            alert('data not inserted');
        </script>
    <?php }
}
header('Location: display.php');
?>