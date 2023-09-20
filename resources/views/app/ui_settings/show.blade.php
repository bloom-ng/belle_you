<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.ui_settings.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('ui-settings.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.ui_settings.inputs.key')
                        </h5>
                        <span>{{ $uiSetting->key ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.ui_settings.inputs.value')
                        </h5>
                        <span>{{ $uiSetting->value ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.ui_settings.inputs.page')
                        </h5>
                        <span>{{ $uiSetting->page ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.ui_settings.inputs.name')
                        </h5>
                        <span>{{ $uiSetting->name ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('ui-settings.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\UiSetting::class)
                    <a href="{{ route('ui-settings.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
