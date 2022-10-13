<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Table of demo_12
    </title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
        .pagination {
            display: inline-block;
        }
        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }
    </style>   
    <script>
        // function searchFunction(){
        //     var searchData = document.getElementById("search").value;
        //     window.location.href="display.php?search="+ searchData ;
        // }
        // function numberOfData(){
        //     var numberOfData = document.getElementById("numberOfData").value;
        //     window.location.href="display.php?numberOfData="+numberOfData;
        // }
        var k=0
        function checkAllFunction(element){
            
            var checkall=document.getElementsByClassName('checkbox'); 
            var i;
          
            for(i=0;i<checkall.length;i++){
                checkall[i].checked = element.checked;
            }
            }
            
    
    </script>          
</head>   
<body>
    <?php
        include '../myFiles/connection.php';       
        
        $page = isset($_GET['page'])?$_GET['page']:1;
        $numberOfData = isset($_GET['numberOfData'])?$_GET['numberOfData']:10;
        $pageOffset =isset($_GET['page'])?($_GET['page']-1)*$numberOfData:0;
        $search = isset($_GET['search'])?$_GET['search'] : "";
        $sort = $_GET['sort'];
        $order = $_GET['order'];

        $searchquery = "SELECT * FROM demo_11";
        
        if(isset($_GET['search']) && $search!=""){
            $searchquery=$searchquery." WHERE username LIKE '%$search%'";
        }
        if(isset($_GET['sort']) && $sort!=""){
            if(($order=="")||($order=="asc")){
                $searchquery = $searchquery." ORDER BY $sort asc";
            }else{
                $searchquery = $searchquery." ORDER BY $sort desc";
            }
        }

        if($numberOfData!="all"){
            $searchquery=$searchquery." LIMIT $numberOfData OFFSET $pageOffset";
        }
            $query = mysqli_query($conn,$searchquery);

        
        $countquery = "SELECT COUNT(*) FROM demo_11";
        if(isset($_GET['search']) && $search!=""){
            $countquery=$countquery." WHERE username LIKE '$search'";
        }
        $countRes=mysqli_query($conn,$countquery);
        $count=mysqli_fetch_array($countRes);
           
        $i=1;
    ?>

    <form action="display.php" method="GET">
    Show <select name="numberOfData" onchange="this.form.submit()">
        <option value="10" <?php echo ($numberOfData=="10")?"selected":""; ?>>10</option>
        <option value="20" <?php echo ($numberOfData=="20")?"selected":""; ?>>20</option>
        <option value="50" <?php echo ($numberOfData=="50")?"selected":""; ?>>50</option>
        <option value="100" <?php echo ($numberOfData=="100")?"selected":""; ?>>100</option>
        <option value="all" <?php echo ($numberOfData=="all")?"selected":""; ?>>All</option>
    </select> entries
    <input type="text" placeholder="Search.." name="search" id="search" value="<?php echo $search ?>" onkeyup="this.form.submit()" onfocus=" let value = this.value; this.value = null; this.value=value" autofocus>
    <!-- <button title="Search">&#128269</button> -->
    </form>
    <form action="delete.php" method="POST">
    <button type="submit" name="submit" style="margin:3px;float:right;">&#128465</button>
    <button type="button" onclick="window.location.href='demo_11.php'" style="margin:3px;float:right;">Add New</button>
    
    <table style="width:100%;">
        <tr>
            <th><input type="checkbox" onchange="checkAllFunction(this)"></th>
            <th><a href="display.php?sort=id&order=<?php echo(($order=="asc" && $sort=="id")?"desc":"asc")."&numberOfData=".$numberOfData?>" style="text-decoration:none;color:black;">Id</a></th>
            <th><a href="display.php?sort=username&order=<?php echo(($order=="asc" && $sort=="username")?"desc":"asc")."&numberOfData=".$numberOfData?>" style="text-decoration:none;color:black;">Username</a></th>
            <th><a href="display.php?sort=email&order=<?php echo(($order=="asc" && $sort=="email")?"desc":"asc")."&numberOfData=".$numberOfData?>" style="text-decoration:none;color:black;">Email</a></th>
            <th>Rights</th>
            <th>Action</th>
        </tr>
        <?php while($res = mysqli_fetch_array($query)){?> 
        <tr>
            <td><input type="checkbox" name="checkbox[]" value="<?php echo $res['id'];?>" class="checkbox"></td>
            <td style="text-align:center;"><?php echo $res['id'];?></td>
            <td><?php echo $res['username'];?></td>
            <td><?php echo $res['email'];?></td>
            <td>
                <?php
                    echo $res['dashboard'] == "1" ? "Dashboard, " : "";
                    echo $res['providerList'] == "1" ? "Provider list, " : "";
                    echo $res['customerList'] == "1" ? "Customer list, " : "";
                    echo $res['jobList'] == "1" ? "Job list, " : "";
                    echo $res['reviews'] == "1" ? "Reviews, " : "";
                    echo $res['complaintList'] == "1" ? "Complaint list, " : "";
                    echo $res['providerApprovalList'] == "1" ? "Provider approval list, " : "";
                    echo $res['needsApproval'] == "1" ? "Needs approval, " : "";
                    echo $res['providerApproved'] == "1" ? "Provider approved, " : "";
                    echo $res['faqList'] == "1" ? "FAQ list, " : "";
                ?>
            </td>
            <td style="text-align: center;"><a href="demo_11.php?id=<?php echo $res['id'];?>" title="Edit" style="color:white;">&#128221</a> &nbsp <a href="delete.php?id=<?php echo $res['id'];?>" title="Delete" style="color:white;">&#128465</a></td>
        </tr> 
        <?php $i++;}?>
    </table>
    </form>
    <div class="pagination">
        <?php if($page>1){?>
                <a href="display.php?page=<?php echo ($page-1)."&search=".$search."&sort=".$sort."&order=".$order."&numberOfData=".$numberOfData?>">&laquo;</a>
        <?php }
            for($i=1;$i<=ceil($count[0]/$numberOfData);$i++){
                echo "<a href='display.php?page=".$i."&search=".$search."&sort=".$sort."&order=".$order."&numberOfData=".$numberOfData."'>".$i."</a>";
            }
            if($page<ceil($count[0]/$numberOfData)){
        ?>
                <a href="display.php?page=<?php echo ($page+1)."&search=".$search."&sort=".$sort."&order=".$order."&numberOfData=".$numberOfData?>">&raquo;</a>
        <?php }?>    
    </div>
</body>
</html>