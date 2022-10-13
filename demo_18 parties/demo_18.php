<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
        <style>
            #sortable1, #sortable2 {
                border: 1px solid #eee;
                width: 25%;
                min-height: 270px;
                list-style-type: none;
                margin: 0;
                padding: 5px 0 0 0;
                float: left;
                margin-right: 10px;
            }
            #sortable1 li, #sortable2 li {
                margin: 0 5px 5px 5px;
                padding: 5px;
                font-size: 15px;
                width: 93%;
            }
            #list{
                width:48%;
            }
            #sortable2 li{
                background-color:yellow;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script>
            $(document).ready(function(){
                $( "#sortable1, #sortable2" ).sortable({
                    connectWith: ".connectedSortable",
                    stop:function(event,ui){
                        var droppedElement =ui.item.attr('id');
                        var state_id=$("#list").val();
                        var srcId=$(this).attr("id");
                        var destId = ui.item[0].parentNode.id;
                        console.log(ui);
                        if(srcId != destId){
                            $.ajax({
                            url:'sort.php',
                            data:{state_id,droppedElement,srcId,destId},
                            
                        });
                    }
                    }
                }).disableSelection(); 

                $("#list").change(function(){
                    $.ajax({
                        url:'showdata2.php?state_id='+$(this).val(),
                        dataType:'html',
                        success:function(response){
                            $("#sortable2").html(response);
                        }
                    });

                    $.ajax({
                        url:'showdata1.php?state_id='+$(this).val(),
                        dataType:'html',
                        success:function(response){
                            console.log(response);
                            $("#sortable1").html(response);
                        }
                    });
                })
            });
        </script>
    </head>
    <body>
        <div>
        State: <select name="" id="list">
            <option value="0"><--select a state--></option>
                <?php
                    include '../myFiles/connection.php';
                    $stateQuery="SELECT * FROM `tbl_states`";
                    $stateRes=mysqli_query($conn,$stateQuery);
                    while($stateFetch=mysqli_fetch_array($stateRes)){
                ?>
                <option value="<?php echo $stateFetch['id']?>"><?php echo $stateFetch['name']?></option>
                <?php }?>
            </select>
            </div>
                <br>
                Select parties:<br><ul id="sortable1" class="connectedSortable" name="selectParties">
                <!-- <?php 
                    $selectQuery="SELECT * FROM `party_list`";
                    $selectRes=mysqli_query($conn,$selectQuery);
                    while($selectFetch=mysqli_fetch_array($selectRes)){
                ?>
                    <li class="ui-state-default" id="<?php echo $selectFetch['id']?>"><?php echo $selectFetch['party_name']?></li>
                <?php }?> -->
                </ul>
                
                <ul id="sortable2" class="connectedSortable" name="selectedParties">
                    
                </ul>
    </body>
</html>