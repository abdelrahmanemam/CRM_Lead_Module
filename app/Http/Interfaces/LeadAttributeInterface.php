<?php

namespace App\Http\Interfaces;

use App\Models\LeadAttribute;
use Illuminate\Http\Request;

interface LeadAttributeInterface
{
    public function createLeadAttribute(array $attributes, int $lead_id): void;
}
