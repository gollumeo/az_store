<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/output.css">
    <title>AZ[store] - Shopping Cart</title>
</head>

<body class="min-h-screen flex flex-col items-center text-white bg-gradient-to-t from-slate-900 to-slate-500">
    <header class="flex flex-row w-full justify-around items-center border-b-[1px] border-slate-400 border-solid h-12">
        <p class="header font-bold"><a href="./index.php">AZ[store]</a></p>
        <nav class="flex header text-sm gap-4 text-bold font-medium">
            <a href="./index.php">Home</a>
            <a href="#">About</a>
            <a href="#">Products</a>
            <a href="#">Contact</a>
        </nav>

        <div class="flex flex-row w-auto h-auto text-sm justify-center items-center">
            <img src="assets/resources/shopping-cart.svg" alt="Cart" class="text-sm h-[16px] w-[16px]"><a href="./cart.php" alt="shopping cart"><span class="inline-block ml-2 font-normal">Login</span></a>
        </div>
    </header>
    <h1 class="text-center font-black text-6xl mt-8 mb-16 underline text-gray-300">Shopping Cart</h1>
    <?php
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

    <!-- <div class="summary"> -->
    <table class="text-center m-2 border-2 border-solid border-black w-1/2 mx-auto shadow-md bg-slate-800 shadow-slate-800">
        <tr class="border-2 border-solid border-black p-2">
            <th class="border-2 border-solid border-black p-2">Item</th>
            <th class="border-2 border-solid border-black">Quantity</th>
            <th class="border-2 border-solid border-black">Price</th>
            <th class="border-2 border-solid border-black">Total</th>
            <th class="border-2 border-solid border-black">Remove</th>
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
                <tr class="p-2">
                    <td class="border-r-2 border-solid border-black ">
                        <?php echo $name; ?>
                    </td>
                    <td class="border-r-2 border-solid border-black">
                        <?php echo $quantity; ?>
                    </td>
                    <td class="border-r-2 border-solid border-black">
                        €<?php echo $price; ?>
                    </td>
                    <td class="border-r-2 border-solid border-black">
                        €<?php echo $item_total; ?>
                    </td>
                    <td class="border-r-2 border-solid border-black">
                        <form method="post" action="cart.php">
                            <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                            <input type="submit" name="remove_from_cart" value="Remove" class="bg-white w-auto p-2 rounded-lg text-slate-700 hover:bg-slate-700 hover:text-white shadow-md shadow-red h-auto transition-all">
                        </form>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
        <tr>
            <td colspan="2" class="border-t-2 border-solid border-black"></td>
            <td class="border-t-2 border-solid border-black font-black">Total: €<?php echo get_cart_total(); ?></td>
            <td colspan="2" class="border-t-2 border-solid border-black"></td>
        </tr>
    </table>
    <div class="mx-auto mt-20 flex flex-row gap-5">
        <a href="./index.php" alt="homepage"><button class="bg-slate-900 p-3 rounded-lg text-lg font-bold hover:scale-110 transition-all shadow-lg w-[10vw] h-auto text-md shadow-black hover:bg-white hover:text-slate-900">Back to shopping</button></a>
        <a href="./checkout.php" alt="homepage"><button class="bg-blue-500 text-white p-3 rounded-lg text-lg font-bold hover:scale-110 transition-all shadow-lg w-[10vw] h-auto shadow-black hover:bg-white hover:text-blue-500">Purchase</button></a>
    </div>
    <footer class="flex flex-row absolute bottom-0 border-t-[1px] border-slate-400 border-solid h-20 w-full text-center justify-center items-center text-sm">
        <nav class="flex font-medium gap-4">
            <a href="">Home</a>
            <a href="">About</a>
            <a href="">Products</a>
            <a href="">Contact</a>
        </nav>
    </footer>
</body>

</html>