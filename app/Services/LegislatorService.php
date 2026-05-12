<?php

namespace App\Services;

use App\Models\Legislator;
use Illuminate\Support\Collection;

class LegislatorService
{
    /**
     * Retrieve all legislators with their sponsored legislations.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allWithLegislations(): Collection
    {
        return Legislator::with('legislations')->get();
    }

    /**
     * Retrieve all legislators only (no relations).
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(): Collection
    {
        return Legislator::all();
    }

    /**
     * Create a new legislator.
     *
     * @param array $data
     * @return Legislator
     */
    public function create(array $data): Legislator
    {
        return Legislator::create($data);
    }
}
