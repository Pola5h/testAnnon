<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    protected function rules(User $user = null): array
    {
        $uniqueEmailRule = 'unique:users,email';
        if ($user) {
            $uniqueEmailRule .= ',' . $user->id;
        }

        return [
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255|$uniqueEmailRule",
            'password' => 'required|string|min:8',
        ];
    }

    protected function updateRules(User $user): array
    {
        $rules = $this->rules($user);

        return array_map(function ($rule) {
            return str_replace('required|', 'sometimes|required|', $rule);
        }, $rules);
    }

    public function validateAndCreate(array $data)
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $validated = $validator->validated();
        $validated['password'] = bcrypt($validated['password']);

        return User::create($validated);
    }

    public function validateAndUpdate(array $data, User $user)
    {
        $validator = Validator::make($data, $this->updateRules($user));

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $validated = $validator->validated();
        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }

        $user->update($validated);

        return $user;
    }

}
