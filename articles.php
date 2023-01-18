<?php
session_start();
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
    <div><img src="<?php echo $item["image"]; ?>" alt=""></div>
    <form method=" post" action="cart.php">
        <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
        <input type="number" name="quantity" min="1" value="1">
        <input type="submit" name="add_to_cart" value="Add to Cart">
    </form>
<?php };

if (isset($_POST['add_to_cart'])) {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (!isset($_SESSION['cart'][$item_id])) {
        // If the item isn't in the cart, add it with the specified quantity
        $_SESSION['cart'][$item_id] = $quantity;
    } else {
        // If the item is already in the cart, update the quantity
        $_SESSION['cart'][$item_id] += $quantity;
    }
}
?>