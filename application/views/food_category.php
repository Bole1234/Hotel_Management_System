<?php include('include/header.php'); ?>
<?php include('include/side_nav.php'); ?>
<div style="margin-left:13%" >
<div class="container" style="padding-top:60px">

   
    <div class="row w3-padding">
        <ol class="breadcrumb col-md-12">
            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/Home/index');?>">Home</a></li>
            <li class="breadcrumb-item active">Food Category</li>
        </ol>
    </div>
   <div class="w3-card w3-padding">
         <header class="row w3-container w3-padding">
      <h1><i class="fas fa-utensils"></i> Food Category</h1>

      <button type="button" class="btn btn-primary offset-7" data-toggle="modal" data-target="#myModal">
        Add Catogory
      </button>
    </header><hr/>
        <div id="successMsg">
           
         </div>
        <div class="w3-container" id="category_container">
         
         
              
             
        </div>
    </div>
  

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">New Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form id="addCat"  method="POST" action="<?php echo base_url();?>Food_category/enterCategory">
           <div class="form-group">
           
            <input type="text" class="form-control" id="categoryName" placeholder="Category Name" name="catName">
           
          </div>
           <div class="form-group">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input class="custom-file-input" id="inputFile" type="file" accept="image/*" name="inputFile">
                  <label class="custom-file-label" for="inputFile">Choose file</label>
                </div>
                
              </div>
              <div id="imageVal"></div>
          </div>
          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"  id="btnSave">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
 

   <!-- The Modal2 -->
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->

        <div class="modal-body">
          <form  id="editCat" method="POST" action="">
           <div class="form-group ">
           <input type="hidden" name="cat_ID" id="catID" value="0" />
            <input type="text" class="form-control " id="editCategory" placeholder="Category Name" name="catNameUpdate">
            
          </div>
           <div class="form-group">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input class="custom-file-input" id="inputFileUpdate" type="file" accept="image/*" name="inputFileUpdate">
                  <label class="custom-file-label" for="inputFileUpdate">Choose file</label>
                </div>
                
              </div>
              <div id="imageVal2"></div>
          </div>
          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="btnUpdate">Update</button>
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
    showHotelDetails();

    $('#btnSave').click(function(){
       var url=$('#addCat').attr('action');
       //var data=$('#addCat').serialize();
       var image_name = $("#inputFile").val();
       var catName=$('input[name=catName]');

       if(catName.val()==''){
        catName.addClass('is-invalid');
       }else{
        catName.removeClass('is-invalid');
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
                          var form = $('#addCat')[0]; // You need to use standard javascript object here
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
  '<strong>Successfull  </strong> added new food category '+ 
'</div>';
              $('#myModal').modal('hide');
              $('#addCat')[0].reset();
              $('#successMsg').html(message).fadeIn(1000).fadeOut(6000);
              showHotelDetails();
            },
            error:function(){
              alert('No');
            }
        });

}

}
       }
    });

    function showHotelDetails(){
      $.ajax({
        type:'ajax',
        url:'<?php echo base_url();?>Food_category/showCategory',
        async:true,
        dataType:'json',
        success: function(data){
         var result='';
         var i;
         for (var i = 0; i < data.length; i++) {
          
          
           result +='<div class="row media col-md-8 offset-1 w3-border w3-padding-24 w3-margin-bottom">'+
                '<div class="media-body">'+
                  '<div class="row w3-padding">'+
                  '<h4>'+data[i].name+'</h4>'+
                  
                    '<a  class="offset-5 item-delete" data-toggle="tooltip" title="Remove" data="'+data[i].cat_ID+'" style="cursor:pointer;color: red;">'+
                      '<i class="far fa-trash-alt "></i></a>'+
                   ' &nbsp;&nbsp;'+
                   ' <a class="open-AddBookDialog"  data-toggle="modal"  data="'+data[i].cat_ID+'" style="cursor:pointer;color: blue;">'+
                      '<i class="fas fa-edit"></i></a></div></div>'+
                '<img src="data:image/jpeg;base64,'+data[i].image+'" class="align-self-start mr-3 img" style="height:100px"/>'+
          '</div>';
         }
         $('#category_container').html(result);
        
        },
        error: function(){
          alert("There is no data...!");
        },
      });
    }

    //Edit data
    $(document).on("click", ".open-AddBookDialog", function () {
        $('#myModal2').modal('show');
        var id=$(this).attr('data');
        //$('#editCategory').val(id);
        $('#editCat').attr('action','<?php echo base_url();?>Food_category/updateCategory');
          $.ajax({
            type:'ajax',
            method:'get',
            url:'<?php echo base_url();?>Food_category/editCategory',
            data:{id:id},
            async:true,
            dataType:'json',
            success: function(data){
              
                $('#editCategory').val(data.name);
                $('#catID').val(data.cat_ID);
                var catName=$('input[name=catNameUpdate]');
                //alert(catName.val());
            },
            error:function(){
              alert('Update unsuccess');
            }
          });
        
})


//update
  $('#btnUpdate').click(function(){
       var url=$('#editCat').attr('action');
       var data=$('#editCat').serialize();
       var image_name = $("#inputFileUpdate").val();
       var catName=$('input[name=catNameUpdate]');

       if(catName.val()==''){
        catName.addClass('is-invalid');
       }else{

        catName.removeClass('is-invalid');

           if (image_name == '') {
                        // alert("Please Enter Image");
                         $('#editCat').attr('action','<?php echo base_url();?>Food_category/updateCategoryWI');
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
              $('#editCat')[0].reset();
              $('#successMsg').html(message).fadeIn(1000).fadeOut(6000);
              showHotelDetails();
            },
            error:function(){
              alert('No');
            }
        });
                    } else {

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
              $('#editCat')[0].reset();
              $('#successMsg').html(message).fadeIn(1000).fadeOut(6000);
              showHotelDetails();
            },
            error:function(){
              alert('No');
            }
        });

}

}

       }
    });

  //delete
  $(document).on("click", ".item-delete", function () {
      var id=$(this).attr('data');
      $('#deleteModel').modal('show');
      $('#btnDelete').unbind().click(function(){
              $.ajax({
            type:'ajax',
            method:'get',
            url:'<?php echo base_url();?>Food_category/deleteCategory',
            data:{id:id},
            async:true,
            dataType:'json',
            success: function(data){
              $('#deleteModel').modal('hide');
               var message='<div class="alert alert-dismissible alert-success"><button type="button" class="close"'+
              ' data-dismiss="alert">&times;</button>'+
  '<strong>Successfull  </strong> deleted food category '+ 
'</div>';
              $('#successMsg').html(message).fadeIn(1000).fadeOut(6000);
              showHotelDetails();
               
            },
            error:function(){
              alert('Delete unsuccess');
            }
          });
      });
  });


  });

</script>

<?php include('include/footer.php'); ?>