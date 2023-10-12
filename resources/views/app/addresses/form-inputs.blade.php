@php $editing = isset($address) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="user_id"
            label="User Id"
            :value="old('user_id', ($editing ? $address->user_id : ''))"
            maxlength="255"
            placeholder="User Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="country"
            label="Country"
            :value="old('country', ($editing ? $address->country : ''))"
            maxlength="255"
            placeholder="Country"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="state"
            label="State"
            :value="old('state', ($editing ? $address->state : ''))"
            maxlength="255"
            placeholder="State"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="city"
            label="City"
            :value="old('city', ($editing ? $address->city : ''))"
            maxlength="255"
            placeholder="City"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="zip_code"
            label="Zip Code"
            :value="old('zip_code', ($editing ? $address->zip_code : ''))"
            maxlength="255"
            placeholder="Zip Code"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="address_line_1"
            label="Address Line 1"
            maxlength="255"
            required
            >{{ old('address_line_1', ($editing ? $address->address_line_1 :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="address_line_2"
            label="Address Line 2"
            maxlength="255"
            >{{ old('address_line_2', ($editing ? $address->address_line_2 :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="phone"
            label="Phone"
            :value="old('phone', ($editing ? $address->phone : ''))"
            maxlength="255"
            placeholder="Phone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="phone_2"
            label="Phone 2"
            :value="old('phone_2', ($editing ? $address->phone_2 : ''))"
            maxlength="255"
            placeholder="Phone 2"
        ></x-inputs.text>
    </x-inputs.group>
</div>
