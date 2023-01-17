<?php
// session_start();

// Creating an array to store items to purchase
include 'articles.php';

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
        foreach ($_SESSION['cart'] as $item_id => $quantity) {
            $item = $articles[$item_id - 1];
            $price = $item['price'];
            $item_total = intval($price) * intval($quantity);
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
        foreach ($_SESSION['cart'] as $item_id => $quantity) {
            $item = $articles[$item_id - 1];
            $name = $item['name'];
            if (!is_int($item['price'])) {
                $item['price'] = intval($item['price']);
                $quantity = intval($quantity);
                $price = $item['price'] * $quantity;
            }

            $item_total = $price;
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
    <?php }
    } ?>
    <tr>
        <td colspan="3"></td>
        <td>Total: $<?php echo get_cart_total(); ?></td>
    </tr>
</table>