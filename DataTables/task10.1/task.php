<!DOCTYPE html>
<html lang="en">
<?php
 include "connection.php";
 $sql="SELECT * FROM student";
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task 10</title>
    <style>
    /* h1 {
        margin-left: 575px;
    }

    #table {
        font-family: Arial;
        border-collapse: collapse;
        width: 60%;
        margin-left: 100px;
    }

    #table td,
    #table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #table tr:hover {
        background-color: #ddd;
    }

    #table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    } */

    #appendDiv{
        /* border:2px solid gray; */
    }
    #clone {
        display: none;
        
         /* visibility:hidden;  */
    }

    /* button {
        padding: 5px 20px;
        margin-left: 75px;
    }
    #main{
        width:70%;
    }
    .id{
        width:30px;
    }
    .input{
        width: 158px;
        display:flex; 
        justify-content: space-evenly;
    } */
    #main{
        /* margin-left: 441px; */
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
    button{
        /* max-height:30px; */
        position: fixed;
    max-height: 30px;
    right: 218px;
    top: 50%;
    }
    #lastButtons{
        margin-left: 635px;
    }
    </style>
</head>

<body>

    <form action="<?= $_SERVER['PHP_SELF']?>" method="GET">
    <div id="main" >
        <?php
       
        $result=mysqli_query($conn,$sql) or die('query failed');
        // echo "<pre>";
        // print_r($result);
        // die;
        
            // echo "ff".$result;
          
        ?>
            <table id="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Numbers of member</th>
                        <th>Percentage</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="appendDiv">
                    <?php 
                     if(mysqli_num_rows($result)>0){
                    while($raw=mysqli_fetch_assoc($result)){
                          
                    ?>
                    <tr>
                        <td ><?=$raw['sid']?></td>
                        <td><input type="text" name="member" value="<?=$raw['members']?>" /></td>
                        <td><input type="text" name="percentage" value="<?=$raw['percentage']?>"/></td>
                        <td class="input "><input type="button" name="delete" value="Delete"><input type="button" name="edit" value="EDIT"></td>
                    </tr> 
                    <?php }?>
                <?php } ?>
                    <tr id="clone">
                         <td ><span></span></td>
                         <td><input type="text" name="member" value="" /></td>
                         <td><input type="text" name="percentage" value=""/></td>
                         <td class="input "><input type="button" name="delete" value="Delete"><input type="button" name="edit" value="EDIT"></td>
                    </tr> 
                </tbody>
                
            </table>
        </div>
        <div id="lastButtons">
            <input type="submit" name="save" value="SAVE"/>
            <input type="submit" name="cancel" value="CANCEL"/>

            <button type="button" onclick="myfunction()" >Add</button>
    </div>
    </form>
</body>
 <script>
    var cloneCount = 0;
    function  myfunction(){
           cloneCount++;
           console.log(cloneCount);
        
      var target=document.querySelector('#clone');
      console.log(target);
      var x=target.cloneNode(true);
      console.log('ddd',x);
      document.getElementById("appendDiv").appendChild(x);
  
    //   document.getElementById('appendDiv').children[cloneCount - 1].style.visibility='visible';
     document.getElementById('appendDiv').lastChild.removeAttribute('id');
    //  document.getElementById('appendDiv').children[cloneCount - 1].setAttribute('id',`clone_${cloneCount}`);
     

    //   document.getElementById('appendDiv').children[0].style.display='none';
    //   console.log('ggg',document.getElementById('appendDiv').children[cloneCount - 1]);

    }
 </script>
    
</html>