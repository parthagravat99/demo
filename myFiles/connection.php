<?php

$username = "root";
$password = "root1234";
$server = 'localhost';
$db = 'crud';

$conn = mysqli_connect($server,$username,$password,$db);

if($conn==0){?>
    <script>
            alert('no connection');
    </script>
<?php }
?>