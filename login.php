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
            <h2 class="page-headding">User Login</h2>
        </div>
        
        <div class="show_res"></div>
        <div class="login_here"></div>
        <form class="form" id="loginForm">
                 
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" id="email"/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password"/>
                    </div>
                    
                    <a href="javascript:void(0);" class="btn btn-success" onclick="userAction('login')">Login</a>
                </form>
    </div>
</div>
   
    </body>
</html>

<script>
    function userAction(type){
        alert();
        if(type === 'login'){
            $.ajax({
               url:"userAction.php", 
               type:"POST",
               data:'action_type=user_login&'+$("#loginForm").serialize(),
               success:function(response){
                    if(response === 'ok'){
              
                $('.form')[0].reset();
                window.location.href = "edit.php";
                
            }else{
                alert(response);
            }   
               }
            });
        }
    }
</script>