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

    protected function rules(bool $isUpdating = false): array
    {
        $rules = [
            'name' => 'required|string|max:255',
        ];

        if ($isUpdating) {
            $rules = array_map(fn ($rule) => 'sometimes|'.$rule, $rules);
        }

        return $rules;
    }

    public function validateAndCreate(array $data): Organization
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return Organization::create($validator->validated());
    }

    public function validateAndUpdate(array $data, Organization $organization): Organization
    {
        $validator = Validator::make($data, $this->rules(true));

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $organization->update($validator->validated());

        return $organization;
    }
}
