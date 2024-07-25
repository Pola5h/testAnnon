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

    public function validateAndCreate(array $data)
    {
        $validator = Validator::make($data, [
            'user_id' => 'required|exists:users,id',
            'organization_id' => 'required|exists:organizations,id',
            'contract_details' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return Contract::create($validator->validated());
    }

    public function validateAndUpdate(array $data, Contract $contract)
    {
        $validator = Validator::make($data, [
            'user_id' => 'sometimes|required|exists:users,id',
            'organization_id' => 'sometimes|required|exists:organizations,id',
            'contract_details' => 'sometimes|required|string',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $contract->update($validator->validated());

        return $contract;
    }
}
