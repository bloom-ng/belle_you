@php $editing = isset($cart) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="user_id"
            label="User Id"
            :value="old('user_id', ($editing ? $cart->user_id : ''))"
            maxlength="255"
            placeholder="User Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="product_id"
            label="Product Id"
            :value="old('product_id', ($editing ? $cart->product_id : ''))"
            maxlength="255"
            placeholder="Product Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="quantity"
            label="Quantity"
            :value="old('quantity', ($editing ? $cart->quantity : ''))"
            max="255"
            placeholder="Quantity"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="specification"
            label="Specification"
            maxlength="255"
            required
            >{{ old('specification', ($editing ? $cart->specification : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
