<?php

namespace App\Http\Controllers\Api;

use App\Models\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuoteResource;
use App\Http\Resources\QuoteCollection;
use App\Http\Requests\QuoteStoreRequest;
use App\Http\Requests\QuoteUpdateRequest;

class QuoteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Quote::class);

        $search = $request->get('search', '');

        $quotes = Quote::search($search)
            ->latest()
            ->paginate();

        return new QuoteCollection($quotes);
    }

    /**
     * @param \App\Http\Requests\QuoteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuoteStoreRequest $request)
    {
        $this->authorize('create', Quote::class);

        $validated = $request->validated();

        $quote = Quote::create($validated);

        return new QuoteResource($quote);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Quote $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Quote $quote)
    {
        $this->authorize('view', $quote);

        return new QuoteResource($quote);
    }

    /**
     * @param \App\Http\Requests\QuoteUpdateRequest $request
     * @param \App\Models\Quote $quote
     * @return \Illuminate\Http\Response
     */
    public function update(QuoteUpdateRequest $request, Quote $quote)
    {
        $this->authorize('update', $quote);

        $validated = $request->validated();

        $quote->update($validated);

        return new QuoteResource($quote);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Quote $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Quote $quote)
    {
        $this->authorize('delete', $quote);

        $quote->delete();

        return response()->noContent();
    }
}
