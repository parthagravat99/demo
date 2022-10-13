<!DOCTYPE html>
<html>
    <head>
        <script>
            var validate=true;
            function onSubmit(){
                var validate=true;
                if(document.getElementById('username').value==""){
                    validate=false;
                }else if(document.getElementById('email').value==""){
                    validate=false;
                }else if(document.getElementById('password').value==""){
                    validate=false;
                }else if(document.getElementById('confirmPassword').value==""){
                    validate=false;
                }else if(document.getElementById('password').value != document.getElementById('confirmPassword').value){
                    alert("confirm password is not same as password.");
                    validate=false ;
                }
                console.log(validate);

                if(validate==false){
                    return false;
                }else{
                    return true;
                }
            }
        </script> 
        <style>
            input{
                margin : 1px;
            }
        </style>
    </head>
    <body>
    
    <?php
        include '../myFiles/connection.php';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $selectquery = "SELECT * FROM `demo_11` WHERE id=$id";
            $res = mysqli_query($conn,$selectquery);
        
            $arrdata = mysqli_fetch_array($res);

    $username = $arrdata['username'];
    $email = $arrdata['email'];
    $password = $arrdata['password'];
    $dashboard = $arrdata['dashboard'] =="1" ? "checked" : "";
    $providerList = $arrdata['providerList'] =="1" ? "checked" : "";
    $customerList = $arrdata['customerList'] =="1" ? "checked" : "";
    $jobList = $arrdata['jobList'] =="1" ? "checked" : "";
    $reviews = $arrdata['reviews'] =="1" ? "checked" : "";
    $complaintList = $arrdata['complaintList'] =="1" ? "checked" : "";
    $providerApprovalList = $arrdata['providerApprovalList'] =="1" ? "checked" : "";
    $needsApproval = $arrdata['needsApproval'] =="1" ? "checked" : "";
    $providerApproved = $arrdata['providerApproved'] =="1" ? "checked" : "";
    $faqList = $arrdata['faqList'] =="1" ? "checked" : "";
    
    
    }
    ?>
        

        <form action="<?php echo isset($_GET['id']) ? "update.php?id=".$id : "save.php" ?>" method="post" onsubmit="return onSubmit();">
                Username: <input type="text" name="username" id="username" value="<?php echo $username ?>"><br>
                Email: <input type="text" name="email" id="email" value="<?php echo $email ?>"><br>
                Password: <input type="password" name="password" id="password" value="<?php echo $password ?>"><br>
                Confirm Password: <input type="password" id="confirmPassword" value="<?php echo $password ?>"><br>
                <label>Assign Rights:</label><br>
                <input type="checkbox" name="dashboard" <?php echo $dashboard ?>>Dashboard<br>
                <input type="checkbox" name="providerList" <?php echo $providerList ?>>Provider list<br>
                <input type="checkbox" name="customerList" <?php echo $customerList ?>>Customer list<br>
                <input type="checkbox" name="jobList" <?php echo $jobList ?>>Job list<br>
                <input type="checkbox" name="reviews" <?php echo $reviews ?>>Reviews<br>
                <input type="checkbox" name="complaintList" <?php echo $complaintList ?>>Complaint list<br>
                <input type="checkbox" name="providerApprovalList" <?php echo $providerApprovalList ?>>Provider approval list<br>
                <input type="checkbox" name="needsApproval" <?php echo $needsApproval ?>>Needs approval<br>
                <input type="checkbox" name="providerApproved" <?php echo $providerApproved ?>>Provider approved<br>
                <input type="checkbox" name="faqList" <?php echo $faqList ?>>Faq list<br>
            <input type="submit" name="submit">
            <input type="button" value="Cancel">    
        </form>
    </body>
</html>