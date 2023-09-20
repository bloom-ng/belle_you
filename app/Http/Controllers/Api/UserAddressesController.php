<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Http\Resources\AddressCollection;

class UserAddressesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $addresses = $user
            ->addresses()
            ->search($search)
            ->latest()
            ->paginate();

        return new AddressCollection($addresses);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', Address::class);

        $validated = $request->validate([
            'country' => ['required', 'max:255', 'string'],
            'state' => ['required', 'max:255', 'string'],
            'city' => ['required', 'max:255', 'string'],
            'zip_code' => ['nullable', 'max:255', 'string'],
            'address_line_1' => ['required', 'max:255', 'string'],
            'address_line_2' => ['nullable', 'max:255', 'string'],
            'phone' => ['required', 'max:255', 'string'],
            'phone_2' => ['nullable', 'max:255', 'string'],
        ]);

        $address = $user->addresses()->create($validated);

        return new AddressResource($address);
    }
}
