<?php
 // read or show data from database
 $sql="SELECT * FROM student";
 $result=mysqli_query($conn,$sql) or die('query failed');
 
 if(mysqli_num_rows($result)>0){
    while($raw=mysqli_fetch_assoc($result)){
        ?>
        <tr >
             <td><input type="text" readonly  name="ids[]"  value="<?=$raw['sid']?>"></td>

             <td><input type="text" name="members[]" value="<?=$raw['members']?>" /></td>
             <td><input type="text" name="percentage[]" value="<?=$raw['percentage']?>"/></td>
             <td class="input "><input type="button" name="delete" onclick="removedata(this)" value="Delete"><input type="button" name="edit" value="EDIT"></td>
        </tr> 
        <?php }?>
<?php } ?>
