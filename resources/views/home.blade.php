<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belle You</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.4/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>
    <!-- Navbar -->
    <nav class=" p-8 md:px-28 border-b border-black flex
     justify-between items-center bg-amber-50 whitespace-nowrap" >
    <div class="flex items-center " id="navBar"> 
        <h1 class="text-xl md:text-2xl font-medium">Belle For You</h1>       
        <ul class="hidden md:flex jusitfy-between items-center space-x-4 ml-20 font-medium">
            <li><a href="#">Category <i class="bi bi-chevron-compact-down"></i></a></li>
            <li><a href="#">Deals</a></li>
            <li><a href="#">Whats New</a></li>
        </ul>         
    </div>
    <!-- <div class="flex items-center hidden bg-white" id="navBar"> 
        <h1 class="text-xl md:text-2xl font-medium">Belle For You</h1>       
        <ul class="hidden md:flex jusitfy-between items-center space-x-4 ml-20 font-medium">
            <li><a href="#">Category <i class="bi bi-chevron-compact-down"></i></a></li>
            <li><a href="#">Deals</a></li>
            <li><a href="#">Whats New</a></li>
        </ul>         
    </div> -->
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

 <!-- Hero -->
    <section class="md:px-28 p-8 relative">
    <div class="z-50 absolute md:top-28 py-3 flex flex-col px-10">
            
            <h1 class="md:text-5xl text-lg text-center md:text-center lg:text-start  font-bold text-white">Grab Upto 50% Off <br>On Our Asoebi</h1>
                <div class="py-2 flex justify-center text-sm md:text-lg lg:justify-start items-center lg:text-start space-x-4">
            <button class="bg-white font-semibold px-4 py-2 md:px-6 md:py-3 rounded-3xl text-[#D4AF37]">Buy Now</button>
            <button class="text-white underline underline-offset-4 font-medium">View all Category</button>
           
        </div>
        </div>
    <div class=" carousel w-full">
    
  <div id="slide1" class="carousel-item relative w-full">
    <img src="../images/hero.png" class="w-full" />
    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-3/4">
      <a href="#slide4" class="btn btn-circle w-4 h-4 w-4 h-4">❮</a> 
      <a href="#slide2" class="btn btn-circle w-4 h-4 w-4 h-4">❯</a>
    </div>
  </div> 
  <div id="slide2" class="carousel-item relative w-full">
    <img src="../images/1.png" class="w-full" />
    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-3/4">
      <a href="#slide1" class="btn btn-circle w-4 h-4">❮</a> 
      <a href="#slide3" class="btn btn-circle w-4 h-4">❯</a>
    </div>
  </div> 
  <div id="slide3" class="carousel-item relative w-full">
    <img src="../images/2.png" class="w-full" />
    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-3/4">
      <a href="#slide2" class="btn btn-circle w-4 h-4">❮</a> 
      <a href="#slide4" class="btn btn-circle w-4 h-4">❯</a>
    </div>
  </div> 
  <div id="slide4" class="carousel-item relative w-full">
    <img src="../images/3.png" class="w-full" />
    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-3/4">
      <a href="#slide3" class="btn btn-circle w-4 h-4">❮</a> 
      <a href="#slide1" class="btn btn-circle w-4 h-4">❯</a>
    </div>
  </div>
