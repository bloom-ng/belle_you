<?php

namespace App\Http\Controllers\Api;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\BannerCollection;
use App\Http\Requests\BannerStoreRequest;
use App\Http\Requests\BannerUpdateRequest;

class BannerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Banner::class);

        $search = $request->get('search', '');

        $banners = Banner::search($search)
            ->latest()
            ->paginate();

        return new BannerCollection($banners);
    }

    /**
     * @param \App\Http\Requests\BannerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerStoreRequest $request)
    {
        $this->authorize('create', Banner::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $banner = Banner::create($validated);

        return new BannerResource($banner);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Banner $banner)
    {
        $this->authorize('view', $banner);

        return new BannerResource($banner);
    }

    /**
     * @param \App\Http\Requests\BannerUpdateRequest $request
     * @param \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerUpdateRequest $request, Banner $banner)
    {
        $this->authorize('update', $banner);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($banner->image) {
                Storage::delete($banner->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $banner->update($validated);

        return new BannerResource($banner);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Banner $banner)
    {
        $this->authorize('delete', $banner);

        if ($banner->image) {
            Storage::delete($banner->image);
        }

        $banner->delete();

        return response()->noContent();
    }
}
