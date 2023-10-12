@php $editing = isset($productCategory) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="product_id"
            label="Product Id"
            :value="old('product_id', ($editing ? $productCategory->product_id : ''))"
            maxlength="255"
            placeholder="Product Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="category_id"
            label="Category Id"
            :value="old('category_id', ($editing ? $productCategory->category_id : ''))"
            maxlength="255"
            placeholder="Category Id"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
