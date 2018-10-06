
<?php include('include/header.php'); ?>
<?php include('include/side_nav.php'); ?>
<div style="margin-left:13%" >
<div class="container" style="padding-top:60px">

	<div class="row w3-padding">
        <ol class="breadcrumb col-md-12">
            <li class="breadcrumb-item "><a href="<?php echo base_url('index.php/Home/index');?>">Home</a></li>
            <li class="breadcrumb-item active">User Account</li>
        </ol>
    </div>
    <div class="w3-card w3-padding">
         <header class="row w3-container w3-padding">
      <h1><i class="fas fa-user"></i> User Account</h1>
     

    </header><hr/>
    <div id="result"></div>
        <div class="w3-container">
                          <?php echo form_open(''.base_url().'User_update/updateResturent',array('id'=>'frmUser'));?>
                                <input type="hidden" name="userType" value=""/>

                                <div class="w3-padding">
                                    <label for="ResturentName">User Name *</label>
                                    <input class="w3-input w3-border" name="uname" type="text" placeholder="User Name" required="required" value="" id="uname"></div>
                            
                                <div class="w3-padding">
                                     <label for="ResturentName">Email Address *</label>
                                    <input class="w3-input w3-border" name="email" type="email" placeholder="Email Address" value="" required="required" id="email"></div>
                                <div class="w3-padding">
                                    <label for="ResturentName">Telephone Number </label>
                                    <input class="w3-input w3-border" name="TelNum" type="text" placeholder="Telephone Number" required="required" value="" id="TelNum"></div>
                             
                               


                                <div class="w3-padding ">
                                    <button class="w3-btn w3-block w3-black w3-margin-bottom w3-padding-large" type="submit" name="submit" id="submit">Update Profile</button></div>

  
  <?php echo form_close();?>
                        </div>
            
        </div>
    </div>
</div>
</div>	
<script type="text/javascript">
     $(document).ready(function(){



    showUser();
    function showUser(){
      $.ajax({
        type:'ajax',
        url:'<?php echo base_url();?>User_update/showUser',
        async:false,
        dataType:'json',
        success: function(data){
          var name=data[0].name;
          var email=data[0].email;
          var contactNo=data[0].contactNo;
          

          //var name=data[0].rstaurantName;
        // console.log(data);
         $('#uname').val(name);
         $('#email').val(email);
         $('#TelNum').val(contactNo);
         
        },
        error: function(){
          alert("No Data");
        },
      });
    }    

    $('#frmUser').on('submit',function(form){
            form.preventDefault();
               $.post($("#frmUser").attr("action"),
                        $("#frmUser :input").serializeArray(),
                        function (data) {
                               
                                $('#result').html(data).fadeIn(1000).fadeOut(6000);
                               showUser();
                           
                        });
          });

} );
</script>
<?php include('include/footer.php'); ?>