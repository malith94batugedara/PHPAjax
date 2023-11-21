<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
</head>
<body>

<div class="container">
  <h2>Users</h2>
  <!-- <p>The .table-bordered class adds borders to a table:</p>             -->
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Address</th>
        <th>Created_date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="getData">
      
    </tbody>
  </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
     function getData(){
        $.ajax({
            type:"POST",
            url :"function.php?type=list",
            dataType :"json",
            success : function(data){
               $('#getData').html(data.html);
            },
            error : function(data){

            }
        });
     }
     getData();
</script>
</body>
</html>
