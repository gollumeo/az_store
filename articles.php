   <?php
    $articles = [
        1 => [
            "id" => 1,
            "name" => "Nike 1",
            "size" => "",
            "price" => "230"
        ],
        2 => [
            "id" => 2,
            "name" => "Nike 2",
            "size" => "",
            "price" => "230"
        ],
        3 => [
            "id" => 3,
            "name" => "Nike 3",
            "size" => "",
            "price" => "230"
        ],
        4 => [
            "id" => 4,
            "name" => "Nike 4",
            "size" => "",
            "price" => "230"
        ],    
    ];
        $id = $articles["id"];
        $name = $articles["id"]["name"];
        $size = $articles["id"]["size"];
        $price = $articles["id"]["price"];
    ?>
<form method="post" action="cart.php">
    <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
    <input type="number" name="quantity" min="1" value="1">
    <input type="submit" name="add_to_cart" value="Add to Cart">
</form>
