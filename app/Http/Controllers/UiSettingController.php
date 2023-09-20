<?php

namespace App\Http\Controllers;

use App\Models\UiSetting;
use Illuminate\Http\Request;
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
        $this->authorize('view-any', UiSetting::class);

        $search = $request->get('search', '');

        $uiSettings = UiSetting::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.ui_settings.index', compact('uiSettings', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', UiSetting::class);

        return view('app.ui_settings.create');
    }

    /**
     * @param \App\Http\Requests\UiSettingStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UiSettingStoreRequest $request)
    {
        $this->authorize('create', UiSetting::class);

        $validated = $request->validated();

        $uiSetting = UiSetting::create($validated);

        return redirect()
            ->route('ui-settings.edit', $uiSetting)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UiSetting $uiSetting
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, UiSetting $uiSetting)
    {
        $this->authorize('view', $uiSetting);

        return view('app.ui_settings.show', compact('uiSetting'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UiSetting $uiSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, UiSetting $uiSetting)
    {
        $this->authorize('update', $uiSetting);

        return view('app.ui_settings.edit', compact('uiSetting'));
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
        $this->authorize('update', $uiSetting);

        $validated = $request->validated();

        $uiSetting->update($validated);

        return redirect()
            ->route('ui-settings.edit', $uiSetting)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UiSetting $uiSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UiSetting $uiSetting)
    {
        $this->authorize('delete', $uiSetting);

        $uiSetting->delete();

        return redirect()
            ->route('ui-settings.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
