
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/image/icon2.png" >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fontawesome-free-5.0.10/Fontawesome5/css/fontawesome-all.min.css" >
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/w3.css" integrity="" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/b2.min.css" integrity="" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" integrity="" crossorigin="anonymous">
    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/jquery-3.2.1.js"></script>
    <script src="<?php echo base_url();?>assets/datatables.min.js"></script>
    <script src="<?php echo base_url();?>assets/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"  ></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/tempusdominus-bootstrap-4.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/tempusdominus-bootstrap-4.min.css" />
    <title>Restaurent Admin Panel</title>
    
      <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
    
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }
      #pac-container {
        
        padding: 10px 0 0 10px;
        margin-right: 0px;
        background-color: #fff;
      }

      .pac-controls {
        display: inline-block;
     
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
       
      }

       /* Stackoverflow preview fix, please ignore */
    .navbar-nav {
      flex-direction: row;
    }
    
    .nav-link {
      padding-right: .5rem !important;
      padding-left: .5rem !important;
    }
    
    /* Fixes dropdown menus placed on the right side */
    .ml-auto .dropdown-menu {
      left: auto !important;
      right: 0px;
    }
 .round{
 color: red;
 }
 .round:hover{
 color: red;

 }
 
    </style>
 
 
 
  </head>
  <body>
    
    <nav class="navbar fixed-top  navbar-expand-lg navbar-dark bg-dark w3-card">
  <a class="navbar-brand" href="#">Online Food Ordering System (System Admin)</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
   
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('email');?></a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-top:7px">
        
         
    
      <a class="dropdown-item w3-light-gray" href="<?php echo base_url('Home/login');?>"><i class="fas fa-power-off"></i> &nbsp; Logout</a>
      </div>
    </li>
  </ul>
   
  </div>
</nav>