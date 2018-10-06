<div class="w3-sidebar w3-bar-block w3-light-grey w3-card-2" style="width:13%;padding-top:55px">
<a href="<?php echo base_url('');?>" class="w3-bar-item w3-button nav-link"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 20px;font-style: none"></i> &nbsp;Dashboard</a>
<a href="<?php echo base_url('Home/opening_hours');?>" class="w3-bar-item w3-button nav-link" data-toggle="tooltip" title="Enter your resturent openning times"><i class="fas fa-clock" aria-hidden="true" style="font-size: 20px;font-style: none"></i>&nbsp; Opening Hours</a>
<a class=" w3-bar-item w3-button nav-link" onclick="myAccFunc()" >
    <i class="fas fa-clipboard-list" aria-hidden="true" style="font-size: 20px;font-style: none"></i> &nbsp; Menu Setup <i class="fa fa-caret-down"></i>
</a>
<div id="demoAcc" class="w3-hide w3-white w3-card-2">
    <a href="<?php echo base_url('Home/food_category');?>" class="w3-bar-item w3-button nav-link">&nbsp;&nbsp;<i class="fas fa-utensils"></i> &nbsp;Food Category</a>
    <a href="<?php echo base_url('Home/menu');?>" class="w3-bar-item w3-button nav-link">&nbsp;&nbsp;<i class="fas fa-clipboard-list" aria-hidden="true"></i> &nbsp;Menu</a>
</div>

<a class=" w3-bar-item w3-button nav-link" onclick="myAccFunc2()" >
    <i class="fas fa-shopping-cart" aria-hidden="true" style="font-size: 20px;font-style: none"></i> &nbsp; Orders <i class="fa fa-caret-down"></i>
</a>
<div id="demoAcc2" class="w3-hide w3-white w3-card-2">
    <a href="<?php echo base_url('Home/orders_pending');?>" class="w3-bar-item w3-button nav-link">&nbsp;&nbsp;<i class="fas fas fa-clock"></i> &nbsp;Pending</a>
    <a href="<?php echo base_url('Home/orders_completed');?>" class="w3-bar-item w3-button nav-link">&nbsp;&nbsp;<i class="fas fa-check-circle" aria-hidden="true"></i> &nbsp;Completed</a>
</div>





</div>
<script type="text/javascript">
	
	 function myAccFunc() {
                var x = document.getElementById("demoAcc");
                //x=document.getElementById("demoAcc2");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                    x.previousElementSibling.className += " w3-gray";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                    x.previousElementSibling.className =
                            x.previousElementSibling.className.replace(" w3-gray", "");
                }


            }

             function myAccFunc2() {
                var x = document.getElementById("demoAcc2");
                //x=document.getElementById("demoAcc2");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                    x.previousElementSibling.className += " w3-gray";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                    x.previousElementSibling.className =
                            x.previousElementSibling.className.replace(" w3-gray", "");
                }


            }
</script>