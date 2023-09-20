@php $editing = isset($review) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="user_id"
            label="User Id"
            :value="old('user_id', ($editing ? $review->user_id : ''))"
            maxlength="255"
            placeholder="User Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="rating"
            label="Rating"
            :value="old('rating', ($editing ? $review->rating : ''))"
            maxlength="255"
            placeholder="Rating"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="message"
            label="Message"
            maxlength="255"
            required
            >{{ old('message', ($editing ? $review->message : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.checkbox
            name="visibility"
            label="Visibility"
            :checked="old('visibility', ($editing ? $review->visibility : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="product_id"
            label="Product Id"
            :value="old('product_id', ($editing ? $review->product_id : ''))"
            maxlength="255"
            placeholder="Product Id"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
