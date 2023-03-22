<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'option_id', 'is_fillable', 'is_unique', 'is_mandatory', 'has_value_per_locale'];

    public function option(): BelongsTo
    {
        return $this->belongsTo(Option::class);
    }
}
