<!-- HEADER-->
<?php include "header.php"; ?>
<!-- /HEADER-->

<!-- SECTION -->
<!-- tab -->
<div id="tab1" class="tab-pane active">
    <div class="products-slick" data-nav="#slick-nav-1">

        <?php
                                    foreach ($get5NewestProduct as $value):
                                    ?>
        <!-- product -->
        <div class="product">
            <div class="product-img">
                <img src="./img/<?php echo $value['image'] ?>" alt="">
                <div class="product-label">
                    <span class="sale">-30%</span>
                    <span class="new">NEW</span>
                </div>
            </div>
            <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a
                        href="product-detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>">
                        <?php echo substr($value['name'], 0, 20) ?>...
                    </a></h3>
                <h4 class="product-price">
                    <?php echo number_format($value["price"]) ?> VND
                </h4>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <div class="product-btns">
                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to
                            wishlist</span></button>
                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to
                            compare</span></button>
                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                            view</span></button>
                </div>
            </div>
            <div class="add-to-cart">
                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
            </div>
        </div>
        <!-- /product -->
        <?php
                                    endforeach;
                                    ?>

    </div>
    <div id="slick-nav-1" class="products-slick-nav"></div>
</div>
<!-- /tab -->

<!-- /SECTION -->


<!-- FOOTER-->
<?php include "footer.php"; ?>
<!-- /FOOTER-->