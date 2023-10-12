@php $editing = isset($invoice) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="user_id"
            label="User Id"
            :value="old('user_id', ($editing ? $invoice->user_id : ''))"
            maxlength="255"
            placeholder="User Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="invoice_ref"
            label="Invoice Ref"
            :value="old('invoice_ref', ($editing ? $invoice->invoice_ref : ''))"
            maxlength="255"
            placeholder="Invoice Ref"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="line_items"
            label="Line Items"
            maxlength="255"
            required
            >{{ old('line_items', ($editing ? json_encode($invoice->line_items)
            : '')) }}</x-inputs.textarea
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
            name="user_name"
            label="User Name"
            :value="old('user_name', ($editing ? $invoice->user_name : ''))"
            maxlength="255"
            placeholder="User Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="phone"
            label="Phone"
            :value="old('phone', ($editing ? $invoice->phone : ''))"
            maxlength="255"
            placeholder="Phone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="total"
            label="Total"
            :value="old('total', ($editing ? $invoice->total : ''))"
            max="255"
            step="0.01"
            placeholder="Total"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
