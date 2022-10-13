<?Php

include '../myFiles/connection.php';

$columnName = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'username',  'dt' => 1 ),
    array( 'db' => 'email',   'dt' => 2 ),
    array( 'db' => 'rights',     'dt' => 3 ),
);
$draw=$_GET['draw'];
$columns=$_GET['columns'];
$orderColumn=$_GET['order']['0']['column'];
$orderDir=$_GET['order']['0']['dir'];
$start=$_GET['start'];
$length=$_GET['length'];
$search=$_GET['search']['value'];
$finalOrderColumn=$columnName[$orderColumn]['db'];


$mainQuery="SELECT * FROM demo_11 
            WHERE id LIKE '%$search%' 
            OR username LIKE '%$search%' 
            OR email LIKE '%$search%' 
            ORDER BY $finalOrderColumn $orderDir 
            LIMIT $length OFFSET $start";

$queryRes = mysqli_query($conn,$mainQuery);

$data=[];
while($fetchQuery=mysqli_fetch_array($queryRes)){
    
    $row=[];
    $row['id']=$fetchQuery['id'];
    $row['username']=$fetchQuery['username'];
    $row['email']=$fetchQuery['email'];
    $row['rights']=($fetchQuery['dashboard'] == "1" ? "Dashboard, " : "")
                    .($fetchQuery['providerList'] == "1" ? "Provider list, " : "")
                    .($fetchQuery['customerList'] == "1" ? "Customer list, " : "")
                    .($fetchQuery['jobList'] == "1" ? "Job list, " : "")
                    .($fetchQuery['reviews'] == "1" ? "Reviews, " : "")
                    .($fetchQuery['complaintList'] == "1" ? "Complaint list, " : "")
                    .($fetchQuery['providerApprovalList'] == "1" ? "Provider approval list, " : "")
                    .($fetchQuery['needsApproval'] == "1" ? "Needs approval, " : "")
                    .($fetchQuery['providerApproved'] == "1" ? "Provider approved, " : "")
                    .($fetchQuery['faqList'] == "1" ? "FAQ list, " : "");
    $row['action']='<a href="../demo_11/demo_11.php?id='.$fetchQuery['id'].'"title="Edit" style="color:white;">&#128221</a>&nbsp<a href="delete.php?id='.$fetchQuery['id'].'"title="delete" style="color:white;">&#128465</a>';
    $data[]=$row;
}

$countquery = "SELECT COUNT(*) FROM demo_11";
$countRes=mysqli_query($conn,$countquery);
$count=mysqli_fetch_array($countRes);

if(isset($_GET['search']) && $search!=""){
    $filterquery=$countquery." WHERE username LIKE '$search'";
    $filtercountRes=mysqli_query($conn,$filterquery);
    $fcount=mysqli_fetch_array($filtercountRes);
    $filtercount=$fcount[0];
}else{
    $filtercount=$count[0];
}
// print_r($filtercount);

$response=[];
$response['draw']=$draw;
$response['recordsTotal']=$count[0];
$response['recordsFiltered']=$filtercount;
$response['data']=$data;
echo json_encode($response);
?>
