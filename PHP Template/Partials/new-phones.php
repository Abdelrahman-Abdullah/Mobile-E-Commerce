<!-- New Phones -->
<section id="new-phones">
    <div class="container mt-4 mb-5">
        <h4 class="font-rubik font-size-20">New Phones</h4>
        <hr>

        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($_SESSION['AllProducts'] as $item) :?>
            <div class="item py-2 bg-light">
                <div class="product font-rale">
                    <a href="product.php?id=<?= $item->item_id ?>"><img src="<?= $item->item_image?>" alt="product1" class="img-fluid"></a>
                    <div class="text-center">
                        <h6><?= $item->item_name?></h6>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span>$<?= $item->item_price?></span>
                        </div>
                        <?php if (! in_array($item->item_id ,   $_SESSION['cartAllIds'])) :?>
                            <form method="post" action="cart.php">
                                <input type="hidden" name="item_id" value="<?=$item->item_id?>">
                                <button name="addToCart"  type="submit" class="btn btn-warning font-size-12" >Add to Cart</button>
                            </form>
                        <?php else: ?>
                            <button  type="submit" disabled class="btn btn-success font-size-12  addToCart" >In Cart</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach;?>

        </div>
        <!-- !owl carousel -->

    </div>
</section>
<!-- !New Phones -->