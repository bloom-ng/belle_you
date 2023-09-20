@php $editing = isset($content) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="page"
            label="Page"
            :value="old('page', ($editing ? $content->page : ''))"
            maxlength="255"
            placeholder="Page"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $content->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="content_type"
            label="Content Type"
            :value="old('content_type', ($editing ? $content->content_type : ''))"
            maxlength="255"
            placeholder="Content Type"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="key"
            label="Key"
            :value="old('key', ($editing ? $content->key : ''))"
            maxlength="255"
            placeholder="Key"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="value" label="Value" maxlength="255" required
            >{{ old('value', ($editing ? $content->value : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
