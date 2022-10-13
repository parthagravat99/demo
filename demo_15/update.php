<?php

include '../myFiles/connection.php';

if(isset($_POST['submit']))

$ids = $_GET['id'];
echo $_GET['idS'];
$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$dashboard = isset($_REQUEST['dashboard'])? 1 : 0;
$providerList = isset($_REQUEST['providerList'])? 1 : 0;
$customerList = isset($_REQUEST['customerList'])? 1 : 0;
$jobList = isset($_REQUEST['jobList'])? 1 : 0;
$reviews = isset($_REQUEST['reviews'])? 1 : 0;
$complaintList = isset($_REQUEST['complaintList'])? 1 : 0;
$providerApprovalList = isset($_REQUEST['providerApprovalList'])? 1 : 0;
$needsApproval = isset($_REQUEST['needsApproval'])? 1 : 0;
$providerApproved = isset($_REQUEST['providerApproved'])? 1 : 0;
$faqList = isset($_REQUEST['faqList'])? 1 : 0;
           
$updatequery = "UPDATE `demo_11` SET `username`='$username',`email`='$email',`password`='$password',`dashboard`='$dashboard',`providerList`='$providerList',`customerList`='$customerList',`jobList`='$jobList',`reviews`='$reviews',`complaintList`='$complaintList',`providerApprovalList`='$providerApprovalList',`needsApproval`='$needsApproval',`providerApproved`='$providerApproved',`faqList`='$faqList' WHERE id='$ids'";
 
$res = mysqli_query($conn,$updatequery);

if($res){?>
        <script>
            alert('data updated successfully');
        </script>
    <?php }else{ ?>
        <script>
            alert('data not updated');
        </script>
    <?php }
header('Location: display.php');
?>