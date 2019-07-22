
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
      
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-headding">User Registration</h2>
                        <font id="reg_sucees" style="color:green;font-size:25px;"></font>
                    </div>

                    <form class="form" id="userForm">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" id="email"/>
                            </div>
                        </div>
                         <div class="form-group row">
                            <div class="col-md-4">
                                <label>Mobile</label>
                                <input type="text" class="form-control" name="mobile" id="phone"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="password"/>
                            </div>
                        </div>
                       
                        <a href="javascript:void(0);" class="btn btn-success" onclick="userAction('add')">Register</a>
                         <a href="javascript:void(0);" class="btn btn-success" onclick="userAction('login_page')">Login</a>
                    </form>
                </div>
            </div>

    </body>
</html>

<script>
    function userAction(type) {
       // alert();

        if (type === 'add') {
            $.ajax({
                url: "userAction.php",
                type: "POST",
                data: 'action_type=add&' + $("#userForm").serialize(),
                success: function (response) {
                    if (response === 'ok') {
                        $("#reg_sucees").html('Registration completed successfully....');
                        $('.form')[0].reset();
                        window.location.href = "login.php";

                    } else {
                        alert(response);
                    }
                }
            });

        }else if(type === 'login_page'){
            window.location.href = "login.php";
        }


    }
</script>


