<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="index.php ">Trang chủ</a>
                </li>
                <li class="active">Chi tiết sản phẩm</li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <?php
            extract($onesp);
            $img_path = "upload/";
            $linkimg = $img_path . $product_img;
            echo '<div class="col-xl-7 col-lg-7 col-md-12">
                <div class="product-details-img mr-20 product-details-tab">
                    <div class="zoompro-wrap zoompro-2 pl-20">
                        <div class="zoompro-border zoompro-span">
                            <img class="zoompro" src="' . $linkimg . '" data-zoom-image="" alt=""/>          
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-lg-5 col-md-12">
                <div class="product-details-content">
                    <h2>' . $product_name . '</h2>
                    <div class="product-details-price">
                        <span>' . $product_price . '</span>
                        
                    </div>
                    <div class="pro-details-rating-wrap">
                        <div class="pro-details-rating">
                            <i class="fa fa-star-o yellow"></i>
                            <i class="fa fa-star-o yellow"></i>
                            <i class="fa fqtya-star-o yellow"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <span><a href="#">' . $product_view . ' Đánh giá</a></span>
                    </div>
                    <p>' . $product_content . '</p>
                    <div class="pro-details-list">
                        <ul>
                            <li>- 0.5 mm Dail</li>
                            <li>- Inspired vector icons</li>
                            <li>- Very modern style  </li>
                        </ul>
                    </div>
                    <form action="index.php?act=addtocart" method="post">
                    <div class="pro-details-quality">
                        <div class="cart-plus-minus">
                        <input class="cart-plus-minus-box" type="number" name="quantity" value="1" min="1">
                        </div>
                        <div class="pro-details-cart btn-hover">
                        <a href="#" style="line-height: 0;padding:0;margin-left: 20px;">
                            <input type="submit" name="addtocart" id="add-to-cart-form" value="Thêm vào giỏ hàng" style="     background: #ffffff00;     border: none;     color: white;     height: 0px;     margin: 7px 0px 7px 0px;     padding: 21px 19px;     font-weight: bold; ">
                        </a>
                        </div>
                    </div>
                        <input type="hidden" name="id" value="'.$product_id.'">
                        <input type="hidden" name="name" value="'.$product_name.'">
                        <input type="hidden" name="img" value="'.$product_img.'">
                        <input type="hidden" name="price" value="'.$product_price.'">
                        <input type="submit" name="addtocart" id="add-to-cart-form" value="Thêm vào giỏ hàng"  style="display: none;">
                    </form>


                    <div class="pro-details-meta">
                        <span>Categories :</span>
                        <ul>
                            <li><a href="#">Minimal,</a></li>
                            <li><a href="#">Furniture,</a></li>
                            <li><a href="#">Fashion</a></li>
                        </ul>
                    </div>
                    <div class="pro-details-meta">
                        <span>Tag :</span>
                        <ul>
                            <li><a href="#">Fashion, </a></li>
                            <li><a href="#">Furniture,</a></li>
                            <li><a href="#">Electronic</a></li>
                        </ul>
                    </div>
                    <div class="pro-details-social">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>';
            ?>

        </div>
    </div>
</div>



<div class="description-review-area pb-90">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a data-bs-toggle="tab" href="#des-details1">Additional information</a>
                <a class="active" data-bs-toggle="tab" href="#des-details2">Description</a>
                <a data-bs-toggle="tab" href="#des-details3">Reviews (2)</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                        <p>ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt </p>
                    </div>
                </div>
                <div id="des-details1" class="tab-pane ">
                    <div class="product-anotherinfo-wrapper">
                        <ul>
                            <li><span>Weight</span> 400 g</li>
                            <li><span>Dimensions</span>10 x 10 x 15 cm </li>
                            <li><span>Materials</span> 60% cotton, 40% polyester</li>
                            <li><span>Other Info</span> American heirloom jean shorts pug seitan letterpress</li>
                        </ul>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="review-wrapper">
                                <div class="single-review">
                                    <div class="review-img">
                                        <img src="assets/img/testimonial/1.jpg" alt="">
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="review-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-review ">
                                    <div class="review-img">
                                        <img src="assets/img/testimonial/2.jpg" alt="">
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="review-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper euismod vehicula. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="ratting-form-wrapper pl-50">
                                <h3>Add a Review</h3>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="star-box">
                                            <span>Your rating:</span>
                                            <div class="ratting-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Email" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="Your Review" placeholder="Message"></textarea>
                                                    <input type="submit" value="Submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- product details end -->
<div class=" mb">
    <h1 class="box_title text-center">SẢN PHẨM CÙNG LOẠI</h1>
    <div class="box_content" style="display: flex;overflow-x: auto;padding: 40px;">

        <?php
        foreach ($sp_cung_loai as $value) {
            echo '<a href="index.php?act=sanphamct&idsp=' . $value['product_id'] . '" style="cursor: pointer;">
                    <div class="product-container" id="productContainer" >
                    <!-- Repeat this block for each of the four products -->
                    <div class="product-card" style="flex: none;margin-right: 20px;width: 250px;    height: 300px;background-color: #fff;border: 1px solid #ddd;border-radius: 5px;overflow: hidden;">
                        <img src="upload/' . $value['product_img'] . '" alt="Product Image 1" style="  width: 100%;display: block;">
                    <div class="product-info" style="padding: 10px;">
                        <h3 style="  margin: 0;font-size: 1em;">' . $value['product_name'] . '</h3>
                        <p class="price" style="  color: red;font-weight: bold;">' . $value['product_price'] . '</p>
                        <!-- Include your star rating here -->
                    </div>
                </div>

  <!-- ... other product cards ... -->
</div>
</a>';
}
?>
