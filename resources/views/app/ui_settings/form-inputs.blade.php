@php $editing = isset($uiSetting) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="key"
            label="Key"
            :value="old('key', ($editing ? $uiSetting->key : ''))"
            maxlength="255"
            placeholder="Key"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="value" label="Value" maxlength="255" required
            >{{ old('value', ($editing ? $uiSetting->value : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="page"
            label="Page"
            :value="old('page', ($editing ? $uiSetting->page : ''))"
            maxlength="255"
            placeholder="Page"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $uiSetting->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
