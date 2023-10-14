@php $editing = isset($networkTeam) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="user_id"
            label="User Id"
            :value="old('user_id', ($editing ? $networkTeam->user_id : ''))"
            maxlength="255"
            placeholder="User Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="parent"
            label="Parent"
            :value="old('parent', ($editing ? $networkTeam->parent : ''))"
            maxlength="255"
            placeholder="Parent"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
