<?php include('include/header.php'); ?>

<?php include('include/side_nav.php'); ?>
<div style="margin-left:13%" >
<div class="container" style="padding-top:6%">
	<div class="col-md-10 offset-1">

	  <div class="w3-card w3-padding">
         <header class="w3-container w3-padding">
      <h1><i class="fas fa-clock"></i> Opening Hours</h1><hr/>
    </header>

<div class="container">
  <div class="row w3-padding" id="message"></div>
	<div class="row">

		<div class="col-md-4"><h5>Opening Days</h5></div>
		<div class="col-md-2"><h5 class="">From  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -</h5></div>
		<div class="col-md-2"><h5>To</h5></div>
	</div>

    <?php echo form_open(''.base_url().'Registration/resturentOpenHours',array('id'=>'frmOpenHour'));?>
        <div class="row">
        	<div class="col-md-4 w3-padding " >
        		 <div class="btn-group btn-group-lg">
				    <div type="" class="btn btn-success">
				  	<label class="btn form-check-label">
      					<input class="form-check-input" type="checkbox" id="mon" name="mon" value="Mon" /> Mon
    				</label>
    			 </div>
				 
    		
    			
				      </div> 
        	</div>
       <div class="col-md-2 w3-padding">
      		
                <div class="form-group">
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                   
                    <input type="text" class="w3-input form-control datetimepicker-input dp1" id="datetimepicker1" data-toggle="datetimepicker" data-target="#datetimepicker1" disabled="disabled" name="dp1" required="required"/>
                </div>
            </div>
           
            <script type="text/javascript">
              $(document).ready(function(){

          });
            $(function () {
                $('#datetimepicker1').datetimepicker({
                    format: 'LT'
                });
            });

            
        </script>
       </div>
       <div class="col-md-2 w3-padding">
       		
                <div class="form-group">
                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input dp1" id="datetimepicker2" data-toggle="datetimepicker" data-target="#datetimepicker2" disabled="disabled" name="dp2" required="required"/>
                    
                </div>
            </div>
           
            <script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    format: 'LT'
                });
            });

            $('#mon').change(function(){
                     if($('#mon').is( ":checked" )){
                      $('.dp1').removeAttr('disabled');
                         
                      }else{
                     $('.dp1').attr('disabled', '');
                     $('.dp1').val('');
                      }
                //alert('sf');
                 
                    
            });
        </script>
       </div>
</div>
<div class="row">
          <div class="col-md-4 w3-padding " >
             <div class="btn-group btn-group-lg">
          <div type="" class="btn btn-success">
            <label class="btn form-check-label">
                <input class="form-check-input" type="checkbox" id="tue" name="tue" value="Tue"/> Tue
            </label>
           </div>
         
          
          
        </div> 
          </div>
       <div class="col-md-2 w3-padding">
          
                <div class="form-group">
                <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                   
                    <input type="text" class="w3-input form-control datetimepicker-input dp2" id="datetimepicker3" data-toggle="datetimepicker" data-target="#datetimepicker3" disabled="disabled" name="dp3" required="required"/>
                </div>
            </div>
           
            <script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
            });
        </script>
       </div>
       <div class="col-md-2 w3-padding">
          
                <div class="form-group">
                <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input dp2" id="datetimepicker4" data-toggle="datetimepicker" data-target="#datetimepicker4" disabled="disabled" name="dp4" required="required"/>
                    
                </div>
            </div>
           
            <script type="text/javascript">
            $(function () {
                $('#datetimepicker4').datetimepicker({
                    format: 'LT'
                });
            });

            $('#tue').change(function(){
                     if($('#tue').is( ":checked" )){
                      $('.dp2').removeAttr('disabled');
                         
                      }else{
                     $('.dp2').attr('disabled', '');
                     $('.dp2').val('');
                      }
                //alert('sf');
                 
                    
            });
        </script>
       </div>
</div>
<div class="row">
          <div class="col-md-4 w3-padding " >
             <div class="btn-group btn-group-lg">
          <div type="" class="btn btn-success">
            <label class="btn form-check-label">
                <input class="form-check-input" type="checkbox" id="wed" name="wed" value="Wed"  /> Wed
            </label>
           </div>
         
          
          
        </div> 
          </div>
       <div class="col-md-2 w3-padding">
          
                <div class="form-group">
                <div class="input-group date" id="datetimepicker5" data-target-input="nearest">
                   
                    <input type="text" class="w3-input form-control datetimepicker-input dp3" id="datetimepicker5" data-toggle="datetimepicker" data-target="#datetimepicker5" disabled="disabled" name="dp5" required="required"/>
                </div>
            </div>
           
            <script type="text/javascript">
            $(function () {
                $('#datetimepicker5').datetimepicker({
                    format: 'LT'
                });
            });
        </script>
       </div>
       <div class="col-md-2 w3-padding">
          
                <div class="form-group">
                <div class="input-group date" id="datetimepicker6" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input dp3" id="datetimepicker6" data-toggle="datetimepicker" data-target="#datetimepicker6" disabled="disabled" name="dp6" required="required"/>
                    
                </div>
            </div>
           
            <script type="text/javascript">
            $(function () {
                $('#datetimepicker6').datetimepicker({
                    format: 'LT'
                });
            });

            $('#wed').change(function(){
                     if($('#wed').is( ":checked" )){
                      $('.dp3').removeAttr('disabled');
                         
                      }else{
                     $('.dp3').attr('disabled', '');
                     $('.dp3').val('');
                      }
                //alert('sf');
                 
                    
            });
        </script>
       </div>
