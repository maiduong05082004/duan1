<div class="product-area">
    <div class="container">
        <div class="section-title text-center">
            <h2>DAILY DEALS!</h2>
        </div>
        <div class="product-tab-list nav pt-30 pb-55 text-center">
            <a href="#product-1" data-bs-toggle="tab" >
                <h4>toiosd</h4>
            </a>
            <a class="active" href="#product-2" data-bs-toggle="tab">
                <h4>Best Sellers </h4>
            </a>
            <a href="#product-3" data-bs-toggle="tab">
                <h4>Sale Items</h4>
            </a>
        </div>
        <div class="tab-content jump">
            <div class="tab-pane" id="product-1">
                <div class="row">
                </div>
            </div>
            <div class="tab-pane active" id="product-2">
                <div class="row">
                <?php
                                     $i=0;
                                     $img_path="upload/";
                                     foreach($spnew as $sp){
                                         extract($sp);
                                         $hinh= $img_path.$product_img;
                                         $link="index.php?act=sanphamct&idsp=$product_id";
                                        //  if(($i==2)||($i==5)||($i==8)){
                                        //      $mr="";
                                        //  }else{
                                        //      $mr="mr";
                                        //  }
                                         echo '
                    <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                        <div class="product-wrap mb-25">
                            <div class="product-img">
                                <a href="'.$link.'">
                                    <img class="default-img" src="'.$hinh.'" alt="">
                                    <img class="hover-img" src="upload/hover-imga9.jpg" alt="">
                                </a>
                                <span class="pink">-10%</span>
                                <div class="product-action">
                                    <div class="pro-same-action pro-wishlist">
                                        <a title="Wishlist" href=""><i class="pe-7s-like"></i></a>
                                    </div>
                                    <div class="pro-same-action pro-cart">
                                        <a title="Add To Cart" href="'.$link.'"><i class="pe-7s-cart"></i> Add to cart</a>
                                    </div>
                                    <div class="pro-same-action pro-quickview">
                                        <a title="Quick View" href="'.$link.'" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content text-center">
                               
                                <h3><a href="index.php?act=sanphamct&id">'.$product_name.' </a></h3>
                                <div class="product-rating"  >
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product-price">
                                    
                                    <span>'.$product_price.'</span>
                                    <span class="old">'.$product_price.'</span>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
                ?>
                    