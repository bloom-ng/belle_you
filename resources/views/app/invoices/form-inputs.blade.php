@php $editing = isset($invoice) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="line_item"
            label="Line Item"
            maxlength="255"
            required
            >{{ old('line_item', ($editing ? json_encode($invoice->line_item) :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="status"
            label="Status"
            :value="old('status', ($editing ? $invoice->status : ''))"
            maxlength="255"
            placeholder="Status"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="billed_to_line_1"
            label="Billed To Line 1"
            :value="old('billed_to_line_1', ($editing ? $invoice->billed_to_line_1 : ''))"
            maxlength="255"
            placeholder="Billed To Line 1"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="billed_to_line_2"
            label="Billed To Line 2"
            :value="old('billed_to_line_2', ($editing ? $invoice->billed_to_line_2 : ''))"
            maxlength="255"
            placeholder="Billed To Line 2"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="account_name"
            label="Account Name"
            :value="old('account_name', ($editing ? $invoice->account_name : ''))"
            maxlength="255"
            placeholder="Account Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="account_number"
            label="Account Number"
            :value="old('account_number', ($editing ? $invoice->account_number : ''))"
            maxlength="255"
            placeholder="Account Number"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="bank_name"
            label="Bank Name"
            :value="old('bank_name', ($editing ? $invoice->bank_name : ''))"
            maxlength="255"
            placeholder="Bank Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="service_charge"
            label="Service Charge"
            :value="old('service_charge', ($editing ? $invoice->service_charge : ''))"
            max="255"
            step="0.01"
            placeholder="Service Charge"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="vat"
            label="Vat"
            :value="old('vat', ($editing ? $invoice->vat : ''))"
            max="255"
            step="0.01"
            placeholder="Vat"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
