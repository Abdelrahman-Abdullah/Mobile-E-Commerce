<?php
include_once "Connection.php";
include_once "Product.php";

$products = new Product(Connection::Connect());
$products->getAllProducts();

