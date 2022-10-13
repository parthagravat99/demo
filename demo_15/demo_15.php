<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" charset="utf8" src="../DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css">
        <script type="text/javascript" charset="utf8" src="../DataTables/datatables.min.js"></script>
        <script>
            function onLoadFunction(){
                $(document).ready( function () {
                    $('#table_id').DataTable();
                } );
            }
        </script>
    </head>
    <body onload="onLoadFunction()">
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Rights</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include '../myFiles/connection.php';

                    $selectquery="SELECT * FROM demo_11";

                    $query = mysqli_query($conn,$selectquery);
                    $i=1;
                    while($res = mysqli_fetch_array($query)){
                ?> 
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $res['username'];?></td>
                    <td><?php echo $res['email'];?></td>
                    <td><?php
                            echo $res['dashboard'] == "1" ? "Dashboard," : "";
                            echo $res['providerList'] == "1" ? "Provider list," : "";
                            echo $res['customerList'] == "1" ? "Customer list," : "";
                            echo $res['jobList'] == "1" ? "Job list," : "";
                            echo $res['reviews'] == "1" ? "Reviews," : "";
                            echo $res['complaintList'] == "1" ? "Complaint list," : "";
                            echo $res['providerApprovalList'] == "1" ? "Provider approval list," : "";
                            echo $res['needsApproval'] == "1" ? "Needs approval," : "";
                            echo $res['providerApproved'] == "1" ? "Provider approved," : "";
                            echo $res['faqList'] == "1" ? "FAQ list" : "";
                        ?>
                    </td>
                    <td><a href="../demo_11/demo_11.php?id=<?php echo $res['id'];?>" title="Edit" style="color:white;">&#128221</a> &nbsp <a href="delete.php?id=<?php echo $res['id'];?>" title="Delete" style="color:white;">&#128465</a></td>
                </tr> 
                <?php   
                    $i++;}
                ?>
            </tbody>
        </table>        
    </body>
</html>