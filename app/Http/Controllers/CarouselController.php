<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CarouselStoreRequest;
use App\Http\Requests\CarouselUpdateRequest;

class CarouselController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Carousel::class);

        $search = $request->get('search', '');

        $carousels = Carousel::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.carousels.index', compact('carousels', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Carousel::class);

        return view('app.carousels.create');
    }

    /**
     * @param \App\Http\Requests\CarouselStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarouselStoreRequest $request)
    {
        $this->authorize('create', Carousel::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $carousel = Carousel::create($validated);

        return redirect()
            ->route('carousels.edit', $carousel)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Carousel $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Carousel $carousel)
    {
        $this->authorize('view', $carousel);

        return view('app.carousels.show', compact('carousel'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Carousel $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Carousel $carousel)
    {
        $this->authorize('update', $carousel);

        return view('app.carousels.edit', compact('carousel'));
    }

    /**
     * @param \App\Http\Requests\CarouselUpdateRequest $request
     * @param \App\Models\Carousel $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(CarouselUpdateRequest $request, Carousel $carousel)
    {
        $this->authorize('update', $carousel);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($carousel->image) {
                Storage::delete($carousel->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $carousel->update($validated);

        return redirect()
            ->route('carousels.edit', $carousel)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Carousel $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Carousel $carousel)
    {
        $this->authorize('delete', $carousel);

        if ($carousel->image) {
            Storage::delete($carousel->image);
        }

        $carousel->delete();

        return redirect()
            ->route('carousels.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
