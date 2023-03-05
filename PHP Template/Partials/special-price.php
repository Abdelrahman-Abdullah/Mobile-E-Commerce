<!-- Special Price -->
<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Special Price</h4>
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">All Brand</button>
            <?php
            // To Git All Brands In Our Table
                $brands = [];
                foreach ($_SESSION['AllProducts'] as $item) :
                    $brands[] = $item->item_brand;
                endforeach;
                $uniqueBrands = array_unique($brands); // Remove Duplicated Brands
            ?>

            <!--Use This Brand To Filter and Display IT-->
            <?php array_map(function ($brand){?>
            <button class="btn" data-filter=".<?=$brand?>">
                <?=$brand?>
            </button>
            <?php },$uniqueBrands); ?>

        </div>

        <div class="grid">
            <?php foreach ($_SESSION['AllProducts'] as $item) : ?>
            <div class="grid-item  border <?= $item->item_brand ?>">
                <div class="item py-2" style="width: 200px;">
                    <div class="product font-rale">
                        <a href="product.php?id=<?= $item->item_id ?>"><img src="<?= $item->item_image ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><?= $item->item_name ?></h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span>$<?= $item->item_price ?></span>
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
            </div>
            <?php endforeach;?>

        </div>
    </div>
</section>
<!-- !Special Price -->