<?php
session_start();

include "../backend/db/item.php";
include "../backend/db/conn.php";
include "../backend/db/user.php";
include "../backend/auth.php";



isAuth();

admin();



$items;



if(isset($_GET['action']) && !empty($_GET['id']) && $_GET['action']== 'delete'){
   Item::delete($_GET['id'],$conn);
}elseif(isset($_GET['action']) && !empty($_GET['id']) && $_GET['action']== 'approve'){
   Item::SetStatus($_GET['id'],$conn);
}



if(isset($_GET['query']) && !empty($_GET['query'])){
    $query = $_GET['query'];
    $items = Item::Search($query,$conn);
}else{
    $items = Item::All($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin | panel</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            background: linear-gradient(rgba(0,0,0,.7)), url('../public/bg.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            color: #F5F5F5;
            width: 100vw;
            height: 100vh;
            padding: 0px;
            margin: 0px;
        }   
    </style>
</head>
<body class=" overflow-y-scroll overflow-x-clip">
    
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

    <!-- content -->

    <div class="px-6 mt-10 flex gap-10 items-center justify-center">


      <div class="px-10 py-4 flex flex-col gap-4 backdrop-blur-sm border-1 border-gray-600 rounded-2xl">
      <h1 class="text-2xl font-bold capitalize">total users</h1>
      <h1><?php echo User::Total($conn)[0]['total_users']; ?></h1>
      </div>




      <div class="px-10 py-4 flex flex-col gap-4  border-gray-600 rounded-2xl backdrop-blur-sm border-1">
       <h1 class="text-2xl font-bold capitalize">total items</h1>
       <h1><?php echo Item::Total($conn)[0]['total_items']; ?></h1>
      </div>




      <div class="px-10 py-4 flex flex-col gap-4  border-gray-600 rounded-2xl backdrop-blur-sm border-1">
         <h1 class="text-2xl font-bold capitalize">total approved user</h1>
         <h1><?php echo Item::TotalApproved($conn)[0]['totalApproved']; ?></h1>
      </div>



      <div class="px-10 py-4 flex flex-col gap-4  border-gray-600 rounded-2xl backdrop-blur-sm border-1">
            <h1 class="text-2xl font-bold capitalize">total remains items</h1>
            <h1><?php echo Item::TotalNoneApproved($conn)[0]['totalNoneApproved']; ?></h1>
      </div>
    </div>

    <!-- /content -->


    <!-- admin management table -->


    <div class="px-6 mt-10 flex flex-col gap-10 items-center justify-center">

      <!-- search bar -->
      <div class="w-[40%]">
            <form action="admin.php" method="get" class="max-lg:w-[100%] flex gap-0 h-[50px] px-2 py-1 border-2 border-[#ffffff] rounded-lg items-centers">
            <input type="text" name="query" placeholder="search here ..." class="w-[95%] h-full outline-none px-8 border-none caption-bottom">
            <button type="submit" class="w-[5%] h-full"><i class="fa-solid fa-magnifying-glass cursor-pointer"></i></button>
            </form>
            
        </div>
        <!-- /search bar -->


     <div class="w-full items-start px-40 flex flex-col gap-3">
     <h1 class="text-xl font-bold">items:</h1>

    <div class="flex items-center justify-center w-full">
     <table class=" w-full backdrop-blur-sm">
        <thead class="w-full border-1 border-gray-600 text-lg uppercase ">
            <th>image</th>
            <th>name</th>
            <th>description</th>
            <th>status</th>
            <th>contact info</th>
            <th></th>
        </thead>
        <tbody>
<?php
    foreach($items as $item){

        echo "
           <tr class='h-[80px] border-gray-600 border-1 items-center'>
            <td><img width='60px' height='60px' class='rounded-sm px-2' src='../uploads/{$item['image']} ' /></td>
            <td><h1>{$item['name']}</h1></td>
            <td><h1>{$item['description']}</h1></td>
            <td><h1>{$item['description']}</h1></td>
            <td><h1>{$item['contact_info']}</h1></td>
            <td class=' flex gap-2 items-center justify-center py-3'>";
              if ($item['status'] == "pending") {
                echo "<a href='./admin.php?action=approve&&id={$item['id']}' class='px-5 py-2 text-blue-600 text-lg bg-transparent border-1 border-gray-500 rounded-md'>approve</a>";
            }else{
              echo "<h1 class=' text-green-500'>{$item['status']}</h1>";
            }
                echo "
                <a href='./admin.php?action=delete&&id={$item['id']}' class=' text-red-500 px-5 py-2 text-lg bg-transparent border-1 border-gray-500 rounded-md'>delete</a></td></tr>     
                ";
              }

?>
       

        </tbody>
    </table>
    </div>



     </div>




    </div>





    <!--/admin management table -->


</body>
</html>