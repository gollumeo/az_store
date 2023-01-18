<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/output.css">
    <title>Document</title>
</head>

<body class="min-w-screen min-h-screen space-y-16 flex flex-col items-center text-white bg-gradient-to-t from-slate-900 to-slate-500">
    <header class="flex w-full justify-around items-center">
        <p class="header">AZ[store]</p>
        <nav class="header">
            <a href="">Home</a>
            <a href="">About</a>
            <a href="">Products</a>
            <a href="">Contact</a>
        </nav>
        <img src="assets/resources/shopping-cart.svg" alt="Cart" width="50px" height="50px">
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
        <div class="">
            <p>Our last products</p>
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
                <p>Emily from xyz</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, est aut architecto dolore quibusdam quia tenetur mollitia doloremque esse ipsa, blanditiis eaque expedita optio labore sit aspernatur nostrum. Rem, fugit.</p>
            </div>
            <div class="review">
                <img src="assets/resources/image-thomas.jpg" class="rounded-full w-32" alt="">
                <p>Thomas from corporate</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, libero assumenda inventore id, officia maiores voluptate sint similique consequatur ducimus enim veritatis harum asperiores numquam? Mollitia iure voluptate doloribus ullam!</p>
            </div>
            <div class="review">
                <img src="assets/resources/image-jennie.jpg" class="rounded-full w-32" alt="">
                <p>Jennie from Nike</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit eos quam distinctio sequi itaque dolore aspernatur quia eaque, facilis, voluptatem amet pariatur incidunt veniam nostrum quibusdam reiciendis molestiae dolorem! Et!</p>
            </div>
        </div>
    </main>
    <footer>
        <nav class="text-2xl">
            <a href="">Home</a>
            <a href="">About</a>
            <a href="">Products</a>
            <a href="">Contact</a>
        </nav>
    </footer>
</body>

</html>