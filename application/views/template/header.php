<!DOCTYPE html>
<html lang="en">

  <head>

  <link rel="icon" href="<?php echo base_url('assets/images/logo(white).png');?>" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>SAVOIR JAKARTA</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl-carousel.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/lightbox.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert2.min.css');?>" type="text/css">
    <script src="<?php echo base_url();?>assets/js/jquery-2.1.0.min.js"></script>

    <!-- Fancybox -->
    <!-- Add fancyBox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
	<script src="<?php echo base_url('assets/js/sweetalert2.min.js');?>"></script>
  </head>
  <body>
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="<?php echo base_url();?>home" class="logo">
                            <img src="<?php echo base_url();?>assets/images/savoir_logo_lama.png">
                        </a>
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="<?php echo base_url();?>" class="">Home</a></li>
                            
                            <li class="submenu">
                                <a href="javascript:;">Catalog</a>
                                <ul>
                                    <?php foreach($category as $data_category) { ?>
                                        <li><a href="<?php echo base_url();?>catalog/<?php echo $data_category->category_slug;?>"><?php echo $data_category->category_name;?></a></li>                                    
                                    <?php } ?>
                                </ul>
                            </li>
                           
                           <li class="submenu">
                                <a href="javascript:;">Designer</a>
                                <ul>
                                    <?php foreach($designer as $data_designer) { ?>
                                        <li><a href="<?php echo base_url();?>designer/<?php echo $data_designer->designer_slug;?>"><?php echo $data_designer->designer_name;?></a></li>                                    
                                    <?php } ?>     
                                </ul>
                            </li>
                           
                            <li class="scroll-to-section"><a href="<?php echo base_url();?>about">About Us</a></li>
                            <li class="scroll-to-section"><a href="<?php echo base_url();?>contact">Contact Us</a></li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
<?php if($this->session->flashdata()) {?>
  <script>
    setTimeout(function() {
      swal({
        title : "<?php echo $this->session->flashdata('title');?>",
        text : "<?php echo $this->session->flashdata('message');?>",
        type: "<?php echo $this->session->flashdata('type');?>",
        timer: 2000,
        showConfirmButton: false
      });  
    },10);
  </script>
<?php } ?>