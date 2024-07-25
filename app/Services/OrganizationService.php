<?php

namespace App\Services;

use App\Models\Organization;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class OrganizationService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function validateAndCreate(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return Organization::create($validator->validated());
    }

    public function validateAndUpdate(array $data, Organization $organization)
    {
        $validator = Validator::make($data, [
            'name' => 'sometimes|required|string|max:255',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $organization->update($validator->validated());

        return $organization;
    }
}
