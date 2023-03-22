<?php

namespace App\Http\Interfaces;

use App\Models\Attribute;
use Illuminate\Support\Collection;

interface AttributeInterface
{
    public function getAttributesWithDetails(): Collection;

    public function getAttributeWithDetailsById(string $id): Collection;

    public function find(int $id): Attribute|null;

    public function destroy(int $id);

    public function create(array $attribute_data): Attribute;

    public function update(array $attribute_data): bool;
}
