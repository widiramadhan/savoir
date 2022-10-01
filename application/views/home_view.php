<div class="main-banner" id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <div class="thumb">
                        <div class="inner-content" align="left">      
                        </div>
                        <img src="assets/images/left-banner-image2.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <div class="row">
                        <?php 
                        $no = 0;
                        foreach($category as $data_category) { 
                            if($no < 4) {
                                $no++;
                        ?>
                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4><?php echo $data_category->category_name;?></h4>
                                        <span>Best Choice For You</span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                        
                                            <div class="main-border-button">
                                                <a href="<?php echo base_url();?>catalog/<?php echo $data_category->category_slug;?>">Discover More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="<?php echo base_url();?>assets/images/category/<?php echo $data_category->category_images;?>" style="width:100%;height:280px;object-fit:cover;">
                                </div>
                            </div>
                        </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section" id="men">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>New Arrivals</h2>
                    <span>Discover the Newest items from Our Collection Everyday</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <?php 
                if($product->num_rows() < 4) { 
                    echo"<div class='row'>";
                    foreach($product->result() as $data_product) {
            ?>
                <div class="col-md-3">
                    <div class="col-md-12">
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="<?php echo base_url();?>catalog/detail/<?php echo $data_product->product_slug;?>"><i class="fa fa-eye"></i></a></li>
                                        
                                        <li><a href="<?php echo base_url();?>catalog/detail/<?php echo $data_product->product_slug;?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <?php if($data_product->product_stock == 0) { ?>
                                    <aside class="custom-banner">Sold</aside>
                                <?php } ?>
                                <img src="<?php echo base_url();?>assets/images/product/<?php echo $data_product->product_images_1;?>" alt="" style="width:100%;height:280px;object-fit:cover;">
                            </div>
                            <div class="down-content">
                                <h4><?php echo $data_product->product_name;?></h4>
                                <span>Rp. <?php echo number_format($data_product->product_price);?></span>    
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                </div>
            <?php } else { ?>
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        <?php 
                            $no_prod = 0;
                            foreach($product->result() as $data_product) {
                                $no_prod++;
                                if($no_prod < 6) {
                        ?>
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="<?php echo base_url();?>catalog/detail/<?php echo $data_product->product_slug;?>"><i class="fa fa-eye"></i></a></li>
                                        
                                        <li><a href="<?php echo base_url();?>catalog/detail/<?php echo $data_product->product_slug;?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <?php if($data_product->product_stock == 0) { ?>
                                    <aside class="custom-banner">Sold</aside>
                                <?php } ?>
                                <img src="<?php echo base_url();?>assets/images/product/<?php echo $data_product->product_images_1;?>" alt="" style="width:100%;height:280px;object-fit:cover;">
                            </div>
                            <div class="down-content">
                                <h4><?php echo $data_product->product_name;?></h4>
                                <span>Rp. <?php echo number_format($data_product->product_price);?></span>    
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<section class="section" id="women">
    <?php 
        foreach($category as $data_category) { 
        $products = $this->Base_model->getDataBy('product', array('is_active' => 1, 'category_id' => $data_category->category_id));
        if($products->num_rows() > 0) {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2><?php echo $data_category->category_name;?></h2>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <?php 
                if($products->num_rows() < 4) { 
                    echo"<div class='row'>";
                    foreach($products->result() as $data_products) {
            ?>
                <div class="col-md-3">
                    <div class="col-md-12">
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="<?php echo base_url();?>catalog/detail/<?php echo $data_products->product_slug;?>"><i class="fa fa-eye"></i></a></li>
                                        
                                        <li><a href="<?php echo base_url();?>catalog/detail/<?php echo $data_products->product_slug;?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <?php if($data_products->product_stock == 0) { ?>
                                    <aside class="custom-banner">Sold</aside>
                                <?php } ?>
                                <img src="<?php echo base_url();?>assets/images/product/<?php echo $data_products->product_images_1;?>" alt="" style="width:100%;height:280px;object-fit:cover;">
                            </div>
                            <div class="down-content">
                                <h4><?php echo $data_products->product_name;?></h4>
                                <span>Rp. <?php echo number_format($data_products->product_price);?></span>    
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                </div>
            <?php } else { ?>
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        <?php 
                            $no_prods = 0;
                            foreach($products->result() as $data_products) {
                                $no_prods++;
                                if($no_prods < 6) {
                        ?>
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="<?php echo base_url();?>catalog/detail/<?php echo $data_products->product_slug;?>"><i class="fa fa-eye"></i></a></li>
                                        
                                        <li><a href="<?php echo base_url();?>catalog/detail/<?php echo $data_products->product_slug;?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <?php if($data_products->product_stock == 0) { ?>
                                    <aside class="custom-banner">Sold</aside>
                                <?php } ?>
                                <img src="<?php echo base_url();?>assets/images/product/<?php echo $data_products->product_images_1;?>" alt="" style="width:100%;height:280px;object-fit:cover;">
                            </div>
                            <div class="down-content">
                                <h4><?php echo $data_products->product_name;?></h4>
                                <span>Rp. <?php echo number_format($data_products->product_price);?></span>    
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <br><br><hr><br><br>
    <?php } } ?>
</section>
<div class="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-heading">
                    <h2>By Subscribing To Our Newsletter You Can Get 250,000 VOUCHER</h2>
                    <span></span>
                </div>
                <form id="subscribe" action="<?php echo base_url();?>subscribe/save" method="post">
                    <div class="row">
                        <div class="col-lg-3">
                        <fieldset>
                            <input name="name" type="text" id="name" placeholder="Your Name" required maxlength="30">
                        </fieldset>
                        </div>
                        <div class="col-lg-3">
                        <fieldset>
                            <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email Address" required maxlength="50">
                        </fieldset>
                        </div>
                        <div class="col-lg-3">
                        <fieldset>
                            <input name="phone" type="number" id="phone" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==15) return false;" placeholder="Phone Number" required maxlength="15">
                        </fieldset>
                        </div>
                        <div class="col-lg-2">
                        <fieldset>
                            <button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
                        </fieldset>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-6">
                        <ul>
                            <li>Store Location:<br><span>Jln Cipete Raya No.9 Block B2, Jakarta Selatan</span></li>
                            <li>Phone:<br><span>Soon</span></li>
                            
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul>
                            <li>Work Hours:<br><span>10.00 AM – 04.00 PM Monday to Saturday</span></li>
                            <li>Email:<br><span>savoirjakarta@gmail.com</span></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>