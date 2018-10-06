<?php include('include/header2.php'); ?>

<?php include('include/side_nav2.php'); ?>
<div style="margin-left:13%" >
	<div class="container" style="padding-top:60px">
<div class="row w3-padding">
        <ol class="breadcrumb col-md-12">
            <li class="breadcrumb-item "><a href="<?php echo base_url('Admin/index');?>">Home</a></li>
            <li class="breadcrumb-item active">App User</li>
        </ol>
    </div>
    <div class="w3-card w3-padding">
         <header class="row w3-container w3-padding">
      <h1><i class="fas fa-mobile"></i> Mobile App Users</h1>
     

    </header><hr/>
        <div class="w3-container" id="result_data">

            <div class="row w3-section">
                                    <div class="col-sm-2"><h5 class="text-right" style="margin-top:4px">Search By :</h5></div>
                                    <div class="col-sm-3">

                                        <input class="w3-input w3-border " name="first" type="text" placeholder="User Name" id="myInputTextField"></div>
                                    <div class="col-sm-3">
                                        <input class="w3-input w3-border " name="first" type="text" placeholder="Email" id="myInputTextField2"></div>

                           
                           
            </div>
        </div>
            <table class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr class="w3-light-grey">
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Contact Number</th>
                                    

                                    
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                if($App_user->num_rows()>0){

                                    foreach ($App_user->result() as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row->name?></td>
                                            <td><?php echo $row->email?></td>
                                            <td><?php echo $row->contactNo ?></td>
                                            
                                        </tr>
                                        <?php
                                        # code...
                                    }
                                }else{
                                    ?>
                                    <tr>
                                        <td colspan="4">No Data Found </td>

                                    </tr>
                                    <?php

                                }

                                ?>
                            	
                            </tbody>




                        </table>
        </div>
</div>
</div>
</div>	
<script type="text/javascript">
  $(document).ready(function(){

    oTable = $('#example').DataTable({

                    "sDom": "ltipr"

                });
     $('#myInputTextField').keyup(function () {
                    oTable.columns(0)
                            .search(this.value)
                            .draw();
                })
                $('#myInputTextField2').keyup(function () {
                    oTable.columns(1)
                            .search(this.value)
                            .draw();
                })

} );
</script>
