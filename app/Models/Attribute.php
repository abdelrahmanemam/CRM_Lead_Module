<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['option_id', 'first_name', 'last_name', 'full_name', 'description', 'address', 'gender'];

    public function leads(): BelongsToMany
    {
        return $this->belongsToMany(Lead::class, 'lead_attributes')->withPivot('value');
    }
}
