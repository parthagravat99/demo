<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" charset="utf8" src="../DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css">
        <script type="text/javascript" charset="utf8" src="../DataTables/datatables.min.js"></script>
        <script>
            function onLoadFunction(){
                $(document).ready( function () {
                    $('#myTable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: 'serverside.php',
                        columns: [
                            { data: 'id' ,sortable:false},
                            { data: 'username'},
                            { data: 'email'},
                            { data: 'rights',sortable:false},
                            { data: 'action',sortable:false},
                        ],
                        
                    });
                });
            }
        </script>
    </head>
    <body onload="onLoadFunction()">
        <table id="myTable" class="display" style="width:100%">
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
                
            </tbody>
        </table>        
    </body>
</html>