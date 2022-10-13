<?php 

if($_FILES['input_file']['name'] != ""){
    $filename=$_FILES['input_file']['name'];
    $extension=pathinfo($filename,PATHINFO_EXTENSION);
    $valid_extensions=array("jpg","png","jpeg","gif");
    
    if(in_array($extension,$valid_extensions)){
        
        $new_name=rand().".".$extension;
        $path="images/" . $new_name;
        if(move_uploaded_file($_FILES['input_file']['tmp_name'],$path)){
            echo '<img src="'.$path.'"><br><br><button data-path="'.$path.'" id="delete_btn">Delete</button>';
        }
    }else{
        echo "<script>alert('Invalid file format')</script>";
    }
}else{
    echo "<script>alert('Select a file')</script>";
   
}


?>