<?php

namespace App\Http\Controllers\Api;

use App\Models\NetworkTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NetworkTeamResource;
use App\Http\Resources\NetworkTeamCollection;
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
            ->paginate();

        return new NetworkTeamCollection($networkTeams);
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

        return new NetworkTeamResource($networkTeam);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\NetworkTeam $networkTeam
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, NetworkTeam $networkTeam)
    {
        $this->authorize('view', $networkTeam);

        return new NetworkTeamResource($networkTeam);
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

        return new NetworkTeamResource($networkTeam);
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

        return response()->noContent();
    }
}
