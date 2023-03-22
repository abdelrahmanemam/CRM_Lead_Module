<?php

namespace App\Http\Interfaces;

use App\Models\Lead;
use Illuminate\Support\Collection;

interface LeadInterface
{
    public function createNewLead(): Lead;

    public function destroy(int $id): void;

    public function restore(int $id): int;

    public function forceDelete(int $id): void;

    public function find(int $id): Lead|null;

    public function findSoftDelete(int $id): Lead|null;

    public function updateDeletedBy(int $lead_id, int $user_id): void;

    public function getLeadAttribute(int $id): Collection|null;
}
