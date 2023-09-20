@php $editing = isset($quote) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $quote->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="contact_info"
            label="Contact Info"
            :value="old('contact_info', ($editing ? $quote->contact_info : ''))"
            maxlength="255"
            placeholder="Contact Info"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="notes" label="Notes" maxlength="255" required
            >{{ old('notes', ($editing ? $quote->notes : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="product_id"
            label="Product Id"
            :value="old('product_id', ($editing ? $quote->product_id : ''))"
            maxlength="255"
            placeholder="Product Id"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
