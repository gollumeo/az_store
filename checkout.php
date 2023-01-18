<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./output.css" type="text/css">
    <title>Checkout</title>
</head>
<body>
<?php
    session_start();
?>
    <form action="checkout.php" method="get" class="flex-row justify-center">
        <div class='flex-1 flex justify-center'>
            <div class='flex-1 text-center w-full'>
                <p class="w-full flex justify-between">
                    <label class='text-right mr-4 w-full mt-3' for="lastname">Nom: </label>
                    <input class='text-left ml-4 h-10 border mt-1 rounded px-4 w-full bg-gray-50' type="text" id="lastname" placeholder="Pierre" name="lastname" value="<?php echo $_SESSION["personnalDatas"]['lastname'] ?>"><br>
                </p>    
                <p class="w-full flex justify-between">
                    <label class='text-right mr-4 w-full mt-3' for="firstname">Prenom: </label>
                    <input class='text-left ml-4 h-10 border mt-1 rounded px-4 w-full bg-gray-50' type="text" id="firstname" placeholder="Lebo" name="firstname" value="<?php echo $_SESSION["personnalDatas"]['firstname'] ?>"><br>
                </p>
                <p class="w-full flex justify-between">
                    <label class='text-right mr-4 w-full mt-3' for="mail">E-mail: </label>
                    <input class='text-left ml-4 h-10 border mt-1 rounded px-4 w-full bg-gray-50' type="text" id="mail" placeholder="plebo@tre.bo" name="mail" value="<?php echo $_SESSION["personnalDatas"]['mail'] ?>"><br>
                </p>
                <p class="w-full flex justify-between">
                    <label class='text-right mr-4 w-full mt-3' for="phone">Num telephone: </label>
                    <input class='text-left ml-4 h-10 border mt-1 rounded px-4 w-full bg-gray-50' maxlength="10" type="number" id="phone" placeholder="0123456789" name="phone" value="<?php echo $_SESSION["personnalDatas"]['phone'] ?>"><br>
                </p>
            </div>
            <div class='flex-1 text-center'>
                <p class="w-full flex justify-between">
                    <label class='text-right mr-4 w-full mt-3' for="street">Rue: </label>
                    <input class='text-left ml-4 h-10 border mt-1 rounded px-4 w-full bg-gray-50' type="text" id="street" placeholder="Rue du magnifique" name="street" value="<?php echo $_SESSION["personnalDatas"]['street'] ?>"><br>
                </p>    
                <p class="w-full flex justify-between">
                    <label class='text-right mr-4 w-full mt-3' for="num">Numero: </label>
                    <input class='text-left ml-4 h-10 border mt-1 rounded px-4 w-full bg-gray-50' type="number" id="num" placeholder="666" name="num" value="<?php echo $_SESSION["personnalDatas"]['num'] ?>"><br>
                </p>
                <p class="w-full flex justify-between">
                    <label class='text-right mr-4 w-full mt-3' for="add">Info complementaire: </label>
                    <input class='text-left ml-4 h-10 border mt-1 rounded px-4 w-full bg-gray-50' type="text" id="add" placeholder="bb" name="add" value="<?php echo $_SESSION["personnalDatas"]['add'] ?>"><br>
                </p>
                <p class="w-full flex justify-between">
                    <label class='text-right mr-4 w-full mt-3' for="city">Ville: </label>
                    <input class='text-left ml-4 h-10 border mt-1 rounded px-4 w-full bg-gray-50' type="text" id="city" placeholder="LeuPluBo" name="city" value="<?php echo $_SESSION["personnalDatas"]['city'] ?>"><br>
                </p>
                <p class="w-full flex justify-between">
                    <label class='text-right mr-4 w-full mt-3' for="postal">Code postal: </label>
                    <input class='text-left ml-4 h-10 border mt-1 rounded px-4 w-full bg-gray-50' type="number" id="postal" placeholder="4321" name="postal" value="<?php echo $_SESSION["personnalDatas"]['postal'] ?>"><br>
                </p>
            </div>
        </div>
        <div class='flex-1 w-full'>
            <p class="w-full flex justify-between">
                <label class='text-right mr-4 w-full mt-3' for="cardNum">Num carte: </label>
                <input class='text-left ml-4 mr-96 h-10 border mt-1 rounded px-4 w-1/2 bg-gray-50' maxlength="16" type="number" id="cardNum" placeholder="1234 5678 9123 4567" name="cardNum" value="<?php echo $_SESSION["personnalDatas"]['cardNum'] ?>"><br>
            </p>    
            <p class="w-full flex justify-between">
                <label class='text-right mr-4 w-full mt-3' for="cardName">Nom sur la carte: </label>
                <input class='text-left ml-4 mr-96 h-10 border mt-1 rounded px-4 w-1/2 bg-gray-50' type="text" id="cardName" placeholder="Pierre Lebo" name="cardName" value="<?php echo $_SESSION["personnalDatas"]['cardName'] ?>"><br>
            </p>
            <p class="w-full flex justify-between">
                <label class='text-right mr-4 w-full mt-3' for="cardMonth">Mois: </label>
                <select name="cardMonth" id="cardMonth" class="text-left ml-4 mr-96 h-10 border mt-1 rounded px-4 w-1/2 bg-gray-50" x-model="expired.month">
                    <?php 
                        for ($i=1; $i < 13; $i++) 
                            echo '<option '.(($i == $_SESSION["personnalDatas"]["cardMonth"]) ? 'selected disabled': '').'value='.sprintf("%02d", $i).'>'.sprintf("%02d", $i).'</option>';
                    ?>
                </select>
            </p>
            <p class="w-full flex justify-between">
                <label class='text-right mr-4 w-full mt-3' for="cardYear">Annee: </label>
                <select name="cardYear" id="cardYear" class="text-left ml-4 mr-96 h-10 border mt-1 rounded px-4 w-1/2 bg-gray-50" x-model="expired.year" >
                    <?php 
                        for ($i=2023; $i < 2030; $i++) 
                            echo '<option '.(($i == $_SESSION["personnalDatas"]["cardYear"]) ? 'selected disabled' : '' ).' value='.sprintf("%02d", $i).'>'.sprintf("%02d", $i).'</option>';
                    ?>
                </select>
            </p>
            <p class="w-full flex justify-between">
                <label class='text-right mr-4 w-full mt-3' for="cardSecret">Code secret: </label>
                <input class='text-left ml-4 mr-96 h-10 border mt-1 rounded px-4 w-1/2 bg-gray-50' type="number" id="cardSecret" maxlength="3" placeholder="123" name="cardSecret" value="<?php echo $_SESSION["personnalDatas"]['cardSecret'] ?>"><br>
            </p>
        </div>
        <button class='bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded'>bouh</button>
    </form>
    <?php
    var_dump($_SESSION["personnalDatas"]);
    $pesronnalDatas = array(
        'lastname' => $_GET['lastname'],
        'firstname' => $_GET['firstname'],
        'mail' => $_GET['mail'], //a valider
        'phone' => $_GET['phone'], //a valider
    
        'street' => $_GET['street'],
        'num' => $_GET['num'], //a valider
        'add' => $_GET['add'],
        'city' => $_GET['city'],
        'postal' => $_GET['postal'], //a valider
    
        'cardNum' => $_GET['cardNum'], //a valider
        'cardName' => $_GET['cardName'],
        'cardMonth' => sprintf("%02d", $_GET['cardMonth']), //a valider
        'cardYear' => sprintf("%02d", $_GET['cardYear']), //a valider
        'cardSecret' => $_GET['cardSecret'], //a valider
    );
    if (!preg_match('/^[0-9]{10}+$/', $pesronnalDatas['phone']))
        echo 'Error1';
    else if (!filter_var($pesronnalDatas['mail'], FILTER_VALIDATE_EMAIL))
        echo 'Error2';
    else if (!filter_var($pesronnalDatas['num'], FILTER_VALIDATE_INT))
        echo 'Error8';
    else if (!filter_var($pesronnalDatas['postal'], FILTER_VALIDATE_INT))
        echo 'Error3';
    else if (!preg_match('/^[0-9]{16}+$/', $pesronnalDatas['cardNum']))
        echo 'Error4';
    else if (!preg_match('/^[0-9]{2}+$/', $pesronnalDatas['cardMonth']))
        echo 'Error5';
    else if (!filter_var($pesronnalDatas['cardYear'], FILTER_VALIDATE_INT, ["options" => ["min_range" => 2023 , "max_range"=> 9999]]))
        echo 'Error6';
    else if (!preg_match('/^[0-9]{3}+$/', $pesronnalDatas['cardSecret']))
        echo 'Error7';
    else
    {
        $_SESSION["personnalDatas"] = $pesronnalDatas;
        var_dump($_SESSION["personnalDatas"]);
        echo "<script>alert(\"La commande est validee ", $pesronnalDatas['firstname'], "\")</script>";
    }
    ?>
</body>
</html>