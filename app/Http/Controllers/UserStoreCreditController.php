<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserStoreCredit;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.user_store_credits.index',
            compact('userStoreCredits', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', UserStoreCredit::class);

        $users = User::pluck('name', 'id');

        return view('app.user_store_credits.create', compact('users'));
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

        return redirect()
            ->route('user-store-credits.edit', $userStoreCredit)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserStoreCredit $userStoreCredit
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, UserStoreCredit $userStoreCredit)
    {
        $this->authorize('view', $userStoreCredit);

        return view('app.user_store_credits.show', compact('userStoreCredit'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserStoreCredit $userStoreCredit
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, UserStoreCredit $userStoreCredit)
    {
        $this->authorize('update', $userStoreCredit);

        $users = User::pluck('name', 'id');

        return view(
            'app.user_store_credits.edit',
            compact('userStoreCredit', 'users')
        );
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

        return redirect()
            ->route('user-store-credits.edit', $userStoreCredit)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('user-store-credits.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
