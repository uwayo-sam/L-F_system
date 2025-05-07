<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L&F | post item</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        /* *{
            padding: 0;
            margin: 0;
        } */
        body{
            background: linear-gradient(rgba(0,0,0,.7)), url('../public/bg2.png');
            background-repeat: no-repeat;
            background-size: cover;
            color: #F5F5F5;
            width: 100vw;
            height: 100vh;
          
        }

       

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
</head>
<body class="flex justify-center items-center">

        <form action="../backend/controllers/post.php" method="post" class="backdrop-blur-sm w-[35vw] rounded-2xl flex px-9 flex-col gap-4 items-center border-2 border-gray-50 h-[80%] justify-center " enctype="multipart/form-data">
            <h1 class="text-3xl font-bold mb-4 text-white">Post Item</h1>

            <div class="w-3/4 h-[40px] flex border-solid border-2 border-gray-400 rounded-full  py-2 items-center justify-start">
                <input type="text" name="name" placeholder="Enter Item Name" class="px-5 h-full w-full rounded-full outline-none text-lg" required>
            </div>
            <div class="w-3/4 h-[40px] flex border-solid border-2 border-gray-400 rounded-full  py-2 items-center justify-start">
                <input type="text" name="location_found" placeholder="Enter Where you Are" class="px-5 h-full w-full rounded-full outline-none text-lg" required>
            </div>
            <div class="w-3/4 h-[40px] flex border-solid border-2 border-gray-400 rounded-full  py-2 items-center justify-start">
                <input type="text" name="contact_info" placeholder="Enter Phone Number" class="px-5 h-full w-full rounded-full outline-none text-lg" required>
            </div>
            <div class="w-3/4 h-[40px] flex border-solid border-2 border-gray-400 rounded-full  py-2 items-center justify-start">
                <input type="text" name="type" placeholder="Enter Item Type" class="px-5 h-full w-full rounded-full outline-none text-lg" required>
            </div>
            <div class="w-3/4 h-[100px] flex border-solid border-2 border-gray-400 rounded-lg  py-2 items-center justify-start">
                <textarea name="description"  placeholder="Enter Item Name" class="px-5 h-full w-full rounded-lg overflow-hiddens outline-none text-lg" required></textarea>
            </div>
            
                <input type="file" name="file" placeholder="Select Item Image" class="px-3 py-2 bg-[#0c0b12] hover:cursor-pointer hover:bg-slate-900 rounded-md" required>
        
            <button type="submit" class="mt-4 px-4 w-[30vw] bg-gray-800 hover:bg-gray-700 text-white font-medium py-2 rounded-full transition-colors duration-200">
               Post
            </button>
            
        </form>
    
</body>
</html>