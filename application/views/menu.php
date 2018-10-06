<?php include('include/header.php'); ?>
<?php include('include/side_nav.php'); ?>
<div style="margin-left:13%" >
<div class="container" style="padding-top:60px">

   
    <div class="row w3-padding">
        <ol class="breadcrumb col-md-12">
            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/Home/index');?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/Home/food_category');?>">Food Category</a></li>
            <li class="breadcrumb-item active">Menu Items</li>
        </ol>
    </div>
   <div class="w3-card w3-padding">
         <header class="row w3-container w3-padding">
      <h1><i class="fas fa-clipboard-list"></i> Menu Items</h1>
      <button type="button" class="w3-btn btn btn-primary offset-7" data-toggle="modal"  data-target="#myModal">
        Add Item
      </button>

    </header><hr/>
         <div id="successMsg">
           
         </div>
         <div class="w3-container" id="result_data">

            <div class="row w3-section">
                                    <div class="col-sm-2"><h5 class="text-right" style="margin-top:4px">Search By :</h5></div>
                                    <div class="col-sm-3">

                                        <input class="w3-input w3-border " name="first" type="text" placeholder="Food Item" id="myInputTextField"></div>
                                    

                           
                           
            </div>
        </div>

        <table class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr class="w3-light-grey">
                                    <th>Food Item</th>
                                    <th>Unit Price (Rs)</th>
                                    <th>Availability</th>
                                    <th>Image</th>
                                    <th>Action</th>  
                                    
                                </tr>
                            </thead>
                            <tbody >
                               <?php 
                                if($feachData->num_rows()>0){

                                    foreach ($feachData->result() as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row->name?></td>
                                            <td><?php echo $row->unitePrice?></td>
                                            <td>
                                              <?php if($row->availability=="Available"){ ?>
                                              <span class="badge badge-success">Available</span>
                                              <?php }

                                              else{

                                                ?>
                                                <span class="badge badge-danger">Unavailable</span>
                                                <?php
                                              }
                                              ?>

                                            </td>
                                            <td><img src="data:image/jpeg;base64,<?php echo base64_encode($row->image) ?>" class="align-self-start mr-3 img" style="width:120px"/></td>
                                            <td><a href="#" class="offset-2 round item-delete" data-toggle="tooltip" title="Remove" data="<?php echo $row->foodItemID ?>">
                                            <i class="far fa-trash-alt "></i>
                                        </a>&nbsp;&nbsp;
                                          <a href="#" class="open-AddBookDialog" data-toggle="modal"  data-target="#myModal2" data="<?php echo $row->foodItemID ?>">
                                            <i class="fas fa-edit"></i>
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
  

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="addCat"  method="POST" action="<?php echo base_url();?>Menu_ctrl/enterMenu">
          <div class="form-group" id="select_1">
      
            
          </div>
          <div class="form-group">
           
            <input type="text" class="form-control" id="usr" placeholder="Item Name" name="itm_name" required="required">
          </div>
          <div class="form-group">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input class="custom-file-input" type="file" accept="image/*" name="inputFile" id="inputFile">
                  <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                </div>
                
              </div>
          </div>
          <div class="form-group">
  <label class="control-label">Unit Price</label>
        <div class="form-group">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Rs</span>
            </div>
            <input class="form-control" aria-label="Amount (to the nearest dollar)" type="text" name="unit_price" required="required">
            <div class="input-group-append">
              <span class="input-group-text">.00</span>
            </div>
          </div>
          </div>
        </div>
        </form>
        <div id="imageVal"></div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" name="btnSave" id="btnSave" type="submit">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

  <!-- The Modal 2-->
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="editCat" method="POST" >
            <input type="hidden" name="foodItemID" id="foodItemID" value="0" />
          <div class="form-group" id="select2">
      
            
          </div>
          <div class="form-group">
           
            <input type="text" class="form-control"  placeholder="Item Name" name="itm_name_up" id="ItemNameUp" required="required">
          </div>
          <div class="form-group">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input class="custom-file-input" name="inputFileUpdate" type="file" accept="image/*" id="inputFileUpdate">
                  <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                </div>
                
              </div>
          </div>
          <div class="form-group">
  <label class="control-label">Unit Price</label>
        <div class="form-group">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Rs</span>
            </div>
            <input class="form-control" aria-label="Amount (to the nearest dollar)" type="text" name="unit_price_up" id="unitePrice" required="required">
            <div class="input-group-append">
              <span class="input-group-text">.00</span>
            </div>
          </div>
          </div>
        </div>
        <hr/>
        <h3>Availability</h3>
        <div class="radio">
        <label><input type="radio" name="optradio" value="Available" id="avb">Available</label>
      </div>
        <label><input type="radio" name="optradio" value="Unavailable" id="unavb">Unavilable</label>
        <div class="radio">
        <div id="imageVal2"></div>
        </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btnUpdate">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
           <!--delete model-->
  <div class="modal fade" id="deleteModel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Confirm Delete</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->

        <div class="modal-body">
          Do you want to delete this record?
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" id="btnDelete">Delete</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>   
        </div>
    </div>

<script type="text/javascript">
  
  $(document).ready(function(){
   
    showItemDetails();

    $('#btnSave').click(function(){
       var url=$('#addCat').attr('action');
       //var data=$('#addCat').serialize();
       var image_name = $("#inputFile").val();
       var itm_name=$('input[name=itm_name]');
       var unit_price=$('input[name=unit_price]');
       if(itm_name.val()==''){
        itm_name.addClass('is-invalid');
       }else{
        itm_name.removeClass('is-invalid');
        //console.log(data);
          if (image_name == '') {
                        // alert("Please Enter Image");
                        $('#imageVal').html('<p style="color:red">Please Select a Image</p>');
                        return false;
                    } else {


                       var extention = $('#inputFile').val().split('.').pop().toLowerCase();
                        if (jQuery.inArray(extention, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                            //alert("Invalide image file");
                            $("#inputFile").val('');
                            $('#imageVal').html('<p style="color:red">Invalide image file</p>');
                            return false;
                        } else {
                          $('#imageVal').html('');
                    if(unit_price.val()==''){
                      unit_price.addClass('is-invalid');

                    }else{
                      unit_price.removeClass('is-invalid');

                      var cat_ID = $('#exampleSelect1').find(":selected").val();

                      if(cat_ID>0){
                         $('#imageVal').html('');
                          var form = $('#addCat')[0]; // You need to use standard javascript object here
                            var formData = new FormData(form);
                            //alert(cat_ID);
                          $.ajax({
                              type:'ajax',
                              method:'POST',
                              url:url,
                              data:formData,
                              processData: false,
                              contentType: false,
                              async:true,
                              dataType:'json',
                              success: function(data){
                                var message='<div class="alert alert-dismissible alert-success"><button type="button" class="close"'+
                                ' data-dismiss="alert">&times;</button>'+
                    '<strong>Successfull  </strong> added new food category '+ 
                  '</div>';
                                $('#myModal').modal('hide');
                                $('#addCat')[0].reset();
                                $('#successMsg').html(message).fadeIn(1000).fadeOut(6000);
                                location.reload();
                              },
                              error:function(){
                                alert('No');
                              }
                          });

                        }else{
                          $('#imageVal').html('<p style="color:red">Please select a category</p>');
                        }

                  }
}

}
       }
    });

        function showItemDetails(){
      $.ajax({
        type:'ajax',
        url:'<?php echo base_url();?>Menu_ctrl/selectFoodCategory',
        async:true,
        dataType:'json',
        success: function(data){
         var result=' <select class="form-control selDiv" id="exampleSelect1" name="cat_id"><option   value="0">--Please Select Food Category--</option>';
         var i;
         for (var i = 0; i < data.length; i++) {
          
          
          result+= '<option value="'+data[i].cat_ID+'">'+data[i].name+'</option>';
 
         }
         result+='</select>'
         $('#select_1').html(result);
        $('#select2').html(result);
        },
        error: function(){
          alert("There is no data...!");
        },
      });
    }

    function showMenuDetails(){
      $.ajax({
        type:'ajax',
        url:'<?php echo base_url();?>Menu_ctrl/showMenu',
        async:true,
        dataType:'json',
        success: function(data){
         var result='';
         var i;
         for (var i = 0; i < data.length; i++) {
          
          
          
 
         }
         
         $('#result_data').html(result);
        
        },
        error: function(){
          alert("There is no data...!");
        },
      });
    }

    //delete
  $(document).on("click", ".item-delete", function () {
      var id=$(this).attr('data');
      $('#deleteModel').modal('show');
      $('#btnDelete').unbind().click(function(){
              $.ajax({
            type:'ajax',
            method:'get',
            url:'<?php echo base_url();?>Menu_ctrl/deleteMenuItem',
            data:{id:id},
            async:true,
            dataType:'json',
            success: function(data){
              $('#deleteModel').modal('hide');
               var message='<div class="alert alert-dismissible alert-success"><button type="button" class="close"'+
              ' data-dismiss="alert">&times;</button>'+
  '<strong>Successfull  </strong> deleted food category '+ 
'</div>';
              $('#successMsg').html(message).fadeIn(1000).fadeOut(8000);
             location.reload();
               
            },
            error:function(){
              alert('Delete unsuccess');
            }
          });
      });
  });

  //Edit data
    $(document).on("click", ".open-AddBookDialog", function () {
        $('#myModal2').modal('show');
        var id=$(this).attr('data');
        //$('#editCategory').val(id);
        $('#editCat').attr('action','<?php echo base_url();?>Menu_ctrl/updateMenu');
          $.ajax({
            type:'ajax',
            method:'get',
            url:'<?php echo base_url();?>Menu_ctrl/editMenu',
            data:{id:id},
            async:true,
            dataType:'json',
            success: function(data){
              
                //$('#editCategory').val(data.name);
                $('#unitePrice').val(data.unitePrice);
                $('#ItemNameUp').val(data.name);
                $('#foodItemID').val(id);
                //$("#select_id").val(data.catID).change();
               // $('#select_1').val(data.catID);
                //var catName=$('input[name=catNameUpdate]')
                $('#exampleSelect1').prop('selectedIndex', data.catID);

                var avb=data.availability;
                if(avb=="Available"){
                 
                 $("#avb").attr('checked', 'checked');
                }else{
                 
                  $("#unavb").attr('checked', 'checked');
                }
               
            },
            error:function(){
              alert('Update unsuccess');
            }
          });
        
});

//update
  $('#btnUpdate').click(function(){
       var url=$('#editCat').attr('action');
       var data=$('#editCat').serialize();
       var image_name = $("#inputFileUpdate").val();
        var itm_name=$('input[name=itm_name_up]');
       var unit_price=$('input[name=unit_price_up]');
       if(itm_name.val()==''){
        itm_name.addClass('is-invalid');
       }else{

        itm_name.removeClass('is-invalid');

           if (image_name == '') {

            if(unit_price==''){
               $('#imageVal2').html('<p style="color:red">Please enter unit price</p>');
                        // alert("Please Enter Image");
                         
                       }else{
                       $('#editCat').attr('action','<?php echo base_url();?>Menu_ctrl/updateMenuWI');
                         var url=$('#editCat').attr('action');
                         var data=$('#editCat').serialize();
                         $.ajax({
            type:'ajax',
            method:'POST',
            url:url,
            data:data,
            
            async:true,
            dataType:'json',
            success: function(data){
              var message='<div class="alert alert-dismissible alert-success"><button type="button" class="close"'+
              ' data-dismiss="alert">&times;</button>'+
  '<strong>Successfull  </strong> edit food category '+ 
'</div>';
              $('#myModal2').modal('hide');
              //$('#editCat')[0].reset();
              $('#successMsg').html(message).fadeIn(1000).fadeOut(6000);
             location.reload();
            },
            error:function(){
              alert('Non');
            }
        });

                         }
                    } else {

                      if(unit_price!=''){
                       var extention = $('#inputFileUpdate').val().split('.').pop().toLowerCase();
                        if (jQuery.inArray(extention, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                            //alert("Invalide image file");
                            $("#inputFileUpdate").val('');
                            $('#imageVal2').html('<p style="color:red">Invalide image file</p>');
                            return false;
                        } else {
                          var form = $('#editCat')[0]; // You need to use standard javascript object here
                            var formData = new FormData(form);
        $.ajax({
            type:'ajax',
            method:'POST',
            url:url,
            data:formData,
            processData: false,
            contentType: false,
            async:true,
            dataType:'json',
            success: function(data){
              var message='<div class="alert alert-dismissible alert-success"><button type="button" class="close"'+
              ' data-dismiss="alert">&times;</button>'+
  '<strong>Successfull  </strong> edit food category '+ 
'</div>';
              $('#myModal2').modal('hide');
              //$('#editCat')[0].reset();
              $('#successMsg').html(message).fadeIn(1000).fadeOut(6000);
              showMenuDetails();
              $("#inputFileUpdate").val('');
            },
            error:function(){
              alert('No');
            }
        });

}
}else{

   $('#imageVal2').html('<p style="color:red">Please enter unit price</p>');
}
}

       }
    });

  });
</script>
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
<?php include('include/footer.php'); ?>