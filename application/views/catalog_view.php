 <!-- ***** Main Banner Area Start ***** -->
 <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2 align="left" style="color:black">Check Our Products</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2><?php echo $catalog['category_name'] ?? "Catalog";?></h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                    if($product->num_rows() == 0) {
                        echo "<div class='col-md-12'><center><h4>No data in this catalog</h4></center></div>";
                    } else {
                        foreach($product->result() as $data_product) { ?>
                        <div class="col-lg-3">
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
                <?php } } ?>
                <!-- <div class="col-lg-12">
                    <div class="pagination">
                        <ul>
                            <li>
                                <a href="#">1</a>
                            </li>
                            <li class="active">
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li>
                                <a href="#">4</a>
                            </li>
                            <li>
                                <a href="#">></a>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->