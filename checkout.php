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
    <form action="result.php" method="post" class='bg-slate-500 shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-4 w-9/12 my-2 flex flex-col justify-center items-center content-center'>
        <div class="bg-slate-400 shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-4 w-9/12 my-2">
            <h2 class="block uppercase tracking-wide text-grey-darker text-xl font-bold mb-2">
                About you:
            </h2>
            <div class='grid grid-rows-2 grid-cols-3'>
                <p class="col-span-1 row-span-1">
                    <label class='label_input' for="lastname">
                        Last name: 
                    </label>
                    <input class='input' type="text" id="lastname" placeholder="Pierre" name="lastname" value="<?php echo $_SESSION["personnalDatas"]['lastname'] ?>">
                </p>    
                <p class="row-span-1 col-span-2">
                    <label class='label_input' for="firstname">
                        First name: 
                    </label>
                    <input class='input' type="text" id="firstname" placeholder="Lebo" name="firstname" value="<?php echo $_SESSION["personnalDatas"]['firstname'] ?>">
                </p>
                <p class="col-span-2">
                    <label class='label_input' for="mail">
                        Mail: 
                    </label>
                    <input class='input' type="text" id="mail" placeholder="plebo@tre.bo" name="mail" value="<?php echo $_SESSION["personnalDatas"]['mail'] ?>">
                </p>
                <p class="col-span-1">
                    <label class='label_input' for="phone">
                        Phone number: 
                    </label>
                    <input class='input' maxlength="10" type="number" id="phone" placeholder="0123456789" name="phone" value="<?php echo $_SESSION["personnalDatas"]['phone'] ?>">
                </p>
            </div>
        </div>

        <div class="bg-slate-400 shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-4 w-9/12 my-2">
            <h2  class="block uppercase tracking-wide text-grey-darker text-xl font-bold mb-2">
                Address:
            </h2>
            <div class="grid-rows-2 grid grid-cols-5">
                <p class="col-span-1 row-span-1">
                    <label class='label_input' for="street">
                        Street: 
                    </label>
                    <input class='input' type="text" id="street" placeholder="Rue du magnifique" name="street" value="<?php echo $_SESSION["personnalDatas"]['street'] ?>">
                </p>    
                <p class="col-span-1 row-span-1">
                    <label class='label_input' for="num">
                        Number: 
                    </label>
                    <input class='input' type="number" id="num" placeholder="666" name="num" value="<?php echo $_SESSION["personnalDatas"]['num'] ?>">
                </p>
                <p class="col-span-3 row-span-1">
                    <label class='label_input' for="add">
                        Details: 
                    </label>
                    <input class='input' type="text" id="add" placeholder="bb" name="add" value="<?php echo $_SESSION["personnalDatas"]['add'] ?>">
                </p>
                <p class="col-span-3 row-span-1">
                    <label class='label_input' for="city">
                        City: 
                    </label>
                    <input class='input' type="text" id="city" placeholder="LeuPluBo" name="city" value="<?php echo $_SESSION["personnalDatas"]['city'] ?>">
                </p>
                <p class="col-span-2 row-span-1">
                    <label class='label_input' for="postal">
                        Zip Code: 
                    </label>
                    <input class='input' type="number" id="postal" placeholder="4321" name="postal" value="<?php echo $_SESSION["personnalDatas"]['postal'] ?>">
                </p>
            </div>
        </div>

        <div class='bg-slate-400 shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-4 w-9/12 my-2'>
            <h2  class="block uppercase tracking-wide text-grey-darker text-xl font-bold mb-2">
                Credit card:
            </h2>
            <div class="grid-rows-2 grid grid-cols-5">
                <p class="col-span-5 row-span-1">
                    <label class='label_input' for="cardNum">
                        Card number: 
                    </label>
                    <input class='input' maxlength="16" type="number" id="cardNum" placeholder="1234 5678 9123 4567" name="cardNum" value="<?php echo $_SESSION["personnalDatas"]['cardNum'] ?>">
                </p>    
                <p class="col-span-2 row-span-1">
                    <label class='label_input' for="cardName">
                        Name card: 
                    </label>
                    <input class='input' type="text" id="cardName" placeholder="Pierre Lebo" name="cardName" value="<?php echo $_SESSION["personnalDatas"]['cardName'] ?>">
                </p>
                <p class="col-span-1 row-span-1">
                    <label class='label_input' for="cardMonth">
                        Month: 
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
                        Year: 
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
                        Secret code: 
                    </label>
                    <input class='input' type="number" id="cardSecret" maxlength="3" placeholder="123" name="cardSecret" value="<?php echo $_SESSION["personnalDatas"]['cardSecret'] ?>">
                </p>
            </div>
        </div>
        <div class="flex justify-between w-1/2">
            <p>
                <label class='label_input' for="save_or_not">
                    Save datas ?
                </label>
                <input type="checkbox" name='save_or_not' id="save_or_not">
            </p>
            <p>
                <button class='inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md'>Validate</button>
            </p>
        </div>
    </form>
</body>
</html>