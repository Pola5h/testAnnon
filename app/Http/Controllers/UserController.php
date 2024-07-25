<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::with('contracts.organization')->get();

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
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8',
    //     ]);

    //     $validated['password'] = bcrypt($validated['password']);

    //     return User::create($validated);
    // }

    public function store(Request $request)
    {
        $user = $this->userService->validateAndCreate($request->all());

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::with('contracts.organization')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $user = User::findOrFail($id);

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {

    //     $user = User::findOrFail($id);

    //     $validated = $request->validate([
    //         'name' => 'sometimes|required|string|max:255',
    //         'email' => 'sometimes|required|string|email|max:255|unique:users,email,'.$user->id,
    //         'password' => 'sometimes|required|string|min:8',
    //     ]);

    //     if ($request->filled('password')) {
    //         $validated['password'] = bcrypt($validated['password']);
    //     }

    //     $user->update($validated);

    //     return $user;
    // }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $updatedUser = $this->userService->validateAndUpdate($request->all(), $user);

        return response()->json($updatedUser);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 204);
    }
}
