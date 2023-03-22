<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\LeadInterface;
use App\Models\Lead;
use Illuminate\Support\Collection;

class LeadRepository implements LeadInterface
{

    public function createNewLead(): Lead
    {
        return Lead::create();
    }

    public function destroy($id): void
    {
        Lead::where('id', $id)->delete();
    }

    public function restore($id): int
    {
        return Lead::where('id', $id)->withTrashed()->restore();
    }

    public function forceDelete($id): void
    {
        Lead::where('id', $id)->withTrashed()->forceDelete();
    }

    public function find($id): Lead|null
    {
        return Lead::whereId($id)->first();
    }

    public function findSoftDelete(int $id): Lead|null
    {
        return Lead::whereId($id)
            ->whereNotNull('deleted_at')
            ->withTrashed()
            ->first();
    }

    public function updateDeletedBy(int $lead_id, int $user_id): void
    {
        Lead::whereId($lead_id)
            ->withTrashed()
            ->update([
                'deleted_by' => $user_id > 0 ? $user_id : null
            ]);
    }

    public function getLeadAttribute(int $id): Collection|null
    {
        return Lead::whereId($id)
            ->with('attributes')
            ->get()
            ->map(function ($data) {
                $arr = [
                    'id' => $data->id,
                    'created_by' => $data->created_by,
                    'created_at' => $data->created_at
                ];
                foreach ($data->attributes as $attribute)
                    $arr[$attribute->name] = $attribute->pivot->value;

                return $arr;
            });
    }
}
