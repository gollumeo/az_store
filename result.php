<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./output.css" type="text/css">
    <title>Document</title>
</head>
<body class="bg-gradient-to-t from-slate-900 to-slate-500 bg-no-repeat h-screen w-full flex flex-col justify-center items-center">
    <div class="bg-slate-500 shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-4 w-9/12 my-2 flex flex-col justify-center items-center content-center">
    <?php
        session_start();
        $pesronnalDatas = array(
            'lastname' => $_POST['lastname'],
            'firstname' => $_POST['firstname'],
            'mail' => $_POST['mail'], //a valider
            'phone' => $_POST['phone'], //a valider
        
            'street' => $_POST['street'],
            'num' => $_POST['num'], //a valider
            'add' => $_POST['add'],
            'city' => $_POST['city'],
            'postal' => $_POST['postal'], //a valider
        
            'cardNum' => $_POST['cardNum'], //a valider
            'cardName' => $_POST['cardName'],
            'cardMonth' => sprintf("%02d", $_POST['cardMonth']), //a valider
            'cardYear' => sprintf("%02d", $_POST['cardYear']), //a valider
            'cardSecret' => $_POST['cardSecret'], //a valider
        );
        if (!preg_match('/^[0-9]{10}+$/', $pesronnalDatas['phone']))
            echo 'The entered data is invalid: The phone number is incorrect.';
        else if (!filter_var($pesronnalDatas['mail'], FILTER_VALIDATE_EMAIL))
            echo 'The entered data is invalid: The email is incorrect.';
        else if (!filter_var($pesronnalDatas['num'], FILTER_VALIDATE_INT))
            echo 'The entered data is invalid: The number of your address is incorrect.';
        else if (!filter_var($pesronnalDatas['postal'], FILTER_VALIDATE_INT))
            echo 'The entered data is invalid: The postal code est incorrecte';
        else if (!preg_match('/^[0-9]{16}+$/', $pesronnalDatas['cardNum']))
            echo 'The entered data is invalid: The card number of your bank card is incorrect.';
        else if (!preg_match('/^[0-9]{2}+$/', $pesronnalDatas['cardMonth']))
            echo 'The entered data is invalid: The expiration month of your bank card is incorrect.';
        else if (!filter_var($pesronnalDatas['cardYear'], FILTER_VALIDATE_INT, ["options" => ["min_range" => 2023 , "max_range"=> 9999]]))
            echo 'The entered data is invalid: The expiration year of your bank card is incorrect.';
        else if (!preg_match('/^[0-9]{3}+$/', $pesronnalDatas['cardSecret']))
            echo 'The entered data is invalid: The secret code of your bank card is incorrect.';
        else
        {
            if ($_POST['save_or_not'] == 'on')
                $_SESSION["personnalDatas"] = $pesronnalDatas;
            else
                unset($_SESSION["personnalDatas"]);
            echo '<p class=\'label_input\'>The order has been validated and will be delivered to '.$pesronnalDatas['num'].' '.$pesronnalDatas['street'].' in '.$pesronnalDatas['city'].'. Thank you for your trust, '.$pesronnalDatas['firstname'].'</p>';
        }
    ?>
        <p class='flex justify-between w-1/2'>
            <button class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md">
                <a href="index.php">Back to home</a>
            </button>
            <button class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md">
                <a href="checkout.php">Back to checkout</a>
            </button>
        </p>
    </div>
</body>
</html>
