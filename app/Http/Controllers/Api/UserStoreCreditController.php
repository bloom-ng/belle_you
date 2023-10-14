<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\UserStoreCredit;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserStoreCreditResource;
use App\Http\Resources\UserStoreCreditCollection;
use App\Http\Requests\UserStoreCreditStoreRequest;
use App\Http\Requests\UserStoreCreditUpdateRequest;

class UserStoreCreditController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', UserStoreCredit::class);

        $search = $request->get('search', '');

        $userStoreCredits = UserStoreCredit::search($search)
            ->latest()
            ->paginate();

        return new UserStoreCreditCollection($userStoreCredits);
    }

    /**
     * @param \App\Http\Requests\UserStoreCreditStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreCreditStoreRequest $request)
    {
        $this->authorize('create', UserStoreCredit::class);

        $validated = $request->validated();

        $userStoreCredit = UserStoreCredit::create($validated);

        return new UserStoreCreditResource($userStoreCredit);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserStoreCredit $userStoreCredit
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, UserStoreCredit $userStoreCredit)
    {
        $this->authorize('view', $userStoreCredit);

        return new UserStoreCreditResource($userStoreCredit);
    }

    /**
     * @param \App\Http\Requests\UserStoreCreditUpdateRequest $request
     * @param \App\Models\UserStoreCredit $userStoreCredit
     * @return \Illuminate\Http\Response
     */
    public function update(
        UserStoreCreditUpdateRequest $request,
        UserStoreCredit $userStoreCredit
    ) {
        $this->authorize('update', $userStoreCredit);

        $validated = $request->validated();

        $userStoreCredit->update($validated);

        return new UserStoreCreditResource($userStoreCredit);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserStoreCredit $userStoreCredit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UserStoreCredit $userStoreCredit)
    {
        $this->authorize('delete', $userStoreCredit);

        $userStoreCredit->delete();

        return response()->noContent();
    }
}
