<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Sortable - Connect lists</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <style>
  #sortable1, #sortable2 {
    border: 1px solid #eee;
    width: 142px;
    min-height: 20px;
    list-style-type: none;
    margin: 0;
    padding: 5px 0 0 0;
    float: left;
    margin-right: 10px;
  }
  #sortable1 li, #sortable2 li {
    margin: 0 5px 5px 5px;
    padding: 5px;
    font-size: 1.2em;
    width: 120px;
  }
  li.yellow{
    background-color:yellow;
  }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
    $(document).ready( function() {
      function sendData(api, data) {
        $.get(api, data, function(results) {
        });
      }
      $( "#sortable1, #sortable2" ).sortable({
        connectWith: ".connectedSortable",
        stop: function() {
      // This event is triggered when the user stopped sorting and the DOM position has changed.
      var table1 = $("#sortable1").sortable("toArray");
      var table2 = $("#sortable2").sortable("toArray");
      sendData("sort.php", {
        table1,table2
      });
    },
    
  }).disableSelection();
} );
</script>
</head>
<body>
  <ul id="sortable1" class="connectedSortable">
    <?php
  include '../myFiles/connection.php';
  $listQuery='SELECT * FROM `demo_17.1` WHERE `type` LIKE "type-1" ORDER BY `order` ASC';
  
  $listRes=mysqli_query($conn,$listQuery);

  while($listfetch=mysqli_fetch_array($listRes)){
  ?>
 
  <li class="ui-state-default" id="<?php echo $listfetch['id']?>"><?php echo $listfetch['name']?></li>
  <?php }?>
</ul>
<ul id="sortable2" class="connectedSortable">
 <?php
  
  $listQuery='SELECT * FROM `demo_17.1` WHERE `type` LIKE "type-2" ORDER BY `order` ASC';
  $listRes=mysqli_query($conn,$listQuery);

  while($listfetch=mysqli_fetch_array($listRes)){
  ?>
<li class="ui-state-default yellow" id="<?php echo $listfetch['id']?>"><?php echo $listfetch['name']?></li>
<?php } ?>

</ul>
 
</body>
</html>