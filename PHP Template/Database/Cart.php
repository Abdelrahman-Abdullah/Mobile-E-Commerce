<?php
class Cart
{
    private static  $PDO;
    private static $CART = [];

    public function __construct($PDO)
    {
        static::$PDO = $PDO;
    }

    public static  function addToCart($val)
    {


        $stament = static::$PDO->prepare("INSERT INTO cart(user_id , item_id) VALUES (1,?)");

        try {
          $stament->execute($val);
        }catch (PDOException $e){
            echo "Error Happened{$e->getMessage()}";
        }

    }
    public static function getCartItems(){

        $stament = static::$PDO->prepare(
            "SELECT * FROM product INNER JOIN cart ON product.item_id = cart.item_id AND cart.user_id = :user_id;"
        );

        try {
            $stament->execute(['user_id' => 1]);
            static::$CART['allItems']= $stament->fetchAll(PDO::FETCH_OBJ);
            static::getPriceSum(static::$CART['allItems']);
            return static::$CART;
        }catch (PDOException $e){
            echo "Error Happened{$e->getMessage()}";
        }
    }
    public static function getPriceSum($Items)
    {
        $sum = 0;
        foreach ($Items as $item):
            $sum += $item->item_price;
        endforeach;
        static::$CART['allPrice'] = $sum;


    }
    public static function deleteItem($id){
        $statmen = static::$PDO->prepare("DELETE FROM cart WHERE item_id = :item_id");

        try {
           $result = $statmen->execute(['item_id' => $id]);
           if ($result) :
               header("Location: ".$_SERVER['PHP_SELF']);
           endif;
        }catch (PDOException $e)
        {
            echo "Error Happened {$e->getMessage()}";
        }
    }
    public static function getAllCartIds()
    {
        $allIds = [];
        foreach (static::$CART['allItems'] as $item):

            $allIds [] = $item->item_id;
        endforeach;

        return $allIds;

    }
}

