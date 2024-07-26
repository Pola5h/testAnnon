<?php

namespace App\Services;

use App\Models\Contract;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ContractService
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
            'user_id' => 'required|exists:users,id',
            'organization_id' => 'required|exists:organizations,id',
            'contract_details' => 'required|string',
        ];

        if ($isUpdating) {
            $rules = array_map(fn ($rule) => 'sometimes|'.$rule, $rules);
        }

        return $rules;
    }

    public function validateAndCreate(array $data)
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return Contract::create($validator->validated());
    }

    public function validateAndUpdate(array $data, Contract $contract)
    {
        $validator = Validator::make($data, $this->rules(true));

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $contract->update($validator->validated());

        return $contract;
    }
}
