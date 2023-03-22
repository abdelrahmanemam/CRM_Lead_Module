<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadAttribute extends Model
{
    use HasFactory;

    protected $table = 'lead_attributes';
    
    protected $fillable = ['lead_id', 'attribute_id', 'value'];

}
