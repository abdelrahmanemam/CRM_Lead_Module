<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AttributeInterface;
use App\Models\Attribute;
use Illuminate\Support\Collection;

class AttributeRepository implements AttributeInterface
{
    public function getAttributesWithDetails(): Collection
    {
        return Attribute::with('option')
            ->get()
            ->map(function ($attrs) {
                return
                    [
                        'id' => $attrs->id,
                        'name' => $attrs->name,
                        'type' => $attrs->option->type,
                        'is_fillable' => $attrs->is_fillable,
                        'is_unique' => $attrs->is_unique,
                        'is_mandatory' => $attrs->is_mandatory,
                        'has_value_per_locale' => $attrs->has_value_per_locale,
                    ];
            });
    }

    public function getAttributeWithDetailsById(string $id): Collection
    {
        return Attribute::whereId($id)
            ->with('option')
            ->get()
            ->map(function ($attrs) {
                return
                    [
                        'id' => $attrs->id,
                        'name' => $attrs->name,
                        'type' => $attrs->option->type,
                        'is_fillable' => $attrs->is_fillable,
                        'is_unique' => $attrs->is_unique,
                        'is_mandatory' => $attrs->is_mandatory,
                        'has_value_per_locale' => $attrs->has_value_per_locale,
                    ];
            });
    }

    public function find(int $id): Attribute|null
    {
        return Attribute::whereId($id)
            ->first();
    }

    public function destroy(int $id)
    {
        Attribute::whereId($id)->delete();
    }

    public function create(array $attribute_data): Attribute
    {
        return Attribute::create($attribute_data);
    }

    public function update(array $attribute_data): bool
    {
        $id = $attribute_data['attribute_id'];

        $pre_data = $this->find($id);

        return Attribute::whereId($id)
            ->update([
                'name' => $attribute_data['name'] ?? $pre_data->name,
                'option_id' => $attribute_data['option_id'] ?? $pre_data->option_id,
                'is_fillable' => $attribute_data['is_fillable'] ?? $pre_data->is_fillable,
                'is_unique' => $attribute_data['is_unique'] ?? $pre_data->is_unique,
                'is_mandatory' => $attribute_data['is_mandatory'] ?? $pre_data->is_mandatory,
                'has_value_per_locale' => $attribute_data['has_value_per_locale'] ?? $pre_data->has_value_per_locale,
            ]);
    }
}
