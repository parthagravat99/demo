<!DOCTYPE html>
<html lang="en">
<?php
include "connection.php";
    // if($_REQUEST['delete'] && $_REQUEST['save'] ){
    //     echo 'delete is set';
    //     $delete=$_REQUEST['delete'];
    //     $Temp;
    //     for($i=0;$i<sizeof($_REQUEST['ids']);$i++){
    //         if($_REQUEST['ids'][$i] != null){
    //             $Temp .= $_REQUEST['ids'][$i];
    //             if(sizeof($_REQUEST['ids']) - 1> $i){
    //                 $Temp .= ',';
    //             }
    //         }
    //     }
    //     echo 'temp='.$Temp;
    //     $Temp=strval($Temp);
    //     $Temp=rtrim($Temp,",");
    //     $sql3='DELETE FROM student where sid NOT IN '.'('.$Temp.')';
    //     $result3=mysqli_query($conn,$sql3) or die('delete failed');
        
    // }
      
    //  echo '<pre>';
    //  print_r($_REQUEST);
    //  die();
    if(isset($_REQUEST['save'])){
            $delete=$_REQUEST['delete_id'];
            // echo 'delete'.$delete;
            // $delete=$_REQUEST['delete'];
            // echo '<pre>';
            if(isset($_REQUEST['delete_id'])){
           
               $sql3='DELETE FROM student where sid IN '.'('.$delete.')';
               echo 'sql3:'.$sql3;
               $result3=mysqli_query($conn,$sql3) or die('delete failed');
        
            }
            for($i=0;$i<sizeof($_REQUEST['ids']);$i++){
                $members=$_REQUEST['members'][$i];
                $percentage=$_REQUEST['percentage'][$i];
                $ids=$_REQUEST['ids'][$i];
                if (($_REQUEST['ids'][$i]) == null) {
                    if($members!='' && $percentage!=''){
                    $sql1="INSERT INTO student ( members,percentage ) VALUES ({$members},{$percentage})";
                    $result1=mysqli_query($conn,$sql1) or die("failed insert query"); 
                    }
                } 
                else 
                {   if($members!='' && $percentage!='' ){
                    $sql2="UPDATE student set members='{$members}', percentage='{$percentage}' where sid={$ids}  ";
                    $result2=mysqli_query($conn,$sql2) or die("failed upadate query"); 
                }
                }
            }

    header("Location:http://localhost/task10.1/index1.php");
    exit();
  
  }
       
    // $arrayTemp;
    // for($i=0;$i<sizeof($_REQUEST['ids']);$i++){
    //     // $count = 0;
    //     if($_REQUEST['ids'][$i] != null){
    //         // echo $i." iiii ".sizeof($_REQUEST['ids'])-1 .'<br>';
    //         $arrayTemp .= $_REQUEST['ids'][$i];
    //         if(sizeof($_REQUEST['ids']) - 1> $i){
             
    //             $arrayTemp .= ',';
    //         }
        
    // }

    // }
 
    // $arrayTemp=strval($arrayTemp);
    // $arrayTemp=rtrim($arrayTemp,",");
    // echo 'dd'.$arrayTemp;
    
    // $sql3='DELETE FROM student where sid NOT IN '.'('.$arrayTemp.')';
    // $result3=mysqli_query($conn,$sql3) or die('delete failed');
    // echo 'sql3='.$sql3;
    // die();
  //  print_r($_REQUEST['ids'][$i]);
//  echo '<br>';
// $array=implode(',',$_REQUEST['ids']);
// echo 'fff'.$array;
// echo '<br>';
// $sql3='DELETE FROM student where sid NOT IN '.'('.$array.')';
// $result3=mysqli_query($conn,$sql3) or die('delete failed');
// echo 'sql3='.$sql3;
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
                    <td class="input "><input type="button" name="delete" onclick="removedata(this,<?= $raw['sid']?>)" value="delete"><input type="button" name="edit" value="EDIT"></td>
                </tr>
                <?php }?>
                <?php } ?>
                <tbody id="appendDiv"></tbody>

            </table>
        </div>
        <div>
            <input type="hidden" placeholder="my deleted ids" name="delete_id" id="delete_id" value=" 2">
        </div>
        <div id="lastButtons">
            <input type="hidden" name="delete[<?=$raw['sid']?>]"  value='delete'>
            <button type="submit" name="save" value="save">save</button>
            <button type="reset" name="cancel" >cancel</button>
            <button class="btn" type="button" onclick="myfunction()">Add</button>
        </div>

    </form>

</body>
<script>
var cloneCount = 0;
var array=[];
function myfunction() {
    cloneCount++;
    console.log(cloneCount);
    var target = document.querySelector('#clone');
    var x = target.cloneNode(true);
    document.getElementById("appendDiv").appendChild(x);
    document.getElementById('appendDiv').lastChild.removeAttribute('id');
    document.querySelector("#appendDiv").lastChild.children[0].firstChild.setAttribute('name', 'ids[]');
    document.querySelector("#appendDiv").lastChild.children[1].firstChild.setAttribute('name', 'members[]');
    document.querySelector("#appendDiv").lastChild.children[2].firstChild.setAttribute('name', 'percentage[]');

}

function removedata(e,value) {
    // console.log("helo");
    // console.log("ee",e.parentElement.parentElement);
    // console.log("e", e)
      let box = e.parentElement.parentElement;
      box.remove();
      var target=document.getElementById('delete_id');
      console.log('target:',target,value);  
      array.push(value);
      console.log('array',array);
      target.value=array;

}

function onClickSave() {

}
</script>

</html>