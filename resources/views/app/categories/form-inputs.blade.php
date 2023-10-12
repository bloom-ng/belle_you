@php $editing = isset($category) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $category->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="parent_id"
            label="Parent Id"
            :value="old('parent_id', ($editing ? $category->parent_id : ''))"
            max="255"
            placeholder="Parent Id"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
