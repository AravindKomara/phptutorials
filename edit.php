<?php
require_once 'DB.php';
?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-headding">Edit User Details</h2>
                        <font id="edit_sucees" style="color:green;font-size:25px;"></font>
                    </div>
                    
                    <?php
                    session_start();
                    $sql = 'SELECT * FROM users WHERE id= '.$_SESSION["id"].' ';
                    $result = $connect->query($sql);
                    if($result->num_rows > 0){
                        $userdetails = mysqli_fetch_assoc($result);
                        ?>  <form class="form" id="editForm">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name"  value="<?php echo $userdetails['name']?>" id="name"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email"  value="<?php echo $userdetails['email']?>" id="email"/>
                            </div>
                        </div>
                         <div class="form-group row">
                            <div class="col-md-4">
                                <label>Mobile</label>
                                <input type="text" class="form-control" name="mobile"  value="<?php echo $userdetails['mobile']?>" id="phone"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password"  value="<?php echo $userdetails['password']?>" id="password"/>
                            </div>
                        </div>
                       
                        <a href="javascript:void(0);" class="btn btn-success" onclick="userAction('edit')">Edit details</a>
                        <a href="javascript:void(0);" class="btn btn-success" onclick="userAction('delete')">Delete Account</a>
                    </form>
                  <?php  }else{
                      echo "Error " .$sql. "<br>" .$connect->error;
                  }
                    ?>

                  
                </div>
            </div>

    </body>
</html>

<script>
    function userAction(type) {
        alert();

        if (type === 'edit') {
            $.ajax({
                url: "userAction.php",
                type: "POST",
                data: 'action_type=edit&' + $("#editForm").serialize(),
                success: function (response) {
                    if (response === 'ok') {
                        $("#edit_sucees").html('Your updated details saved successfully....');
                        $('.form')[0].reset();
                        window.location.reload();

                    } else {
                        alert(response);
                    }
                }
            });

        }else if(type === 'delete'){
           alert();
           $.ajax({
              url:"userAction.php",
              type:"POST",
              data:"action_type=delete",
              success:function(response){
                  if(response === 'deleted'){
                    $("#edit_sucees").html('Your account deleted successfully....');
                        window.location.href = "registration.php";

                    } else {
                        alert(response);
                    }
                  
              }
           });
        }


    }
</script>


