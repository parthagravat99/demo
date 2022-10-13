<!DOCTYPE html>
<html lang="en">
<?php
include "connection.php";

    echo '<pre>';
  
    // echo 'hello';
    print_r($_REQUEST);
    $url_delId=$_REQUEST['del_Id'];
      print_r($url_delId);
  if(isset($_REQUEST['save'])){
    echo '<pre>';
    print_r($_REQUEST['ids'][0]);
    // print_r($_REQUEST['ids']);
 
    // print_r(sizeof($_REQUEST['ids']));
     die();
    // echo '<br>';
    for($i=0;$i<sizeof($_REQUEST['ids']);$i++){
        $members=$_REQUEST['members'][$i];
        $percentage=$_REQUEST['percentage'][$i];
        $ids=$_REQUEST['ids'][$i];
        if (($_REQUEST['ids'][$i]) == null) {
            if($members!='' && $percentage!=''){
            $sql1="INSERT INTO student ( members,percentage ) VALUES ({$members},{$percentage})";
            $result1=mysqli_query($conn,$sql1) or die("failed insert query"); 
            // echo "id not found".$sql1;
            }
        } 
        else 
        {   if($members!='' && $percentage!='' ){
            $sql2="UPDATE student set members='{$members}', percentage='{$percentage}' where sid={$ids}  ";
            $result2=mysqli_query($conn,$sql2) or die("failed upadate query"); 
            // echo "id found".$sql2;
        }
        }
    }
    if($_REQUEST['delete']){
        echo 'delete is set';
        // die();
    }
    
    header("Location:http://localhost/task10.1/index1.php");
    exit();
  }

  
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> index 1 task 10</title>
    <style>
    #appendDiv {
        /* border:2px solid gray; */

    }

    #clone {
        display: none;
    }

    #main {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        max-width: 900px;
        margin: 0 272px;
    }

    #table td,
    #table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .btn {
        position: fixed;
        right: 546px;
        top: 30%;
    }

    #lastButtons {
        margin-left: 635px;
    }
    </style>
</head>

<body>

    <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
        <div id="main">

            <table id="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Numbers of member</th>
                        <th>Percentage</th>
                        <th>Action</th>
                    </tr>
                    <tr id="clone">
                        <td><input type="hidden" value="" /></td>
                        <td><input type="number" value="" /></td>
                        <td><input type="number" value="" /></td>
                        <td class="input "><input type="submit" class="delete" name="delete" onclick="removedata(this)"
                                value="Delete"><input type="button" name="edit" value="EDIT"></td>
                    </tr>
                </thead>
                <?php
                // read or show data from database
                $sql="SELECT * FROM student";
                $result=mysqli_query($conn,$sql) or die('query failed');
                
                if(mysqli_num_rows($result)>0){
                    while($raw=mysqli_fetch_assoc($result)){
                        ?>
                <tr>

                    <td><input type="text" readonly name="ids[]" value="<?=$raw['sid']?>"></td>

                    <td><input type="text" name="members[]" value="<?=$raw['members']?>" /></td>
                    <td><input type="text" name="percentage[]" value="<?=$raw['percentage']?>" /></td>
                    <td class="input "><input type="submit" name="delete" onclick="removedata(this,<?= $raw['sid']?>)"
                            value="Delete"><input type="button" name="edit" value="EDIT"></td>
                </tr>
                <?php }?>
                <?php } ?>
                <tbody id="appendDiv"></tbody>

            </table>
        </div>
       
        <div id="lastButtons">
            <button type="submit" name="save" value="save" onclick="onClickSave(event)"
             >save</button>
            <button type="submit" name="cancel">cancel</button>
            <button class="btn" type="button" onclick="myfunction()">Add</button>
        </div>

    </form>

</body>
<script>
var cloneCount = 0;
let arrayId=[];
function myfunction() {
    cloneCount++;
    console.log(cloneCount);
    var target = document.querySelector('#clone');
    var x = target.cloneNode(true);
    //   var y= x.children;
    //  console.log("rrr",y);
    document.getElementById("appendDiv").appendChild(x);
    document.getElementById('appendDiv').lastChild.removeAttribute('id');
    document.querySelector("#appendDiv").lastChild.children[0].firstChild.setAttribute('name', 'ids[]');
    document.querySelector("#appendDiv").lastChild.children[1].firstChild.setAttribute('name', 'members[]');
    document.querySelector("#appendDiv").lastChild.children[2].firstChild.setAttribute('name', 'percentage[]');

}

function removedata(e,id) {
    // console.log("helo");
    // console.log("e",e.parentElement)
    console.log("e", e);
    arrayId.push(id);
    let box = e.parentElement.parentElement;
    box.remove();

}

function onClickSave(e) {
    e.preventDefault();
console.log('aaray',arrayId);
// window.location.href="http://localhost/task10.1/index1.php?del_Id="+arrayId+ '&&save=save';
}
</script>

</html>