<section class="bg-white my-18"  
    data-aos="fade-left"  
    data-aos-delay="200"
    data-aos-duration="600" 
    data-aos-easing="ease-in-sine"
>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 my-10">
  @foreach ($products as $product )
            <!-- Items -->
            <div class="relative">
                <span class="absolute top-0 right-0 h-16 w-16 flex p-4 justify-end "><i class="bi bi-heart"></i></span>

                <img class="rounded-3xl object-contain h-48 w-96" src="storage/{{$product->thumbnail ? $product->thumbnail : '../images/pngwing.png'}}" alt="{{$product->name}}">
                <div class="py-3 space-y-1">
                    <h1 class="text-lg">{{$product->name}}</h1>
                    <p class="text-2xl text-[#382B00] font-medium">&#8358; {{number_format($product->price, 2)}} </p>
                    <button wire:click="add-to-cart($product->id)"
                        class="bg-white hover:text-white hover:bg-[#D4AF37] border-2 border-[#D4AF37] text-[#D4AF37] font-semibold px-4 py-2 md:px-8 md:py-2 rounded-3xl">
                        Buy
                        Now </button>

                </div>
            </div>
            @endforeach
        </div>
    
  </section>

  {{-- @livewire('add-to-cart', ['product' => $product->id]) --}}