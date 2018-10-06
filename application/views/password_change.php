
<?php include('include/header.php'); ?>
<?php include('include/side_nav.php'); ?>
<div style="margin-left:13%" >
<div class="container" style="padding-top:60px">

	<div class="row w3-padding">
        <ol class="breadcrumb col-md-12">
            <li class="breadcrumb-item "><a href="<?php echo base_url('index.php/Home/index');?>">Home</a></li>
            <li class="breadcrumb-item active">Change Password </li>
        </ol>
    </div>
    <div class="w3-card w3-padding">
         <header class="row w3-container w3-padding">
      <h1><i class="fas fa-key"></i> Change Password</h1>
     

    </header><hr/>
    <div id="result"></div>
        <div class="w3-container">
                         <?php echo form_open(''.base_url().'User_update/PasswordChange',array('id'=>'frmPW'));?>
                                <input type="hidden" name="userType" value=""/>

                                <div class="w3-padding">
                                    <label for="ResturentName">Current Password *</label>
                                    <input class="w3-input w3-border" name="currentPW" type="password" placeholder="Current Password" required="required" value="" ></div>
                            
                                <div class="w3-padding">
                                     <label for="ResturentName">New Password *</label>
                                    <input class="w3-input w3-border" name="newPW" type="password" placeholder="New Password" value=""></div>
                                <div class="w3-padding">
                                    <label for="ResturentName">Confirm Password *</label>
                                    <input class="w3-input w3-border" name="cnewPW" type="password" placeholder="Confirm Password" id='mobile-num' data-validation="required" value=""><span id="folio-invalid" class="hidden mob-helpers" style="color:#B52323">

                                    </span></div>
                             
                               


                                <div class="w3-padding ">
                                    <button class="w3-btn w3-block w3-black w3-margin-bottom w3-padding-large" type="submit" name="submit" id="submit">Update </button></div>

  <?php echo form_close();?>
                        </div>
            
        </div>
    </div>
</div>
</div>	
<script type="text/javascript">
      $('#frmPW').on('submit',function(form){
            form.preventDefault();
               $.post($("#frmPW").attr("action"),
                        $("#frmPW :input").serializeArray(),
                        function (data) {
                               
                                $('#result').html(data).fadeIn(1000);
                              
                           
                        });
          });
</script>
<?php include('include/footer.php'); ?>