<?php
session_start();

// Creating an array to store items to purchase
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

<?php
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST['add_to_cart']) && isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];
    $item = array_filter($articles, function ($item) use ($item_id) {
        return $item['id'] == $item_id;
    });
    $item = reset($item);
    $quantity = isset($_POST['quantity']) && !empty($_POST['quantity']) ? $_POST['quantity'] : 1;
    $key = array_search($item, $articles);
    if (!isset($_SESSION['cart'][$key])) {
        $_SESSION['cart'][$key] = array("quantity" => $quantity, "price" => $item["price"], "name" => $item["name"]);
    } else {
        $_SESSION['cart'][$key]["quantity"] += $quantity;
    }
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}


function remove_from_cart($item_id)
{
    if (isset($_SESSION['cart'][$item_id])) {
        unset($_SESSION['cart'][$item_id]);
    }
}

if (isset($_POST['remove_from_cart'])) {
    $item_id = $_POST['item_id'];
    remove_from_cart($item_id);
}

function get_cart_total()
{
    global $articles;
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item_id => $item) {
            $price = $item["price"];
            $item_total = intval($price) * intval($item["quantity"]);
            $total += $item_total;
        }
    }
    return $total;
}
?>

<table>
    <tr>
        <th>Item</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
        <th>Remove</th>
    </tr>
    <?php
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item_id => $item) {
            $name = $item["name"];
            $quantity = $item["quantity"];
            $price = $item["price"];
            $item_total = $price * $quantity;
            $total += $item_total;
    ?>
            <tr>
                <td>
                </td>
                <td>
                    <?php echo $quantity; ?>
                </td>
                <td>
                    €<?php echo $price; ?>
                </td>
                <td>
                    €<?php echo $item_total; ?>
                </td>
                <td>
                    <form method="post" action="cart.php">
                        <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                        <input type="submit" name="remove_from_cart" value="Remove">
                    </form>
                </td>
            </tr>
    <?php
        }
    }
    ?>
    <tr>
        <td colspan="3"></td>
        <td>Total: €<?php echo get_cart_total(); ?></td>
    </tr>
</table>