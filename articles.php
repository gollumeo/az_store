<?php

$articles = [
    [
        "id" => 1,
        "name" => "Nike 1",
        "size" => "42",
        "price" => "230",
        "image" => "assets/resources/shoe_one.png"
    ],
    [
        "id" => 2,
        "name" => "Nike 2",
        "size" => "40",
        "price" => "230",
        "image" => "assets/resources/shoe_one.png"
    ],
    [
        "id" => 3,
        "name" => "Nike 3",
        "size" => "38",
        "price" => "230",
        "image" => "assets/resources/shoe_one.png"
    ],
    [
        "id" => 4,
        "name" => "Nike 4",
        "size" => "44",
        "price" => "230",
        "image" => "assets/resources/shoe_one.png"
    ],
];

foreach ($articles as $item) {
?>
    <div class="articles">
        <div class="articlesImg">
            <img width="170px" src="<?php echo $item["image"]; ?>" alt="">
        </div>
        <div class="flex justify-between">
            <div>
                <div><?php echo $item["name"]; ?></div>
                <div><?php echo $item["price"]; ?>€</div>
            </div>
            <form method="post" action="cart.php">
                <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                <input type="hidden" name="quantity" min="1" value="1">
                <!-- <div class="flex space-x-2 justify-center"> -->
                    <input type="submit" name="add_to_cart" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" value="Add to Cart">
                <!-- </div> -->
            </form>
        </div>
    </div>
<?php };

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST['add_to_cart']) && isset($_POST['item_id']) && array_key_exists($_POST['item_id'], $articles)) {
    $item_id = $_POST['item_id'];
    $item = $articles[$item_id];
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (!isset($_SESSION['cart'][$item_id])) {
        // If the item isn't in the cart, add it with the specified quantity
        $_SESSION['cart'][$item_id] = array("quantity" => $quantity, "price" => $item["price"], "name" => $item["name"]);
    } else {
        // If the item is already in the cart, update the quantity
        $_SESSION['cart'][$item_id]["quantity"] += $quantity;
    }
}

?>