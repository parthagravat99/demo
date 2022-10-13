<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Sortable - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <style>
  #sortable { 
    list-style-type: none; 
    margin: 0; 
    padding: 0; 
    width: 20%; 
  }
  #sortable li { 
    margin: 0 3px 3px 3px; 
    padding: 0.4em; 
    padding-left: 1.5em; 
    font-size: 1.4em; 
    height: 18px; 
  }
  #sortable li span { 
    position: absolute; 
    margin-left: -1.3em; 
  }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sortable" ).sortable({
      axis: 'y',
      update: function (event, ui) {
        var data = $(this).sortable('serialize');

        $.ajax({
          url:'sort.php',
          data:data,
        })
      }

    });
  } );
  </script>
</head>
<body>
<ul id="sortable">
<?php
  include '../myFiles/connection.php';

  $getQuery="SELECT * FROM `demo_17` ORDER BY `order` ASC ";
  $getQueryRes=mysqli_query($conn,$getQuery);


  while($getQueryFetch=mysqli_fetch_array($getQueryRes)){

?>
<li class="ui-state-default" id="item-<?php echo $getQueryFetch['id'];?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $getQueryFetch['name'];?></li>

<?php
}
 
 
 ?>
  
</ul>
 
 
</body>
</html>