</div>
<div class="row">
          <div class="col-md-4 w3-padding " >
             <div class="btn-group btn-group-lg">
          <div type="" class="btn btn-success">
            <label class="btn form-check-label">
                <input class="form-check-input" type="checkbox" id="thu" name="thu" value="Thu"  /> Thu
            </label>
           </div>
         
          
          
        </div> 
          </div>
       <div class="col-md-2 w3-padding">
          
                <div class="form-group">
                <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                   
                    <input type="text" class="w3-input form-control datetimepicker-input dp4" id="datetimepicker7" data-toggle="datetimepicker" data-target="#datetimepicker7" disabled="disabled" name="dp7" required="required"/>
                </div>
            </div>
           
            <script type="text/javascript">
            $(function () {
                $('#datetimepicker7').datetimepicker({
                    format: 'LT'
                });
            });
        </script>
       </div>
       <div class="col-md-2 w3-padding">
          
                <div class="form-group">
                <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input dp4" id="datetimepicker8" data-toggle="datetimepicker" data-target="#datetimepicker8" disabled="disabled" name="dp8" required="required"/>
                    
                </div>
            </div>
           
            <script type="text/javascript">
            $(function () {
                $('#datetimepicker8').datetimepicker({
                    format: 'LT'
                });
            });

            $('#thu').change(function(){
                     if($('#thu').is( ":checked" )){
                      $('.dp4').removeAttr('disabled');
                         
                      }else{
                     $('.dp4').attr('disabled', '');
                     $('.dp4').val('');
                      }
                //alert('sf');
                 
                    
            });
        </script>
       </div>
</div>
<div class="row">
          <div class="col-md-4 w3-padding " >
             <div class="btn-group btn-group-lg">
          <div type="" class="btn btn-success">
            <label class="btn form-check-label">
                <input class="form-check-input" type="checkbox" id="fri" name="fri" value="Fri"/> Fri
            </label>
           </div>
         
          
          
        </div> 
          </div>
       <div class="col-md-2 w3-padding">
          
                <div class="form-group">
                <div class="input-group date" id="datetimepicker9" data-target-input="nearest">
                   
                    <input type="text" class="w3-input form-control datetimepicker-input dp5" id="datetimepicker9" data-toggle="datetimepicker" data-target="#datetimepicker9" disabled="disabled" name="dp9" required="required"/>
                </div>
            </div>
           
            <script type="text/javascript">
            $(function () {
                $('#datetimepicker9').datetimepicker({
                    format: 'LT'
                });
            });
        </script>
       </div>
       <div class="col-md-2 w3-padding">
          
                <div class="form-group">
                <div class="input-group date" id="datetimepicker10" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input dp5" id="datetimepicker10" data-toggle="datetimepicker" data-target="#datetimepicker10" disabled="disabled" name="dp10" required="required"/>
                    
                </div>
            </div>
           
            <script type="text/javascript">
            $(function () {
                $('#datetimepicker10').datetimepicker({
                    format: 'LT'
                });
            });

            $('#fri').change(function(){
                     if($('#fri').is( ":checked" )){
                      $('.dp5').removeAttr('disabled');
                         
                      }else{
                     $('.dp5').attr('disabled', '');
                     $('.dp5').val('');
                      }
                //alert('sf');
                 
                    
            });
        </script>
       </div>