</div>
        <!-- <div class="absolute md:top-28 py-3 flex flex-col px-10">
            
            <h1 class="md:text-5xl text-lg text-center md:text-center lg:text-start  font-bold text-white">Grab Upto 50% Off <br>On Our Asoebi</h1>
                <div class="py-2 flex justify-center text-sm md:text-lg lg:justify-start items-center lg:text-start space-x-4">
            <button class="bg-white font-semibold px-4 py-2 md:px-6 md:py-3 rounded-3xl text-[#D4AF37]">Buy Now</button>
            <button class="text-white underline underline-offset-4 font-medium">View all Category</button>
           
        </div>
        </div>
       
        <div>
        <img class="rounded-3xl h-fit w-fit md:h-96 w-full object-cover" src="../images/hero.png" alt="">  
     </div>  -->
    
    </section>

     <!-- /Hero -->
     
     <!-- Categories -->
     <section class="md:px-28 p-8">
        <div class="flex md:justify-between items-center">
            <div class="md:space-x-4 space-y-2 space-x-2 flex-wrap">
            <button class="bg-gray-200 px-3 py-2 whitespace-nowrap md:px-6 md:py-2 rounded-3xl font-medium">Asoebi</button>
            
            <button class="bg-gray-200 px-3 py-2 whitespace-nowrap md:px-6 md:py-2 rounded-3xl font-medium">Trousers</button>
            <button class="bg-gray-200 px-3 py-2 whitespace-nowrap md:px-6 md:py-2 rounded-3xl font-medium">Skirts</button>
            <button class="bg-gray-200 px-3 py-2 whitespace-nowrap md:px-6 md:py-2 rounded-3xl font-medium">Dresses</button>
            <button class="bg-gray-200 px-3 py-2 whitespace-nowrap md:px-6 md:py-2 rounded-3xl font-medium">Office Wears</button>
            <button class="bg-gray-200 px-3 py-2 whitespace-nowrap md:px-6 md:py-2 rounded-3xl font-medium">2 Piece Trousers</button>
        </div>
        <div>
            <Button class="border border-2 border-gray-300 px-5 py-2 rounded-full font-medium text-center whitespace-nowrap">
                Sort By
                <select name="Sort By" id="">
                    <option value=""></option>
                </select>
            </Button>
        </div>
        
        </div>
     </section>
      <!-- /Categories -->

      <!-- Products -->
      <section class="md:px-28 p-8">
            <h1 class="text-2xl font-medium">Asoebi For You</h1>
           
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 my-10">
                     <!-- Items -->
                <div class="relative">
                    <span class="absolute top-0 right-0 h-16 w-16 flex p-4 justify-end "><i class="bi bi-heart"></i></span>
                    
                    <img class="rounded-3xl object-contain h-48 w-96" src="../images/pngwing.png" alt="">
                    <div class="py-3 space-y-1">
                    <h1 class="text-lg">First Asoebi Product Name</h1>
                    <p class="text-2xl text-[#382B00] font-medium">&#8358;24,000</p>
                      <button class="bg-white  border-2 border-[#D4AF37] text-[#D4AF37] font-semibold px-4 py-2 md:px-8 md:py-2 rounded-3xl">Buy Now</button>
                   
                    </div>
                    </div>
                    <div class="relative">
                        <span class="absolute top-0 right-0 h-16 w-16 flex p-4 justify-end "><i class="bi bi-heart"></i></span>
                        
                        <img class="rounded-3xl object-contain h-48 w-96 object-contain h-48 w-96" src="../images/pngwing2.png" alt="">
                        <div class="py-3 space-y-1">
                        <h1 class="text-lg">First Asoebi Product Name</h1>
                         <p class="text-2xl text-[#382B00] font-medium">&#8358;24,000</p>
                        <button class="bg-[#D4AF37]  border-2 border-[#D4AF37] text-white font-semibold px-4 py-2 md:px-8 md:py-2 rounded-3xl">Buy Now</button>
                   
                        </div>
                        </div>
                        <div class="relative">
                            <span class="absolute top-0 right-0 h-16 w-16 flex p-4 justify-end "><i class="bi bi-heart"></i></span>
                            
                            <img class="rounded-3xl object-contain h-48 w-96" src="../images/pngwing3.png" alt="">
                            <div class="py-3 space-y-1">
                            <h1 class="text-lg">First Asoebi Product Name</h1>
                            <p class="text-2xl font-medium">&#8358;24,000</p>
                            <button class="bg-white  border-2 border-[#D4AF37] text-[#D4AF37] font-semibold px-4 py-2 md:px-8 md:py-2 rounded-3xl">Buy Now</button>
                   
                            </div>
                            </div>
                            <div class="relative">
                                <span class="absolute top-0 right-0 h-16 w-16 flex p-4 justify-end "><i class="bi bi-heart"></i></span>
                                
                                <img class="rounded-3xl object-contain h-48 w-96" src="../images/pngwing.png" alt="">
                                <div class="py-3 space-y-1">
                                <h1 class="text-lg">First Asoebi Product Name</h1>
                                <p class="text-2xl font-medium">&#8358;24,000</p>
                                <button class="bg-white  border-2 border-[#D4AF37] text-[#D4AF37] font-semibold px-4 py-2 md:px-8 md:py-2 rounded-3xl">Buy Now</button>
                   
                                </div>
                                </div>
              
            </div>
                  
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 my-10">
                     <!-- Items -->
                <div class="relative">
                    <span class="absolute top-0 right-0 h-16 w-16 flex p-4 justify-end "><i class="bi bi-heart"></i></span>
                    
                    <img class="rounded-3xl object-contain h-48 w-96" src="../images/pngwing.png" alt="">
                    <div class="py-3 space-y-1">
                    <h1 class="text-lg">First Asoebi Product Name</h1>
                    <p class="text-2xl font-medium">&#8358;24,000</p>
                      <button class="bg-white  border-2 border-[#D4AF37] text-[#D4AF37] font-semibold px-4 py-2 md:px-8 md:py-2 rounded-3xl">Buy Now</button>
                   
                    </div>
                    </div>
                    <div class="relative">
                        <span class="absolute top-0 right-0 h-16 w-16 flex p-4 justify-end "><i class="bi bi-heart"></i></span>
                        
                        <img class="rounded-3xl object-contain h-48 w-96" src="../images/pngwing2.png" alt="">
                        <div class="py-3 space-y-1">
                        <h1 class="text-lg">First Asoebi Product Name</h1>
                         <p class="text-2xl text-[#382B00] font-medium">&#8358;24,000</p>
                        <button class="bg-[#D4AF37]  border-2 border-[#D4AF37] text-white font-semibold px-4 py-2 md:px-8 md:py-2 rounded-3xl">Buy Now</button>
                   
                        </div>
                        </div>
                        <div class="relative">
                            <span class="absolute top-0 right-0 h-16 w-16 flex p-4 justify-end "><i class="bi bi-heart"></i></span>
                            
                            <img class="rounded-3xl object-contain h-48 w-96" src="../images/pngwing3.png" alt="">
                            <div class="py-3 space-y-1">
                            <h1 class="text-lg">First Asoebi Product Name</h1>
                            <p class="text-2xl font-medium">&#8358;24,000</p>
                            <button class="bg-white  border-2 border-[#D4AF37] text-[#D4AF37] font-semibold px-4 py-2 md:px-8 md:py-2 rounded-3xl">Buy Now</button>
                   
                            </div>
                            </div>
                            <div class="relative">
                                <span class="absolute top-0 right-0 h-16 w-16 flex p-4 justify-end "><i class="bi bi-heart"></i></span>
                                
                                <img class="rounded-3xl object-contain h-48 w-96" src="../images/pngwing.png" alt="">
                                <div class="py-3 space-y-1">
                                <h1 class="text-lg">First Asoebi Product Name</h1>
                                <p class="text-2xl font-medium">&#8358;24,000</p>
                                <button class="bg-white  border-2 border-[#D4AF37] text-[#D4AF37] font-semibold px-4 py-2 md:px-8 md:py-2 rounded-3xl">Buy Now</button>
                   
                                </div>
                                </div>
              
            </div>
              
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 my-10">
                     <!-- Items -->
                <div class="relative">
                    <span class="absolute top-0 right-0 h-16 w-16 flex p-4 justify-end "><i class="bi bi-heart"></i></span>
                    
                    <img class="rounded-3xl object-contain h-48 w-96" src="../images/pngwing.png" alt="">
                    <div class="py-3 space-y-1">
                    <h1 class="text-lg">First Asoebi Product Name</h1>
                    <p class="text-2xl font-medium">&#8358;24,000</p>
                      <button class="bg-white  border-2 border-[#D4AF37] text-[#D4AF37] font-semibold px-4 py-2 md:px-8 md:py-2 rounded-3xl">Buy Now</button>
                   
                    </div>
                    </div>
                    <div class="relative">
                        <span class="absolute top-0 right-0 h-16 w-16 flex p-4 justify-end "><i class="bi bi-heart"></i></span>
                        
                        <img class="rounded-3xl object-contain h-48 w-96" src="../images/pngwing2.png" alt="">
                        <div class="py-3 space-y-1">
                        <h1 class="text-lg">First Asoebi Product Name</h1>
                         <p class="text-2xl text-[#382B00] font-medium">&#8358;24,000</p>
                        <button class="bg-[#D4AF37]  border-2 border-[#D4AF37] text-white font-semibold px-4 py-2 md:px-8 md:py-2 rounded-3xl">Buy Now</button>
                   
                        </div>
                        </div>
                        <div class="relative">
                            <span class="absolute top-0 right-0 h-16 w-16 flex p-4 justify-end "><i class="bi bi-heart"></i></span>
                            
                            <img class="rounded-3xl object-contain h-48 w-96" src="../images/pngwing3.png" alt="">
                            <div class="py-3 space-y-1">
                            <h1 class="text-lg">First Asoebi Product Name</h1>
                            <p class="text-2xl font-medium">&#8358;24,000</p>
                            <button class="bg-white  border-2 border-[#D4AF37] text-[#D4AF37] font-semibold px-4 py-2 md:px-8 md:py-2 rounded-3xl">Buy Now</button>
                   
                            </div>
                            </div>
                            <div class="relative">
                                <span class="absolute top-0 right-0 h-16 w-16 flex p-4 justify-end "><i class="bi bi-heart"></i></span>
                                
                                <img class="rounded-3xl object-contain h-48 w-96" src="../images/pngwing.png" alt="">
                                <div class="py-3 space-y-1">
                                <h1 class="text-lg">First Asoebi Product Name</h1>
                                <p class="text-2xl font-medium">&#8358;24,000</p>
                                <button class="bg-white  border-2 border-[#D4AF37] text-[#D4AF37] font-semibold px-4 py-2 md:px-8 md:py-2 rounded-3xl">Buy Now</button>
                   
                                </div>
                                </div>
              
            </div>
            


</section>
       <!-- /Products -->

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