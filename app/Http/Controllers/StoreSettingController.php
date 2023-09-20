<?php

namespace App\Http\Controllers;

use App\Models\StoreSetting;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSettingStoreRequest;
use App\Http\Requests\StoreSettingUpdateRequest;

class StoreSettingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', StoreSetting::class);

        $search = $request->get('search', '');

        $storeSettings = StoreSetting::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.store_settings.index',
            compact('storeSettings', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', StoreSetting::class);

        return view('app.store_settings.create');
    }

    /**
     * @param \App\Http\Requests\StoreSettingStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingStoreRequest $request)
    {
        $this->authorize('create', StoreSetting::class);

        $validated = $request->validated();

        $storeSetting = StoreSetting::create($validated);

        return redirect()
            ->route('store-settings.edit', $storeSetting)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StoreSetting $storeSetting
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, StoreSetting $storeSetting)
    {
        $this->authorize('view', $storeSetting);

        return view('app.store_settings.show', compact('storeSetting'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StoreSetting $storeSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, StoreSetting $storeSetting)
    {
        $this->authorize('update', $storeSetting);

        return view('app.store_settings.edit', compact('storeSetting'));
    }

    /**
     * @param \App\Http\Requests\StoreSettingUpdateRequest $request
     * @param \App\Models\StoreSetting $storeSetting
     * @return \Illuminate\Http\Response
     */
    public function update(
        StoreSettingUpdateRequest $request,
        StoreSetting $storeSetting
    ) {
        $this->authorize('update', $storeSetting);

        $validated = $request->validated();

        $storeSetting->update($validated);

        return redirect()
            ->route('store-settings.edit', $storeSetting)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StoreSetting $storeSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, StoreSetting $storeSetting)
    {
        $this->authorize('delete', $storeSetting);

        $storeSetting->delete();

        return redirect()
            ->route('store-settings.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
