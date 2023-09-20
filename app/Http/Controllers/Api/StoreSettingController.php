<?php

namespace App\Http\Controllers\Api;

use App\Models\StoreSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StoreSettingResource;
use App\Http\Resources\StoreSettingCollection;
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
            ->paginate();

        return new StoreSettingCollection($storeSettings);
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

        return new StoreSettingResource($storeSetting);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StoreSetting $storeSetting
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, StoreSetting $storeSetting)
    {
        $this->authorize('view', $storeSetting);

        return new StoreSettingResource($storeSetting);
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

        return new StoreSettingResource($storeSetting);
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

        return response()->noContent();
    }
}
