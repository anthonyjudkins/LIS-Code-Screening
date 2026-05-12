<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['first_name', 'last_name', 'hometown'])]
class Legislator extends Model
{
    use HasFactory;
    
    public function legislations(): BelongsToMany
    {
        return $this->belongsToMany(Legislation::class, 'legislation_legislator');
    }
}
