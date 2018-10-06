  
<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<link rel="shortcut icon" href="<?php echo base_url();?>assets/image/icon2.png" >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fontawesome-free-5.0.10/Fontawesome5/css/fontawesome-all.min.css" >
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/w3.css" integrity="" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/b2.min.css" integrity="" crossorigin="anonymous">
    <script src="<?php echo base_url();?>assets/angular.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/jquery.min.js"></script>
        <title>Resturent Admin Panel</title>

        <style>
      .form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 20%;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}
        </style>
    </head>


    <body background="<?php echo base_url();?>assets/image/background.jpg" >

        <div class="container">
    <div class="row">
        <div class=" col-sm-6 col-md-4 offset-4" >
           
            <div class="account-wall">
                <img class="profile-img" src="<?php echo base_url();?>assets/image/user-male-icon.png"
                    alt="">
                      <div id="result"></div>   

   <?php echo form_open(''.base_url().'Login/LoginUser',array('id'=>'frmReg'));?>
          
                <div class="form-signin">
                <input type="email" class="form-control" placeholder="Email" required autofocus name="email">
                <input type="password" class="form-control" placeholder="Password" required name="password">
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </div>
                 <?php echo form_close();?>
                  <a href="<?php echo base_url('Home/register');?>" class="text-center new-account">Create an account </a>
            </div>
           
        </div>
    </div>
</div>
  <script>
     $(document).ready(function(){

        $('#frmReg').on('submit',function(form){
            form.preventDefault();

            $.post($("#frmReg").attr("action"),
                        $("#frmReg :input").serializeArray(),
                        function (data) {
                            var message=data;
                               if (message==0) {
                                    //$('#result').html("data");
                                    window.location.href = '<?php echo base_url('Home/index');?>';
                                }else if(message==1){
                                    window.location.href = '<?php echo base_url('Admin/index');?>';
                                } 




                                else {
                                    // data.form contains the HTML for the replacement form
                                    $('#result').html(data);
                                }
                               

                           
                        });
        
        });
      });
</script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/jquery-3.2.1.js"></script>
<script src="<?php echo base_url();?>assets/popper.min.js"  ></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"  ></script>
</body>

</html>