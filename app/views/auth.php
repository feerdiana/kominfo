<link rel="stylesheet" href="<?=base_url()?>public/custom/css/login.css">
<div class="form-container form-signin">
    <form method="post" action="">
        <h2>Sign in <img src="<?=base_url()?>public/user-login.png" width="25%" hspace="10" align="right"></h2><hr />

        <div class="form-group">
            <input type="text" class="form-control" id="username" autofocus placeholder="username" required />
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="password" placeholder="password" required />
        </div>
        <div class="clearfix"></div><hr />
        <div class="form-group">
            <button type="button" onclick="login()" class="btn btn-block btn-primary">
                <i class="glyphicon glyphicon-log-in"></i>&nbsp;Sign In
            </button>
        </div>
    </form>
</div>
<script src="<?=base_url()?>public/bootstrap/js/jquery.js"></script>
<script>
    function login(){
        var username = $('#username').val();
        var password = $('#password').val();
        if(username==''){
            $.notify('Username is required', "warn");
        }else if(password==''){
            $.notify('Password is required', "warn");
        }else{
            $.ajax({
                type:"POST",
                url:"<?=base_url()?>cekLogiN",
                data:{username:username, password:password},
                cache:false,
                success:function(a){
                    if(a=='failed'){
                        $.notify('Incorrect username or password', "error");
                    }else{
                        $.notify("Successfully signed in with your account", "success");
                        setTimeout(function () {
                            $.notify("Please wait 3 seconds to be directed to the dashboard", "info");
                        }, 2000);
                        setTimeout(function () {
                            window.location = a;
                        }, 5000);
                    }
                },
                error: function () {
                    $.notify("Refresh this page and try again", "error");
                }
            });
        }
    }
</script>