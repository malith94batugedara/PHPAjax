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
<div class="row">
    <div class="col-md-6">
      <h2>Users</h2>
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal">
           Add User
        </button>
    </div>
 </div>
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

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Add User</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form accept="" id="SubmitForm" method="post">
      <div class="modal-body">
          <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control clear-data" required />
          </div>
          <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control clear-data" required />
          </div>
          <div class="form-group">
              <label>Mobile</label>
              <input type="text" name="mobile" class="form-control clear-data" required />
          </div>
          <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" class="form-control clear-data" required />
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript">

  $('body').delegate('#SubmitForm','submit',function(e){
          e.preventDefault();
          $.ajax({
            type:"POST",
            url :"function.php?type=add",
            data : $(this).serialize(),
            dataType :"json",
            success : function(data){
               if(data.status == true){
                 alert(data.message); 
                 $('#userModal').modal('hide');
                 getData();
                 $('.clear-data').val();
               }
               else{
                 alert(data.message);
               }
            },
            error : function(data){

            }
        });
  });
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
