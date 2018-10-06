<?php include('include/header.php'); ?>
<?php include('include/side_nav.php'); ?>
<div style="margin-left:12%" >
<div class="container" style="padding-top:70px">
    
<div ng-app="" class="col-md-12">


  <div class="w3-card w3-padding">
         <header class="w3-container w3-padding">
      <h1><i class="fas fa-utensils"></i> Hotel Details</h1><hr/>
    </header>

        <div class="w3-container">
          <div id="successMsg">
            
          </div>
          <div id="result"></div>
          <?php echo form_open(''.base_url().'Resturent_load/updateResturent',array('id'=>'frmRest'));?>
          
<div class="form-group">
    <label for="ResturentName">Restaurent Name *</label>
    <input type="text" class="w3-input w3-border"    placeholder="" id="ResturentName" name="RestName" required="required">
    <small id="ResturentHelp" class="form-text text-muted">Please enter your resturent name correctly.</small>
  </div>
  
  
  <div class="pac-card form-group" id="pac-card">
      <div>
        
        <div id="type-selector" class="pac-controls" style="display:none">
          <input type="radio" name="type" id="changetype-all" checked="checked">
          <label for="changetype-all">All</label>

  
        </div>
      
      </div>
      <div id="pac-container" class="">
        <input id="pac-input" type="text" placeholder="Enter your address and confirm is it in google map" class="w3-input w3-border" name="addressLine1" required="required" >

        <small id="emailHelp" class="form-text">Please enter your location and confirm your address is allready in google map.</small>
        <input id="pac-input1" type="text" placeholder="latitude" class="w3-input w3-border" name="lat">
        <input id="pac-input2" type="text" placeholder="longitude" class="w3-input w3-border" name="lng">
      </div>
    </div>
    <div class="w3-border" id="map" style="height:500px"></div>
    
  <div class="form-group">
    <label for="exampleInputEmail1">Email address *</label>
    <input type="email" class="w3-input w3-border" id="Email" aria-describedby="emailHelp" placeholder="" name="email" required="required">
    <small id="emailHelp" class="form-text text-muted">Please enter your email address.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Phone number *</label>
    <input type="number" class="w3-input w3-border" id="phone" aria-describedby="emailHelp" placeholder="" name="phoneNo" required="required">
    <small id="emailHelp" class="form-text text-muted">Please enter your phone number.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Owner name </label>
    <input type="text" class="w3-input w3-border" id="owner" aria-describedby="emailHelp" placeholder="" name="ownerName" required="required">
    <small id="emailHelp" class="form-text text-muted">Please enter owner name.</small>
  </div>
 
  
  
  <button type="submit" class="w3-btn w3-block w3-black w3-margin-bottom w3-padding-large" id="btnSave">Submit</button>

<?php echo form_close();?>
        </div>
    </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var latitude=0;
  var longitude=0;
  $(document).ready(function(){
    showHotelDetails();
    function showHotelDetails(){
      $.ajax({
        type:'ajax',
        url:'<?php echo base_url();?>Resturent_load/showRestaurant',
        async:false,
        dataType:'json',
        success: function(data){
          var name=data[0].rstaurantName;
          var email=data[0].email;
          var ownerName=data[0].ownerName;
          var addressLine1=data[0].addressLine1;
           latitude=data[0].latitude;
           longitude=data[0].longitude;
          var phone1=data[0].phone1;

          //var name=data[0].rstaurantName;
        // console.log(data);
         $('#ResturentName').val(name);
         $('#Email').val(email);
         $('#owner').val(ownerName);
          $('#pac-input').val(addressLine1);
        
         $('#phone').val(phone1);
          $('#pac-input1').val(latitude);
         $('#pac-input2').val(longitude);
        },
        error: function(){
          alert("No Data");
        },
      });
    }


$('#frmRest').on('submit',function(form){
            form.preventDefault();
               $.post($("#frmRest").attr("action"),
                        $("#frmRest :input").serializeArray(),
                        function (data) {
                               
                                $('#result').html(data);
                               
                           
                        });
          });


  });


        function initMap() {
          var latitude=document.getElementById('pac-input1').value;
          var longitude=document.getElementById('pac-input2').value;
          console.log(latitude);
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat:6.9853025, lng: 81.05857900000001},
          zoom: 13
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        //var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete,'place_changed',function(){

          var place1=autocomplete.getPlace();

        });
        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
           //var formaAdd= place.formatted_address;
          
           var lat = place.geometry.location.lat();
          var lng = place.geometry.location.lng();
          document.getElementById('pac-input1').value=lat;
          
          document.getElementById('pac-input2').value=lng;
           //document.getElementById('addressLine1').value=formaAdd;
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });
      }
    </script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwR3zdEtUzqZ6m2t8AZb1cQGGEqbB-2_E&libraries=places&callback=initMap"
        async defer></script>
    <?php include('include/footer.php'); ?>
 