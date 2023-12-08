<?php
$acc_name = ""; // Khởi tạo biến acc_name
if (isset($_SESSION['user'])) {
    $acc_name = $_SESSION['user']['acc_name']; // Lấy tên người dùng từ session
}
?>
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
                            <i class="fa fa-star-o yellow"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <span><a href="#">' . $product_view . ' Đánh giá</a></span>
                    </div>
                    <p>' . $product_content . '</p>
                    <div class="pro-details-list">
                        <ul>
                            <li>- Số lượng sản phẩm còn:' . $product_quantity . '</li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <form action="index.php?act=addtocart" method="post">
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" type="number" name="quantity" value="1" min="1" max="' . $product_quantity . '" >
                            </div>
                            <div class="pro-details-cart btn-hover">
                                <a href="#" style="line-height: 0;padding:0;margin-left: 20px;">
                                    <input type="submit" name="addtocart" id="add-to-cart-form" onclick="addToCart(1)" value="Thêm vào giỏ hàng" style="     background: #ffffff00;     border: none;     color: white;     height: 0px;     margin: 7px 0px 7px 0px;     padding: 21px 19px;     font-weight: bold; ">
                                </a>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="' . $product_id . '">
                        <input type="hidden" name="name" value="' . $product_name . '">
                        <input type="hidden" name="img" value="' . $product_img . '">
                        <input type="hidden" name="price" value="' . $product_price . '">
                    </form>
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
                <a class="active" data-bs-toggle="tab" href="#des-details2">Đánh giá sản phẩm</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane active">
                    <div class="row">
                        <div class="col-lg-7">
                            <!-- fix -->
                            <div class="review-wrapper">
                                <div class="single-review">
                                    <div class="review-img">
                                        <img src="upload\anhuser.jpg" alt="" width="88" height="99">
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>Khánh linh</h4>
                                                </div>
                                                <div class="review-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Mua laptop từ LAPDTECH thật sự là một trải nghiệm tuyệt vời - từ dịch vụ khách hàng nhiệt tình đến chất lượng sản phẩm vượt trội. Tôi hoàn toàn hài lòng!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-review ">
                                    <div class="review-img">
                                        <img src="upload\anhuser2.jpg" alt="" width="88" height="99">
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>Minh Thư</h4>
                                                </div>
                                                <div class="review-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Tôi ấn tượng với tốc độ giao hàng nhanh chóng của LAPDTECH. Laptop đến tay tôi trong tình trạng hoàn hảo và hiệu năng vượt ngoài mong đợi. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end -->
                            <?php
                            $i = 0;
                            $img = '<img src="assets/img/testimonial/1.jpg" alt="" width="88" height="99">';
                            foreach ($listbinhluan as $binhluan) {
                                if ($i == 0) {
                                    $img = '<img src="upload/anhuser1.jpg" alt="" width="88" height="99">';
                                } elseif ($i == 1) {
                                    $img = '<img src="upload/anhuser2.jpg" alt="" width="88" height="99">';
                                } elseif ($i == 2) {
                                    $img = '<img src="upload/anhuser3.jpg" alt="" width="88" height="99">';
                                } elseif ($i == 3) {
                                    $img = '<img src="upload/anhuser4.jpg" alt="" width="88" height="99">';
                                } elseif ($i == 4) {
                                    $i = 0;
                                    $img = '<img src="upload/anhuser.jpg" alt="" width="88" height="99">';
                                } else {
                                    $img = '<img src="jpg" alt="ảnh lỗi">';
                                }
                                extract($binhluan);
                                echo '<div class="review-wrapper">
                                        <div class="single-review">
                                            <div class="review-img">
                                                ' . $img . '
                                            </div>
                                            <div class="review-content">
                                                <div class="review-top-wrap">
                                                    <div class="review-left">
                                                        <div class="review-name">
                                                            <h4>' . $acc_name . '</h4>
                                                        </div>
                                                        <div class="review-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review-bottom">
                                                    <p>' . $content . '.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                $i++;
                            }
                            ?>
                        </div>
                        <div class="col-lg-5">
                            <div class="ratting-form-wrapper pl-50">
                                <h3>Đánh giá sản phẩm</h3>
                                <div class="ratting-form">
                                <form action="index.php?act=comment_add" method="post">
                                <input type="hidden" name="product_id" value="<?= $product_id ?>">
                                        <div class="star-box">
                                            <span>Đánh giá của bạn:</span>
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
                                                    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']['acc_name'])) : ?>
                                                        <p style="color:#767676">Tài khoản: <?= htmlspecialchars($_SESSION['user']['acc_name']) ?></p>
                                                        <div class="col-md-12">
                                                            <div class="rating-form-style form-submit">
                                                                <textarea name="content" placeholder="Tin nhắn" style="     width: 350px; "></textarea>
                                                                <input type="submit" value="Bình luận">
                                                            </div>
                                                        </div>
                                                    <?php else : ?>
                                                        <p style="color:#767676">Bạn cần <a href="index.php?act=login">đăng nhập</a> để đánh giá.</p>
                                                    <?php endif; ?>
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
    </div>
    <script>
        document.getElementById('add-to-cart-form').addEventListener('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            fetch('index.php?act=addtocart', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.querySelector('.count-style').textContent = data.cartCount;
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>