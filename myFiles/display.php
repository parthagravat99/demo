<!DOCTYPE html>
<html lang="en">
<head>
    <title>
          Table of Jobregistration Form
    </title>
    <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
               padding: 8px;
            }
    </style>               
   

<body>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Degree</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Post</th>
        <th>Operation</th>
    </tr>
<?php

include 'connection.php';

$selectquery="SELECT * FROM jobregistration";

$query = mysqli_query($conn,$selectquery);
$i=1;
while($res = mysqli_fetch_array($query)){
?> 
    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $res['name'];?></td>
        <td><?php echo $res['degree'];?></td>
        <td><?php echo $res['mobile'];?></td>
        <td><?php echo $res['email'];?></td>
        <td><?php echo $res['post'];?></td>
        <td><a href="form.php?id=<?php echo $res['id'];?>" title="Edit">&#128221</a> &nbsp <a href="delete.php?id=<?php echo $res['id'];?>" title="Delete">&#128465</a> &nbsp <a href="view.php?id=<?php echo $res['id'];?>" title="View">&#128195</a></td>
    </tr> 
    
<?php   
    $i++;}
?>
</table>
</body>
</html>


  

