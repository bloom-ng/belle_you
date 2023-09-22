<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belle You - Product</title>
    <script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>
     <!-- Navbar -->
     <nav class=" p-8 md:px-28 border-b border-black flex justify-between items-center bg-amber-50 whitespace-nowrap">
    <div class="flex items-center "> 
        <h1 class="text-xl md:text-2xl font-medium">Belle For You</h1>       
        <ul class="hidden md:flex jusitfy-between items-center space-x-4 ml-20 font-medium">
            <li><a href="#">Category <i class="bi bi-chevron-compact-down"></i></a></li>
            <li><a href="#">Deals</a></li>
            <li><a href="#">Whats New</a></li>
        </ul>         
    </div>
    <div class="flex items-center">
        <ul class="flex items-center space-x-2 md:space-x-8 md:ml-10 font-medium text-lg">
            <li><a href="#">Account <i class="bi bi-person"></i></a></li>
            <li><a href="#">Cart <i class="bi bi-cart"></i></a></li>
        </ul>
    </div>
    <div class="flex items-center md:hidden">
        <button onclick="navtoggle()"><i class="bi bi-list text-3xl"></i></button>
        
    </div>
      
    
</nav>
 <!-- /Navbar -->

 <section class="p-8 md:px-28 fleX">
    <div class="grid grid-cols-1  xl:grid-cols-2">
        <div class="bg-gray-100 h-62 w-62 md:h-[450px] md:w-[500px] flex justify-center items-center rounded-xl ">
            <img src="../images/pngwing2.png" alt="" srcset="">
        
           
        </div>
        
        <div class=" py-4">
            <h1 class="text-3xl">First Asoebi Product Name</h1>
            <p class="text-2xl font-medium">₦23,300</p>
            <p class="leading-7 font-normal">
                Lorem ipsum dolor sit amet consectetur. Dignissim massa porttitor fringilla lacus fermentum maecenas diam. Adipiscing aliquet pharetra tempus commodo nibh. Pharetra vulputate at venenatis id. Dolor ipsum lorem nunc arcu erat duis euismod molestie ipsum.
            </p>
            <div class="my-12 border-t">
            <p class="py-2">Size</p>
            <button type="button" class="bg-gray-100 w-64 text-start px-5 py-2 rounded-full text-center whitespace-nowrap"> Please select
            <select name="" id="" class="bg-transparent float-right"></select>
            </button>
                
            <div class="flex justify-center items-center bg-gray-100 w-24 rounded-3xl  space-x-2 px-6 flex my-5 text-2xl">
            <button>+</button>
            <button>1</button>
            <button>-</button>
            </div>
                <div>
            <button class="bg-[#D4AF37]  border-2 border-[#D4AF37] text-white font-semibold px-4 py-2 md:px-8 md:py-2 rounded-3xl">Buy Now</button>
            <button class="bg-white  border-2 border-[#D4AF37] text-[#D4AF37] font-semibold px-4 py-2 md:px-8 md:py-2 rounded-3xl">Buy Now</button>
            <i class="bi bi-heart"></i>    
            </div>    
        </div>

        </div>
    </div>
    
    <div class="grid grid-cols-2 gap-2 md:grid-cols-6">
        <div class="bg-gray-50 w-40 h-46 flex justify-center items-center rounded-xl ">
            <img src="../images/pngwing2.png" class="object-fit" alt="" srcset="">    
        </div>
        <div class="bg-gray-50 w-40 h-46 flex justify-center items-center rounded-xl ">
            <img src="../images/pngwing.png" class="object-fit" alt="" srcset="">    
        </div>
        <div class="bg-gray-50 w-40 h-46 flex justify-center items-center rounded-xl ">
            <img src="../images/pngwing2.png" class="object-fit" alt="" srcset="">    
        </div>
        </div>
    </div>
 </section>


 <!-- Newsletter -->
 <section class="md:px-28 p-8 ">
        <div class="bg-[#FFF5D3] border-2 border-amber-800 rounded-3xl h-72 flex flex-col justify-center items-center">
            <h1 class="font-bold text-[#382B00] text-center text-3xl py-2">Sign Up for our Newsletter</h1>
            <p class="text-amber-900 text-[#382B00] text-xl py-2 text-center ">Be the first about release and industry news and insights.</p>
            <div class="flex justify-center items-center py-2">
            <input class="p-3 rounded-lg w-62 md:w-80 outline-none " type="email" name="email" id="" placeholder="Enter your email" >
            <input class="ml-4 bg-[#D4AF37] px-7 py-3 rounded-lg text-white font-medium" type="submit" value="Subscribe">
        </div>
        </div>
       </section>
        <!-- /Newsletter -->

       <!-- Footer -->

       <footer class="md:px-28 p-8 bg-[#FFFBEF] border-t-2 border-amber-800 mt-10">
            <div class="flex justify-between ">
               <div>
                <h1 class="font-medium text-2xl ">Belle For You</h1>
            </div>
            <div class="flex items-center">
                <ul class="flex flex-col md:flex-row items-start md:items-center md:space-x-2 md:space-x-12 md:ml-20 font-medium">
                    <li><a href="#">Category</a></li>
                    <li><a href="#">Deals</a></li>
                    <li><a href="#">Whats New</a></li>
                </ul>
            </div>
            <div class="flex items-center">
                <ul class="flex items-center space-x-2 md:space-x-4 md:ml-20 font-medium">
                    <a href="#"><img src="../images/facebook.svg" alt="">
                    </a>
                    <a href="#"><img src="../images/wi.png" alt="">
                    </a>
                    <a href="#"><img src="../images/linkedin.png" alt="">
                    </a>
                    <a href="#"><img src="../images/insagram.png" alt="">
                    </a>
                
                </ul>
            </div>
            </div>
        </footer>



    </body>
</html>