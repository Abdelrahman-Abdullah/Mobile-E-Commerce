<?php

class Product
{
    protected $PDO;
    public function __construct($PDO)
    {
        $this->PDO = $PDO;
    }

    public function getAllProducts()
    {
        $statment = $this->PDO->prepare(
            "SELECT * FROM product"
        );
        $statment->execute();
       $_SESSION['AllProducts'] = $statment->fetchAll(PDO::FETCH_OBJ);

    }
}
