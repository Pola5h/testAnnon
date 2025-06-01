<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }

    public function employeeTree(): array
    {
        $tree = [];
        $contracts = $this->contracts()->whereNull('reporting_manager_id')->get();

        foreach ($contracts as $contract) {
            $tree[] = $this->buildTree($contract);
        }

        return $tree;
    }

    protected function buildTree(Contract $contract): array
    {
        $subTree = [
            'user' => $contract->user,
            'subordinates' => [],
        ];

        foreach ($contract->subordinates as $subordinate) {
            $subTree['subordinates'][] = $this->buildTree($subordinate);
        }

        return $subTree;
    }
}
