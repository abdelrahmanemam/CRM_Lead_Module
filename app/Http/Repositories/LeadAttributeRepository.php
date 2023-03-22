<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\LeadAttributeInterface;
use App\Models\Attribute;
use App\Models\LeadAttribute;

class LeadAttributeRepository implements LeadAttributeInterface
{
    public function createLeadAttribute($attributes, $lead_id): void
    {
        foreach ($attributes as $key => $value) {
            LeadAttribute::create([
                'lead_id' => $lead_id,
                'attribute_id' => $this->getAttributeIdByName($key),
                'value' => $value
            ]);
        }
    }

    private function getAttributeIdByName(string $key): int
    {

        return
            Attribute::where('name', 'like', '%' . $key . '%')
                ->first()
                ->id;
    }
}
