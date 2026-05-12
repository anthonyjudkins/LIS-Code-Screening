<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['title', 'text'])]
class Legislation extends Model
{
    use HasFactory;
    
    public function legislators(): BelongsToMany
    {
        return $this->belongsToMany(Legislator::class, 'legislation_legislator');
    }
}
