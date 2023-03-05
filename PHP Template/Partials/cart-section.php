


<!-- Shopping cart section  -->
<section id="cart" class="py-3 mt-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <?php foreach ($cartItems['allItems'] as $cartItem) :?>
                <!-- cart item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?= $cartItem->item_image ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?= $cartItem->item_name ?></h5>
                        <small>by <?= $cartItem->item_brand ?></small>
                        <!-- product rating -->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                        </div>
                        <!--  !product rating-->

                        <!-- product qty -->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                                <button class="qty-up border bg-light" data-id="<?= $cartItem->item_id ?>"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="<?= $cartItem->item_id ?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                <button data-id="<?= $cartItem->item_id ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>

                                <form method="POST" >
                                    <input type="hidden" name="item_id" value="<?= $cartItem->item_id ?>">
                                    <button  name="submit_deleted_item" type="submit" class=" delete_from_cart btn font-baloo text-danger px-3 border-right">Delete</button>
                                </form>

                        </div>
                        <!-- !product qty -->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            $<span class="itemPrice" data-id="<?= $cartItem->item_id ?>"><?= $cartItem->item_price ?></span>
                        </div>
                    </div>
                </div>
                <!-- !cart item -->
                <?php endforeach;?>
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Total  Price :&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price">
                            <span id="totalPrice">
                                 <?= $_SESSION['cartItemPrice'] ?? 0; ?>
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>
<!-- !Shopping cart section  -->
