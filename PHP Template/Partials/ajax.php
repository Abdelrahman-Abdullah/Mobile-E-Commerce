<?php
session_start();
if (isset($_POST['id'])):
    foreach ($_SESSION['allItems']  as $item):
        if ($item->item_id == $_POST['id']):
            echo $item->item_price;
            exit();
        endif;
    endforeach;
endif;