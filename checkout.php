<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./output.css" type="text/css">
    <title>Checkout</title>
</head>
<body class="bg-gradient-to-t from-slate-900 to-slate-500 bg-no-repeat h-screen w-full flex flex-col justify-center items-center">
<?php
    session_start();
?>
    <form action="checkout.php" method="get" class='bg-slate-500 shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-4 w-9/12 my-2 flex flex-col justify-center items-center content-center'>
        <div class="bg-slate-400 shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-4 w-9/12 my-2">
            <h2 class="block uppercase tracking-wide text-grey-darker text-xl font-bold mb-2">
                Informations sur vous:
            </h2>
            <div class='grid grid-rows-2 grid-cols-3'>
                <p class="col-span-1 row-span-1">
                    <label class='label_input' for="lastname">
                        Nom: 
                    </label>
                    <input class='input' type="text" id="lastname" placeholder="Pierre" name="lastname" value="<?php echo $_SESSION["personnalDatas"]['lastname'] ?>">
                </p>    
                <p class="row-span-1 col-span-2">
                    <label class='label_input' for="firstname">
                        Prenom: 
                    </label>
                    <input class='input' type="text" id="firstname" placeholder="Lebo" name="firstname" value="<?php echo $_SESSION["personnalDatas"]['firstname'] ?>">
                </p>
                <p class="col-span-2">
                    <label class='label_input' for="mail">
                        E-mail: 
                    </label>
                    <input class='input' type="text" id="mail" placeholder="plebo@tre.bo" name="mail" value="<?php echo $_SESSION["personnalDatas"]['mail'] ?>">
                </p>
                <p class="col-span-1">
                    <label class='label_input' for="phone">
                        Num telephone: 
                    </label>
                    <input class='input' maxlength="10" type="number" id="phone" placeholder="0123456789" name="phone" value="<?php echo $_SESSION["personnalDatas"]['phone'] ?>">
                </p>
            </div>
        </div>

        <div class="bg-slate-400 shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-4 w-9/12 my-2">
            <h2  class="block uppercase tracking-wide text-grey-darker text-xl font-bold mb-2">
                Ou souhaitez vous etre livre:
            </h2>
            <div class="grid-rows-2 grid grid-cols-5">
                <p class="col-span-1 row-span-1">
                    <label class='label_input' for="street">
                        Rue: 
                    </label>
                    <input class='input' type="text" id="street" placeholder="Rue du magnifique" name="street" value="<?php echo $_SESSION["personnalDatas"]['street'] ?>">
                </p>    
                <p class="col-span-1 row-span-1">
                    <label class='label_input' for="num">
                        Numero: 
                    </label>
                    <input class='input' type="number" id="num" placeholder="666" name="num" value="<?php echo $_SESSION["personnalDatas"]['num'] ?>">
                </p>
                <p class="col-span-3 row-span-1">
                    <label class='label_input' for="add">
                        Info complementaire: 
                    </label>
                    <input class='input' type="text" id="add" placeholder="bb" name="add" value="<?php echo $_SESSION["personnalDatas"]['add'] ?>">
                </p>
                <p class="col-span-3 row-span-1">
                    <label class='label_input' for="city">
                        Ville: 
                    </label>
                    <input class='input' type="text" id="city" placeholder="LeuPluBo" name="city" value="<?php echo $_SESSION["personnalDatas"]['city'] ?>">
                </p>
                <p class="col-span-2 row-span-1">
                    <label class='label_input' for="postal">
                        Code postal: 
                    </label>
                    <input class='input' type="number" id="postal" placeholder="4321" name="postal" value="<?php echo $_SESSION["personnalDatas"]['postal'] ?>">
                </p>
            </div>
        </div>

        <div class='bg-slate-400 shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-4 w-9/12 my-2'>
            <h2  class="block uppercase tracking-wide text-grey-darker text-xl font-bold mb-2">
                Votre carte banquaire:
            </h2>
            <div class="grid-rows-2 grid grid-cols-5">
                <p class="col-span-5 row-span-1">
                    <label class='label_input' for="cardNum">
                        Num carte: 
                    </label>
                    <input class='input' maxlength="16" type="number" id="cardNum" placeholder="1234 5678 9123 4567" name="cardNum" value="<?php echo $_SESSION["personnalDatas"]['cardNum'] ?>">
                </p>    
                <p class="col-span-2 row-span-1">
                    <label class='label_input' for="cardName">
                        Nom sur la carte: 
                    </label>
                    <input class='input' type="text" id="cardName" placeholder="Pierre Lebo" name="cardName" value="<?php echo $_SESSION["personnalDatas"]['cardName'] ?>">
                </p>
                <p class="col-span-1 row-span-1">
                    <label class='label_input' for="cardMonth">
                        Mois: 
                    </label>
                    <select name="cardMonth" id="cardMonth" class="input" x-model="expired.month">
                        <?php 
                            for ($i=1; $i < 13; $i++) 
                                echo '<option '.(($i == $_SESSION["personnalDatas"]["cardMonth"]) ? 'selected disabled': '').'value='.sprintf("%02d", $i).'>'.sprintf("%02d", $i).'</option>';
                        ?>
                    </select>
                </p>
                <p class="col-span-1 row-span-1">
                    <label class='label_input' for="cardYear">
                        Annee: 
                    </label>
                    <select name="cardYear" id="cardYear" class="input" x-model="expired.year" >
                        <?php 
                            for ($i=2023; $i < 2030; $i++) 
                                echo '<option '.(($i == $_SESSION["personnalDatas"]["cardYear"]) ? 'selected' : '' ).' value='.sprintf("%04d", $i).'>'.sprintf("%04d", $i).'</option>';
                        ?>
                    </select>
                </p>
                <p class="col-span-1 row-span-1">
                    <label class='label_input' for="cardSecret">
                        Code secret: 
                    </label>
                    <input class='input' type="number" id="cardSecret" maxlength="3" placeholder="123" name="cardSecret" value="<?php echo $_SESSION["personnalDatas"]['cardSecret'] ?>">
                </p>
            </div>
        </div>
        <button class='inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md'>bouh</button>
    </form>
    
    <?php
    // var_dump($_SESSION["personnalDatas"]);
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