<?php

namespace App\Http\Controllers;

use App\Models\NetworkTeam;
use Illuminate\Http\Request;
use App\Http\Requests\NetworkTeamStoreRequest;
use App\Http\Requests\NetworkTeamUpdateRequest;

class NetworkTeamController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', NetworkTeam::class);

        $search = $request->get('search', '');

        $networkTeams = NetworkTeam::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.network_teams.index',
            compact('networkTeams', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', NetworkTeam::class);

        return view('app.network_teams.create');
    }

    /**
     * @param \App\Http\Requests\NetworkTeamStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NetworkTeamStoreRequest $request)
    {
        $this->authorize('create', NetworkTeam::class);

        $validated = $request->validated();

        $networkTeam = NetworkTeam::create($validated);

        return redirect()
            ->route('network-teams.edit', $networkTeam)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\NetworkTeam $networkTeam
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, NetworkTeam $networkTeam)
    {
        $this->authorize('view', $networkTeam);

        return view('app.network_teams.show', compact('networkTeam'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\NetworkTeam $networkTeam
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, NetworkTeam $networkTeam)
    {
        $this->authorize('update', $networkTeam);

        return view('app.network_teams.edit', compact('networkTeam'));
    }

    /**
     * @param \App\Http\Requests\NetworkTeamUpdateRequest $request
     * @param \App\Models\NetworkTeam $networkTeam
     * @return \Illuminate\Http\Response
     */
    public function update(
        NetworkTeamUpdateRequest $request,
        NetworkTeam $networkTeam
    ) {
        $this->authorize('update', $networkTeam);

        $validated = $request->validated();

        $networkTeam->update($validated);

        return redirect()
            ->route('network-teams.edit', $networkTeam)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\NetworkTeam $networkTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, NetworkTeam $networkTeam)
    {
        $this->authorize('delete', $networkTeam);

        $networkTeam->delete();

        return redirect()
            ->route('network-teams.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
