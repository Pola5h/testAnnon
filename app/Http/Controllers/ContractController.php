<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Contract::with(['user', 'organization'])->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'organization_id' => 'required|exists:organizations,id',
            'contract_details' => 'required|string',
        ]);

        return Contract::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Contract::with(['user', 'organization'])->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contract = Contract::findOrFail($id);

        return response()->json($contract);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contract = Contract::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'organization_id' => 'sometimes|required|exists:organizations,id',
            'contract_details' => 'sometimes|required|string',
        ]);

        $contract->update($validated);

        return $contract;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $contract = Contract::findOrFail($id);
        $contract->delete();

        return response()->json(null, 204);
    }
}
