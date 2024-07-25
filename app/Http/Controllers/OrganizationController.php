<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Services\OrganizationService;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    protected $organizationService;

    public function __construct(OrganizationService $organizationService)
    {
        $this->organizationService = $organizationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Organization::with('contracts.user')->get();
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
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //     ]);

    //     return Organization::create($validated);
    // }

    public function store(Request $request)
    {
        $organization = $this->organizationService->validateAndCreate($request->all());

        return response()->json($organization, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Organization::with('contracts.user')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $organization = Organization::findOrFail($id);

        return response()->json($organization);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $organization = Organization::findOrFail($id);

    //     $validated = $request->validate([
    //         'name' => 'sometimes|required|string|max:255',
    //     ]);

    //     $organization->update($validated);

    //     return $organization;
    // }

    public function update(Request $request, string $id)
    {
        $organization = Organization::findOrFail($id);

        $updatedOrganization = $this->organizationService->validateAndUpdate($request->all(), $organization);

        return response()->json($updatedOrganization);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $organization = Organization::findOrFail($id);
        $organization->delete();

        return response()->json(null, 204);
    }
}
