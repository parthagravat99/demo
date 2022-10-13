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
                height: 400px;
                min-height: 20px;
                list-style-type: none;
                margin: 0;
                padding: 5px 0 0 0;
                float: left;
                margin-right: 10px;
                overflow:scroll;
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
                        var category_id=($(this).attr("id")=="sortable1")?$("#list").val():0;
                        

                            $.ajax({
                            url:'sort.php',
                            data:{category_id,droppedElement},
                            
                        });
                    }
                }).disableSelection(); 

                $("#list").change(function(){
                    $.ajax({
                        url:'showdata.php?category_id='+$(this).val(),
                        dataType:'html',
                        success:function(response){
                            $("#sortable2").html(response);
                        }
                    });
                })
            });
        </script>
    </head>
    <body>
        <div>
        Category: <select name="" id="list">
            <option value="0"><--select a category--></option>
                <?php
                    include '../myFiles/connection.php';
                    $stateQuery="SELECT * FROM `product_category`";
                    $stateRes=mysqli_query($conn,$stateQuery);
                    while($stateFetch=mysqli_fetch_array($stateRes)){
                ?>
                <option value="<?php echo $stateFetch['category_id']?>"><?php echo $stateFetch['category_name']?></option>
                <?php }?>
            </select>
            </div>
                <br>
                Select items:<br><ul id="sortable1" class="connectedSortable" name="productCategory">
                <?php 
                    $productQuery="SELECT * FROM `product_list` WHERE `category_id`=0";
                    $productRes=mysqli_query($conn,$productQuery);
                    while($productFetch=mysqli_fetch_array($productRes)){
                ?>
                    <li class="ui-state-default" id="<?php echo $productFetch['product_id']?>"><?php echo $productFetch['product_list']?></li>
                <?php }?>
                </ul>
                
                <ul id="sortable2" class="connectedSortable" name="productList">
                    
                </ul>
    </body>
</html>