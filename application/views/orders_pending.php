
<?php include('include/header.php'); ?>
<?php include('include/side_nav.php'); ?>
<div style="margin-left:13%" >
<div class="container" style="padding-top:60px">

	<div class="row w3-padding">
        <ol class="breadcrumb col-md-12">
            <li class="breadcrumb-item "><a href="<?php echo base_url('index.php/Home/index');?>">Home</a></li>
            <li class="breadcrumb-item active">Orders</li>
        </ol>
    </div>
    <div class="w3-card w3-padding">
         <header class="row w3-container w3-padding">
      <h1><i class="fas fa-clipboard-list"></i> Pending Orders</h1>
     

    </header><hr/>
    <div id="successMsg"></div>
        <div class="w3-container" id="result_data">

            <div class="row w3-section">
                                    <div class="col-sm-2"><h5 class="text-right" style="margin-top:4px">Search By :</h5></div>
                                    <div class="col-sm-3">

                                        <input class="w3-input w3-border " name="first" type="text" placeholder="Order ID" id="myInputTextField"></div>
                                    <div class="col-sm-3">
                                        <input class="w3-input w3-border " name="first" type="text" placeholder="Customer Name" id="myInputTextField2"></div>

                           
                           
            </div>
        </div>
            <table class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr class="w3-light-grey">
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Location</th>
                                    <th>Town</th>
                                    <th>Food Item</th>
                                    <th>Action(Complete Order)</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                if($feachData->num_rows()>0){

                                    foreach ($feachData->result() as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row->orderID?></td>
                                            <td><?php echo $row->name?></td>
                                            <td><?php echo $row->addressLine1 ." ".$row->addressLine2?></td>
                                            <td><?php echo $row->city?></td>
                                            <td><a href="#" class="offset-2 item-delete" data-toggle="tooltip" title="View Orderd Item" data="<?php echo $row->orderID ?>">
                                            <i class="fas fa-search"></i>
                                        </a></td>
                                        <td><a href="#" class="offset-2 item-complete" data-toggle="tooltip" title="Complete Order" data="<?php echo $row->orderID ?>">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </td>
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
    <!-- The Modal -->
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ordered Items</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="modal-body1">
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
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



        $(document).on("click", ".item-delete", function () {
        $('#myModal2').modal('show');
        var id=$(this).attr('data');
        //$('#editCategory').val(id);
         $.ajax({
            type:'ajax',
            method:'get',
            url:'<?php echo base_url();?>Order/LoadOrderItems',
            data:{id:id},
            async:true,
            dataType:'json',
            success: function(data){
             
                 var result='<table class="table table-striped table-bordered" id="example">'+
                            '<thead>'+
                                '<tr class="w3-light-grey">'+
                                    '<th>Name</th>'+
                                    '<th>Qty</th>'+
                                    '<th>Unit Price (Rs)</th>'+
                                    '</tr>'+
                            '</thead>'+
                            '<tbody>';
         var i;
         for (var i = 0; i < data.length; i++) {
          
          
           result +='<tr><td>'+data[i].name+'</td><td>'+data[i].qty+'</td><td>'+data[i].unitePrice+'</td></tr>';
         }
         result+='</tbody></table>'

         $('#modal-body1').html(result);
               
            },
            error:function(){
              
            }
          });
          
        
});

        $(document).on("click", ".item-complete", function () {
            var id=$(this).attr('data');
        //$('#editCategory').val(id);
         $.ajax({
            type:'ajax',
            method:'get',
            url:'<?php echo base_url();?>Order/Complete',
            data:{id:id},
            async:true,
            dataType:'json',
            success: function(data){
             if(data==true){
                var message='<div class="alert alert-dismissible alert-success"><button type="button" class="close"'+
              ' data-dismiss="alert">&times;</button>'+
  '<strong>Successfull.</strong> Order is completed.'+ 
'</div>';
             
              //$('#editCat')[0].reset();
              $('#successMsg').html(message).fadeIn(1000).fadeOut(9000);
                location.reload();
             }
                 

        
               
            },
            error:function(){
              
            }
          });
             }

        );

</script>
<?php include('include/footer.php'); ?>