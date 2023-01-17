<?php
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

?>
<form method="post" action="cart.php">
    <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
    <input type="number" name="quantity" min="1" value="1">
    <input type="submit" name="add_to_cart" value="Add to Cart">
</form>

<? print_r($id) ?>

<form method="post" action="cart.php">
    <label for="item_id">Select item:</label>
    <select id="item_id" name="item_id">
        <?php
        foreach ($items as $item) {
            echo "<option value='" . $item['id'] . "'>" . $item['name'] . "</option>";
        }
        ?>
    </select>
    <br>
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" min="1">
    <br>
    <input type="submit" name="add_to_cart" value="Add to cart">
</form>

<? if (isset($_POST['add_to_cart'])) {
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