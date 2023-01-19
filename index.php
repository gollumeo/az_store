<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/output.css">
    <title>Document</title>
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
    <main class="flex flex-col w-full space-y-10">
        <div class="flex items-center justify-evenly space-x-20"> <!--BIG TITLE + SHOE -->
            <div>
                <p class="text-9xl">SHOE THE <br> RIGHT <span class="text-blue-700">ONE</span>.</p>
                <button class="text-3xl">See our store</button>
            </div>
            <div class="relative">
                <p class="absolute text-[450px] text-white top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 -z-10">NIKE</p>
                <img class="z-50" src="assets/resources/shoe_one.png" alt="nike">
            </div>
        </div>
        <div>
            <p class="mx-16 my-10 text-3xl"><span class="text-blue-700">Our</span> last products</p>
            <div class="w-full flex justify-around"><!--SNEAKERS LIST-->
                <?php include 'articles.php'; ?>
            </div>
        </div>
        <div class="flex flex-col items-center"><!--PROVIDE THE BEST QUALITY-->
            <img src="assets/resources/shoe_two.png" alt="" width="450px">
            <p class="text-8xl text-center">WE PROVIDE YOU<br>THE <span class="text-blue-700">BEST</span> QUALITY.</p>
            <p class="text-2xl text-center w-3/5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas veritatis, quam quae dolores reiciendis velit nobis eum quo pariatur id recusandae nostrum at rem vel, quia facere iste architecto nemo!</p>
        </div>
        <div class="flex justify-center space-x-28"><!--REVIEWS-->
            <div class="review">
                <img src="assets/resources/image-emily.jpg" class="rounded-full w-32" alt="">
                <p class="reviewName">Emily from xyz</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, est aut architecto dolore quibusdam quia tenetur mollitia doloremque esse ipsa, blanditiis eaque expedita optio labore sit aspernatur nostrum. Rem, fugit.</p>
            </div>
            <div class="review">
                <img src="assets/resources/image-thomas.jpg" class="rounded-full w-32" alt="">
                <p class="reviewName">Thomas from corporate</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, libero assumenda inventore id, officia maiores voluptate sint similique consequatur ducimus enim veritatis harum asperiores numquam? Mollitia iure voluptate doloribus ullam!</p>
            </div>
            <div class="review">
                <img src="assets/resources/image-jennie.jpg" class="rounded-full w-32" alt="">
                <p class="reviewName">Jennie from Nike</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit eos quam distinctio sequi itaque dolore aspernatur quia eaque, facilis, voluptatem amet pariatur incidunt veniam nostrum quibusdam reiciendis molestiae dolorem! Et!</p>
            </div>
        </div>
    </main>
    <footer class="flex border-t-[1px] border-slate-400 border-solid h-20 w-full text-center justify-center items-center text-sm m-auto">
        <nav class="flex font-medium gap-4 text-center items-center justify center">
            <a href="">Home</a>
            <a href="">About</a>
            <a href="">Products</a>
            <a href="">Contact</a>
        </nav>
    </footer>
</body>

</html>