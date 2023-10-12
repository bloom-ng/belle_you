<?php

namespace App\Http\Controllers\Api;

use App\Models\UiSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UiSettingResource;
use App\Http\Resources\UiSettingCollection;
use App\Http\Requests\UiSettingStoreRequest;
use App\Http\Requests\UiSettingUpdateRequest;

class UiSettingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->authorize('view-any', UiSetting::class);

        $search = $request->get('search', '');

        $uiSettings = UiSetting::search($search)
            ->latest()
            ->paginate();

        return new UiSettingCollection($uiSettings);
    }

    /**
     * @param \App\Http\Requests\UiSettingStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UiSettingStoreRequest $request)
    {
        // $this->authorize('create', UiSetting::class);

        $validated = $request->validated();

        $uiSetting = UiSetting::create($validated);

        return new UiSettingResource($uiSetting);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UiSetting $uiSetting
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, UiSetting $uiSetting)
    {
        // $this->authorize('view', $uiSetting);

        return new UiSettingResource($uiSetting);
    }

    /**
     * @param \App\Http\Requests\UiSettingUpdateRequest $request
     * @param \App\Models\UiSetting $uiSetting
     * @return \Illuminate\Http\Response
     */
    public function update(
        UiSettingUpdateRequest $request,
        UiSetting $uiSetting
    ) {
        // $this->authorize('update', $uiSetting);

        $validated = $request->validated();

        $uiSetting->update($validated);

        return new UiSettingResource($uiSetting);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UiSetting $uiSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UiSetting $uiSetting)
    {
        // $this->authorize('delete', $uiSetting);

        $uiSetting->delete();

        return response()->noContent();
    }
}
