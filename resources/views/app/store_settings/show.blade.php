<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.store_settings.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('store-settings.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.store_settings.inputs.key')
                        </h5>
                        <span>{{ $storeSetting->key ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.store_settings.inputs.value')
                        </h5>
                        <span>{{ $storeSetting->value ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-10">
                    <a
                        href="{{ route('store-settings.index') }}"
                        class="button"
                    >
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\StoreSetting::class)
                    <a
                        href="{{ route('store-settings.create') }}"
                        class="button"
                    >
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
