<!DOCTYPE html>
<html lang="en">
<head>
<title>
        Jobregistration Form
</title>
</head>
<body>
<?php 

include "connection.php";

if(isset($_GET['id'])){

$ids = $_GET['id'];

$showquery = "SELECT * from jobregistration where id=$ids";

$showdata = mysqli_query($conn,$showquery);

$arrdata = mysqli_fetch_array($showdata);

    $name = $arrdata['name'];
    $degree = $arrdata['degree'];
    $mobile = $arrdata['mobile'];
    $email = $arrdata['email'];
    $post = $arrdata['post'];

    ?><form action="save.php?id=<?php echo $ids;?>" method="POST" ><?php
}else{
?>
<form action="save.php" method="POST" ><?php } ?>
    Name: <input type="text" name="name" value="<?php echo $name;?>"><br>
    Degree: <input type="text" name="degree" value="<?php echo $degree;?>"><br>
    Mobile: <input type="text" name="mobile" value="<?php echo $mobile;?>"><br>
    Email: <input type="text" name="email" value="<?php echo $email;?>"><br>
    Post: <input type="text" name="post" value="<?php echo $post;?>"><br>
    <input type="submit" name="submit" value="submit">
</form>   

</body>
</html>

