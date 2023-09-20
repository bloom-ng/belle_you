<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.invoices.index_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <div class="mb-5 mt-4">
                    <div class="flex flex-wrap justify-between">
                        <div class="md:w-1/2">
                            <form>
                                <div class="flex items-center w-full">
                                    <x-inputs.text
                                        name="search"
                                        value="{{ $search ?? '' }}"
                                        placeholder="{{ __('crud.common.search') }}"
                                        autocomplete="off"
                                    ></x-inputs.text>

                                    <div class="ml-1">
                                        <button
                                            type="submit"
                                            class="button button-primary"
                                        >
                                            <i class="icon ion-md-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="md:w-1/2 text-right">
                            @can('create', App\Models\Invoice::class)
                            <a
                                href="{{ route('invoices.create') }}"
                                class="button button-primary"
                            >
                                <i class="mr-1 icon ion-md-add"></i>
                                @lang('crud.common.create')
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="block w-full overflow-auto scrolling-touch">
                    <table class="w-full max-w-full mb-4 bg-transparent">
                        <thead class="text-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.invoices.inputs.line_item')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.invoices.inputs.status')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.invoices.inputs.billed_to_line_1')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.invoices.inputs.billed_to_line_2')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.invoices.inputs.account_name')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.invoices.inputs.account_number')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.invoices.inputs.bank_name')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.invoices.inputs.service_charge')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.invoices.inputs.vat')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($invoices as $invoice)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-right">
                                    <pre>
{{ json_encode($invoice->line_item) ?? '-' }}</pre
                                    >
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $invoice->status ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $invoice->billed_to_line_1 ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $invoice->billed_to_line_2 ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $invoice->account_name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $invoice->account_number ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $invoice->bank_name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $invoice->service_charge ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $invoice->vat ?? '-' }}
                                </td>
                                <td
                                    class="px-4 py-3 text-center"
                                    style="width: 134px;"
                                >
                                    <div
                                        role="group"
                                        aria-label="Row Actions"
                                        class="
                                            relative
                                            inline-flex
                                            align-middle
                                        "
                                    >
                                        @can('update', $invoice)
                                        <a
                                            href="{{ route('invoices.edit', $invoice) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i
                                                    class="icon ion-md-create"
                                                ></i>
                                            </button>
                                        </a>
                                        @endcan @can('view', $invoice)
                                        <a
                                            href="{{ route('invoices.show', $invoice) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan @can('delete', $invoice)
                                        <form
                                            action="{{ route('invoices.destroy', $invoice) }}"
                                            method="POST"
                                            onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                        >
                                            @csrf @method('DELETE')
                                            <button
                                                type="submit"
                                                class="button"
                                            >
                                                <i
                                                    class="
                                                        icon
                                                        ion-md-trash
                                                        text-red-600
                                                    "
                                                ></i>
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="10">
                                    <div class="mt-10 px-4">
                                        {!! $invoices->render() !!}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
