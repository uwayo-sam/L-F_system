<?php
 session_start();
include "../backend/db/item.php";
include "../backend/db/conn.php";
include "../backend/auth.php";


isAuth();
isAdmin();



$items;

 if (!isset($_GET["query"]) || empty($_GET["query"])) {

    $items = Item::All($conn);
 }else{
    
    $items = Item::Search($_GET["query"],$conn);
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L&F | search </title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            background: linear-gradient(rgba(0,0,0,.8)), url('../public/bg3.png');
            background-repeat: no-repeat;
            background-size: cover;
            color: #F5F5F5;
            width: 100vw;
            height: 100vh;
            padding: 0px;
            margin: 0px;
        }   
    </style>
</head>
<body>
    <!-- header -->
    <div class="w-[100vw] flex justify-between px-5 py-3">
        <div>
            <a href="./"><h1 class="text-2xl font-extrabold uppercase">L&F</h1></a>
        </div>
        <div class="flex gap-2">
            

            <?php
             if ( isset($_SESSION["id"])&& isset($_SESSION["name"])&& isset($_SESSION["email"])){

                echo "
                    <h1 class=text-xl font-bold font-extrabold uppercase'>".$_SESSION["name"]."</h1>
                    <button class='hover:bg-transparent hover:cursor-pointer hover:border-2 hover:border-[#919194] capitalize font-bold text-sm bg-[#1d2024] px-4 py-1 border-solid rounded-lg'>
                    <a href='./auth/signout.php'>sign Out</a>
                    </button>
                ";
                // echo $_SESSION["name"];
               
             }else{
                echo '
                 <button class=" hover:bg-transparent hover:cursor-pointer hover:border-2 hover:border-[#919194] capitalize font-bold text-sm bg-[#1d2024] px-4 py-1 border-solid rounded-lg">
                <a href="./auth/signin.php">sign In</a>
            </button>

            <button class=" hover:bg-transparent hover:cursor-pointer hover:border-2 hover:border-[#949391] max-lg:hidden capitalize border-1 font-bold text-sm bg-[#1d2024] px-4 py-1 border-[#949391] border-solid rounded-lg">
                <a href="./auth/signup.php">sign Up</a>
            </button>
                
                ';
             }

            ?>
           
        </div>
    </div>
    <!-- /header -->

    <!-- main content -->

     <div class="flex flex-col items-center mt-10">
        <!-- search bar -->
        <div class="w-[40%]">
            <form action="search.php" method="get" class="max-lg:w-[100%] flex gap-0 h-[50px] px-2 py-1 border-2 border-[#ffffff] rounded-lg items-centers">
            <input type="text" name="query" placeholder="search here ..." class="w-[95%] h-full outline-none px-8 border-none caption-bottom">
            <button type="submit" class="w-[5%] h-full"><i class="fa-solid fa-magnifying-glass cursor-pointer"></i></button>
            </form>
            
        </div>
        <!-- /search bar -->

       <!-- items found -->

       <div class="flex flex-wrap gap-5 items-center justify-center">
            <?php
            if(count($items)> 0){
            foreach ($items as $item){
                echo "<a href='./details?id={$item["id"]}'>
<div class='w-[20vw] shadow-sm shadow-gray-600 h-[23vh] bg-black relative rounded-3xl mt-10 border-t-gray-500 border-1 border-b-0 border-r-0 border-l-0'>
    <img src='../uploads/{$item['image']}' alt='name' class='w-full h-full absolute rounded-xl'>
    <div class='z-10 bg-black/70 absolute w-full bottom-0 h-1/3 px-5 flex flex-col items-start rounded-xl border-t-gray-500 border-1 border-b-0 border-r-0 border-l-0'>
        <h1>{$item['name']}</h1>
        <p>{$item['created_at']}</p>
    </div>
</div>
</a>
";
            }
        }else{
            echo " <h1 class='text-xl font-bold mt-44'>item no found</h1>";
        }

            ?>
       </div>

       <!-- /items found -->



     </div>
    <!-- /main content -->

</body>
</html>


