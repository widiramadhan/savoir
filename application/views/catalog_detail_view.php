<!-- ***** Product Area Starts ***** -->
<section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-images">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                                        <!-- slides -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <a href="<?php echo base_url();?>assets/images/product/<?php echo $product['product_images_1'];?>" class="fancybox">
                                                    <img src="<?php echo base_url();?>assets/images/product/<?php echo $product['product_images_1'];?>" style="width:100%;height:450px;object-fit:cover;">
                                                </a>
                                            </div>

                                            <?php if($product['product_images_2'] != null) { ?>
                                            <div class="carousel-item">
                                                <a href="<?php echo base_url();?>assets/images/product/<?php echo $product['product_images_2'];?>" class="fancybox">
                                                    <img src="<?php echo base_url();?>assets/images/product/<?php echo $product['product_images_2'];?>" style="width:100%;height:450px;object-fit:cover;">
                                                </a>
                                            </div>
                                            <?php } ?>

                                            <?php if($product['product_images_3'] != null) { ?>
                                            <div class="carousel-item">
                                                <a href="<?php echo base_url();?>assets/images/product/<?php echo $product['product_images_3'];?>" class="fancybox">
                                                    <img src="<?php echo base_url();?>assets/images/product/<?php echo $product['product_images_3'];?>" style="width:100%;height:450px;object-fit:cover;">
                                                </a>
                                            </div>
                                            <?php } ?>

                                            <?php if($product['product_images_4'] != null) { ?>
                                            <div class="carousel-item">
                                                <a href="<?php echo base_url();?>assets/images/product/<?php echo $product['product_images_4'];?>" class="fancybox">
                                                    <img src="<?php echo base_url();?>assets/images/product/<?php echo $product['product_images_4'];?>" style="width:100%;height:450px;object-fit:cover;">
                                                </a>
                                            </div>
                                            <?php } ?>
                                        </div>

                                        <!-- Left right -->
                                        <a class="carousel-control-prev" href="#custCarousel" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#custCarousel" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="right-content">
                </br>
                
                  <h4><?php echo $product['product_name'];?></h4>
                    <span class="price">Brand : <?php echo $product['designer_name'];?></span>
                  <span class="price">Catalog : <?php echo $product['category_name'];?></span>
                    
                    <span><?php echo $product['product_description'];?></span>
                    <div class="quantity-content">
                    <div class="quote">
                        <i class="fa fa-quote-left"></i><p><?php echo $product['product_quotes'];?></p>
                    </div>
                    
                        
                       
                    </div>
                    <div class="total">
                        <h4>Price : Rp. <?php echo number_format($product['product_price']);?> </h4>
                        <?php if($product['product_stock'] == 0) { ?>
                            <div class="main-border-button" style="pointer-events: none;cursor: not-allowed;"><a href="#" style="pointer-events: none;cursor: not-allowed;">Sold Out</a></div>
                        <?php } else { ?>
                            <div class="main-border-button"><a href="#" data-toggle="modal" data-target="#exampleModal">Buy Now !</a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            	
            <div class="col-lg-12" align="center">
                <!-- Thumbnails -->
                <ol class="carousel-indicators list-inline">
                    <li class="list-inline-item">
                        <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel">
                        <img src="<?php echo base_url();?>assets/images/product/<?php echo $product['product_images_1'];?>" class="img-fluid">
                        </a>
                    </li>

                    <?php if($product['product_images_2'] != null) { ?>
                        <li class="list-inline-item">
                            <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel">
                            <img src="<?php echo base_url();?>assets/images/product/<?php echo $product['product_images_2'];?>" class="img-fluid">
                            </a>
                        </li>
                    <?php } ?>

                    <?php if($product['product_images_3'] != null) { ?>
                        <li class="list-inline-item">
                            <a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel">
                            <img src="<?php echo base_url();?>assets/images/product/<?php echo $product['product_images_3'];?>"  class="img-fluid">
                            </a>
                        </li>
                    <?php } ?>

                    <?php if($product['product_images_4'] != null) { ?>
                        <li class="list-inline-item">
                            <a id="carousel-selector-2" data-slide-to="3" data-target="#custCarousel">
                            <img src="<?php echo base_url();?>assets/images/product/<?php echo $product['product_images_4'];?>"  class="img-fluid">
                            </a>
                        </li>
                    <?php } ?>
                </ol>
            </div>
              
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form action="<?php echo base_url();?>buy" method="post">
        <input type="hidden" name="id" value="<?php echo $product['product_id'];?>">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $product['product_name'];?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Personal Information Form</h5>
                    <br>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Name</label>
                        <input class="form-control" type="text" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Email</label>
                        <input class="form-control" type="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Phone</label>
                        <input class="form-control" type="number" placeholder="Phone" name="phone" required  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==15) return false;" >
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Address</label>
                        <textarea name="address" class="form-control" placeholder="Address"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Product Information</h5>
                    <br>
                    <span style="font-size:14px;color:#999;"><?php echo $product['category_name'];?></span><br>
                    <b><?php echo $product['product_name'];?></b><br>
                    <div style="margin-top:20px;margin-bottom:20px;">
                        <a href="<?php echo base_url();?>assets/images/product/<?php echo $product['product_images_1'];?>" class="fancybox">
                            <img src="<?php echo base_url();?>assets/images/product/<?php echo $product['product_images_1'];?>"  style="width:100%;height:250px;object-fit:cover;" />
                        </a>
                    </div>
                    <b><span>Rp. <?php echo number_format($product['product_price']);?></span></b>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-dark">Buy Now</button>
        </div>
        </form>
    </div>
  </div>
</div>
<script type="text/javascript" >
$(document).ready( function () {
    $(".fancybox").fancybox();
} );
</script>