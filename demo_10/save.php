<?php

include '../myFiles/connection.php';

if(isset($_POST['submit'])){
    $name = $_REQUEST['name'];
    $url = $_REQUEST['url'];
    $funnel = $_REQUEST['funnel'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
   
    $insertquery = "INSERT INTO demo_10 (name,url,funnel,email,password) values ('$name','$url','$funnel','$email','$password')";
    $res = mysqli_query($conn,$insertquery);
    $id=mysqli_insert_id($conn);

    foreach ($_REQUEST['number_of_members'] as $index => $value){
        $insertquerychild = "INSERT INTO `demo_10 child`(`demo_10 id`, `no of members`, `percentage`) VALUES ('$id','$value','".$_REQUEST['percentage'][$index]."')";
        $reschild = mysqli_query($conn,$insertquerychild);
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
?>