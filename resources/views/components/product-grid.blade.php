<section class="bg-white my-18"
         data-aos="fade-left"
         data-aos-delay="200"
         data-aos-duration="600"
         data-aos-easing="ease-in-sine"
>
    <h1 class="text-2xl font-medium text-black">{{$title}}</h1>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 my-10">
        @foreach ($products as $product )
            <a href="{{ route('product.show', ['id' => $product->id]) }}" class="cursor-pointer">
            <x-product-card :thumbnail="$product->thumbnail" :name="$product->name" :price="$product->price" />
            </a>
        @endforeach
    </div>

</section>
