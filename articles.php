<?php
session_start();
$articles = [
    [
        "id" => 1,
        "name" => "Nike 1",
        "size" => "42",
        "price" => "230"
    ],
    [
        "id" => 2,
        "name" => "Nike 2",
        "size" => "40",
        "price" => "230"
    ],
    [
        "id" => 3,
        "name" => "Nike 3",
        "size" => "38",
        "price" => "230"
    ],
    [
        "id" => 4,
        "name" => "Nike 4",
        "size" => "44",
        "price" => "230"
    ],
];

foreach ($articles as $item) {
?>

    <form method="post" action="cart.php">
        <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
        <input type="number" name="quantity" min="1" value="1">
        <input type="submit" name="add_to_cart" value="Add to Cart">
    </form>


<?
}

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