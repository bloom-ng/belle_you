@php $editing = isset($product) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $product->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="quantity"
            label="Quantity"
            :value="old('quantity', ($editing ? $product->quantity : ''))"
            max="255"
            placeholder="Quantity"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <div
            x-data="imageViewer('{{ $editing && $product->image ? \Storage::url($product->image) : '' }}')"
        >
            <x-inputs.partials.label
                name="image"
                label="Image"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="image"
                    id="image"
                    @change="fileChosen"
                />
            </div>

            @error('image') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="image_2"
            label="Image 2"
            :value="old('image_2', ($editing ? $product->image_2 : ''))"
            maxlength="255"
            placeholder="Image 2"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="price"
            label="Price"
            :value="old('price', ($editing ? $product->price : ''))"
            max="255"
            step="0.01"
            placeholder="Price"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $product->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="type" label="Type">
            @php $selected = old('type', ($editing ? $product->type : '')) @endphp
            <option value="ready_made" {{ $selected == 'ready_made' ? 'selected' : '' }} >Ready made</option>
            <option value="custom" {{ $selected == 'custom' ? 'selected' : '' }} >Custom</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="short_description"
            label="Short Description"
            maxlength="255"
            >{{ old('short_description', ($editing ? $product->short_description
            : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="shipping_fee"
            label="Shipping Fee"
            :value="old('shipping_fee', ($editing ? $product->shipping_fee : '0.00'))"
            max="255"
            step="0.01"
            placeholder="Shipping Fee"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="sale_price"
            label="Sale Price"
            :value="old('sale_price', ($editing ? $product->sale_price : ''))"
            max="255"
            step="0.01"
            placeholder="Sale Price"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.date
            name="sale_start"
            label="Sale Start"
            value="{{ old('sale_start', ($editing ? optional($product->sale_start)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.date
            name="sale_end"
            label="Sale End"
            value="{{ old('sale_end', ($editing ? optional($product->sale_end)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="slug"
            label="Slug"
            :value="old('slug', ($editing ? $product->slug : ''))"
            maxlength="255"
            placeholder="Slug"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
