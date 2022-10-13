<?php

include '../myFiles/connection.php';

if(isset($_POST['submit'])){
    
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
    
    $insertquery = "INSERT INTO demo_11 (username,email,password,dashboard,providerList,customerList,jobList,reviews,complaintList,providerApprovalList,needsApproval,providerApproved,faqList) values ('$username','$email','$password','$dashboard','$providerList','$customerList','$jobList','$reviews','$complaintList','$providerApprovalList','$needsApproval','$providerApproved','$faqList')";
   
    print_r($insertquery);
    $res = mysqli_query($conn,$insertquery);
    
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
header('Location: display.php');
?>