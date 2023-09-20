@php $editing = isset($storeSetting) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="key"
            label="Key"
            :value="old('key', ($editing ? $storeSetting->key : ''))"
            maxlength="255"
            placeholder="Key"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="value" label="Value" maxlength="255" required
            >{{ old('value', ($editing ? $storeSetting->value : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
