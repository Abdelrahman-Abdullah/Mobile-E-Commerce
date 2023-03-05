<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET' || isset($_POST['item_id']))
{

    include_once "Database/Connection.php";
    include_once "Database/Cart.php";
    new Cart(Connection::Connect());

    if (isset($_POST['addToCart']))
    {

        Cart::addToCart([$_POST['item_id']]);
        $items = Cart::getCartItems();
        $_SESSION['numberOfCartItem'] = count($items['allItems']); // Get Count of Items Before Incenses The Qyt
        header("Location: index.php" );

    }
    if (isset($_POST['submit_deleted_item']))
    {
        Cart::deleteItem($_POST['item_id']);
        $_SESSION['numberOfCartItem'] -- ; // Decrement number Of products
        header("Location: ".$_SERVER['PHP_SELF']);
    }

    $cartItems =  Cart::getCartItems();
    $_SESSION['cartItemPrice']  = $cartItems['allPrice'];     // Get Sum Of  All Price
    $_SESSION['allItems']       = $cartItems['allItems'];
    $_SESSION['cartAllIds']     = Cart::getAllCartIds(); // Get All Ids To Prevent Duplicated Items


}

?>