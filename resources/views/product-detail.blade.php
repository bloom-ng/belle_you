<x-header />

<section class="lg:flex lg:flex-row lg:px-28 my-5">
    <div class="basis-1/2">
        <img src="{{$product->thumbnail}}" alt="{{$product->name}}">
    </div>

    <div class="basis-1/2">
        <h1 class="text-[#382B00] text-[24px] font-light">{{$product->name}}</h1>
        <h1 class="text-[#382B00] text-[32px] font-medium">{{$product->price}}</h1>
        <p>{{$product->description}}</p>
    </div>
</section>

<x-newsletter />
<x-footer />
