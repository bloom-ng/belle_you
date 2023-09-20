<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.invoices.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('invoices.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.invoices.inputs.line_item')
                        </h5>
                        <pre>{{ json_encode($invoice->line_item) ?? '-' }}</pre>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.invoices.inputs.status')
                        </h5>
                        <span>{{ $invoice->status ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.invoices.inputs.billed_to_line_1')
                        </h5>
                        <span>{{ $invoice->billed_to_line_1 ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.invoices.inputs.billed_to_line_2')
                        </h5>
                        <span>{{ $invoice->billed_to_line_2 ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.invoices.inputs.account_name')
                        </h5>
                        <span>{{ $invoice->account_name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.invoices.inputs.account_number')
                        </h5>
                        <span>{{ $invoice->account_number ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.invoices.inputs.bank_name')
                        </h5>
                        <span>{{ $invoice->bank_name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.invoices.inputs.service_charge')
                        </h5>
                        <span>{{ $invoice->service_charge ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.invoices.inputs.vat')
                        </h5>
                        <span>{{ $invoice->vat ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('invoices.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Invoice::class)
                    <a href="{{ route('invoices.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
