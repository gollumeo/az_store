<?php
// include 'articles.php';
session_start();
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

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Creating an array to store items to purchase
$items = array(
    array("id" => 1, "name" => "item 1", "price" => 10),
    array("id" => 2, "name" => "item 2", "price" => 20),
    array("id" => 3, "name" => "item 3", "price" => 30),
    // ...
);


function add_to_cart($item_id, $quantity) {
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if(!isset($_SESSION['cart'][$item_id])) {
        // If the item isn't in the cart, add it with the specified quantity
        $_SESSION['cart'][$item_id] = $quantity;
    } else {
        // If the item is already in the cart, update the quantity
        $_SESSION['cart'][$item_id] += $quantity;
    }

    function remove_from_cart($item_id) {
        if(isset($_SESSION['cart'][$item_id])) {
            unset($_SESSION['cart'][$item_id]);
        }
    }

    if(isset($_POST['remove_from_cart'])) {
        $item_id = $_POST['item_id'];
        remove_from_cart($item_id);
    }
}

if(isset($_POST['add_to_cart'])) {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];
    add_to_cart($item_id, $quantity);
}


function get_cart_total()
{
    $total = 0;
    foreach ($_SESSION['cart'] as $item_id => $quantity) {
        // Get the price of the item from the database
        $query = "SELECT price FROM items WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $item_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $price = $row['price'];

        $total += $price * $quantity;
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
    foreach($_SESSION['cart'] as $item_id => $quantity) {
        $item = $items[$item_id-1];
        $name = $item['name'];
        $price = $item['price'];
        $item_total = $quantity * $price;
        $total += $item_total;
    ?>
    <tr>
        <td><?php echo $name; ?></td>
        <td><?php echo $quantity; ?></td>
        <td>$<?php echo $price; ?></td>
        <td>$<?php echo $item_total; ?></td>
        <td>
            <form method="post" action="cart.php">
                <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                <input type="submit" name="remove_from_cart" value="Remove">
            </form>
        </td>
    </tr>
    <? } ?>
    <tr>
        <td colspan="3"></td>
        <td>Total: €<?php echo $total ?></td>
    </tr>
</table>