</div>
<div class="row">
          <div class="col-md-4 w3-padding " >
             <div class="btn-group btn-group-lg">
          <div type="" class="btn btn-success">
            <label class="btn form-check-label">
                <input class="form-check-input" type="checkbox" id="sat" name="sat" value="Sat"/> Sat
            </label>
           </div>
         
          
          
        </div> 
          </div>
       <div class="col-md-2 w3-padding">
          
                <div class="form-group">
                <div class="input-group date" id="datetimepicker11" data-target-input="nearest">
                   
                    <input type="text" class="w3-input form-control datetimepicker-input dp6" id="datetimepicker11" data-toggle="datetimepicker" data-target="#datetimepicker11" disabled="disabled" name="dp11" required="required"/>
                </div>
            </div>
           
            <script type="text/javascript">
            $(function () {
                $('#datetimepicker11').datetimepicker({
                    format: 'LT'
                });
            });
        </script>
       </div>
       <div class="col-md-2 w3-padding">
          
                <div class="form-group">
                <div class="input-group date" id="datetimepicker16" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input dp6" id="datetimepicker16" data-toggle="datetimepicker" data-target="#datetimepicker16" disabled="disabled" name="dp12" required="required"/>
                    
                </div>
            </div>
           
            <script type="text/javascript">
            $(function () {
                $('#datetimepicker16').datetimepicker({
                    format: 'LT'
                });
            });

            $('#sat').change(function(){
                     if($('#sat').is( ":checked" )){
                      $('.dp6').removeAttr('disabled');
                         
                      }else{
                     $('.dp6').attr('disabled', '');
                     $('.dp6').val('');
                      }
                //alert('sf');
                 
                    
            });
        </script>
       </div>
</div>
<div class="row">
          <div class="col-md-4 w3-padding " >
             <div class="btn-group btn-group-lg ">
          <div type="" class="btn btn-success ">
            <label class="btn form-check-label">
                <input class="form-check-input" type="checkbox" id="sun" name="sun" value="Sun"/> Sun
            </label>
           </div>
         
          
          
        </div> 
          </div>
       <div class="col-md-2 w3-padding">
          
                <div class="form-group">
                <div class="input-group date" id="datetimepicker12" data-target-input="nearest">
                   
                    <input type="text" class="w3-input form-control datetimepicker-input dp7" id="datetimepicker12" data-toggle="datetimepicker" data-target="#datetimepicker12" disabled="disabled" name="dp13" required="required"/>
                </div>
            </div>
           
            <script type="text/javascript">
            $(function () {
                $('#datetimepicker12').datetimepicker({
                    format: 'LT'
                });
            });
        </script>
       </div>
       <div class="col-md-2 w3-padding">
          
                <div class="form-group">
                <div class="input-group date" id="datetimepicker14" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input dp7" id="datetimepicker14" data-toggle="datetimepicker" data-target="#datetimepicker14" disabled="disabled" name="dp14" required="required" />
                    
                </div>
            </div>
           
            <script type="text/javascript">
            $(function () {
                $('#datetimepicker14').datetimepicker({
                    format: 'LT'
                });
            });
            $('#sun').change(function(){
                     if($('#sun').is( ":checked" )){
                      $('.dp7').removeAttr('disabled');
                         
                      }else{
                     $('.dp7').attr('disabled', '');
                     $('.dp7').val('');
                      }
                //alert('sf');
                 
                    
            });
        </script>
       </div>
</div>
	<div class="row ">
		<div class="col-md-2">
		<button class="w3-btn w3-block w3-black w3-margin-bottom w3-padding-large" type="submit" id="submit" name="submit">Save</button>
		</div>
	</div>	
   <?php echo form_close();?>
   <div id="result2"></div>
   <div id="result"></div>
</div>
</div>
</div>
</div>
</div>	
<script type="text/javascript">
  
  $(document).ready(function(){

      showHotelDetails();
    function showHotelDetails(){
      $.ajax({
        type:'ajax',
        url:'<?php echo base_url();?>Registration/showResturentOpenHours',
        async:true,
        dataType:'json',
        success: function(data){
          var result='<table class="table">'+
    '<thead>'+
      '<tr>'+
        '<th>Opening Day</th>'+
        '<th>Opent time </th>'+
        '<th>Close time</th>'+
      '</tr>'+
    '</thead>'+
    '<tbody>';
          for (var i = 0; i < data.length; i++) {
              result += '<tr>'+
        '<td>'+data[i].availableDay+'</td>'+
        '<td>'+data[i].fromTime+'</td>'+
        '<td>'+data[i].toTime+'</td>'+
      '</tr>';
            //console.log('Sa');
          }
          result+=    '</tbody></table>';

          /*var =data[0].rstaurantName;
          var email=data[0].email;
          var ownerName=data[0].ownerName;
          var addressLine1=data[0].addressLine1;
          var addressLine2=data[0].addressLine2;
          var phone1=data[0].phone1;*/

          //var name=data[0].rstaurantName;
        // console.log(data);
        $('#result').html(result);
         //console.log(day);
        },
        error: function(){
          alert("No1");
        },
      });
    }


        $('#frmOpenHour').on('submit',function(form){
            form.preventDefault();

            
            $.post($("#frmOpenHour").attr("action"),
                        $("#frmOpenHour :input").serializeArray(),
                        function (data) {
                            var message='<div class="alert alert-dismissible alert-success col-md-12"><button type="button" class="close"'+
              ' data-dismiss="alert">&times;</button>'+
  '<strong>Successfull  </strong> saved date and time '+ 
'</div>';                       
  $('#result2').html(message);
                                $('#result').html(data);
                                showHotelDetails()
                           
                        });
        
        });

  });
</script>
