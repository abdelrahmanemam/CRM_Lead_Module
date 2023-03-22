<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\LeadAttributeInterface;
use App\Http\Interfaces\LeadInterface;
use App\Http\Services\LeadService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LeadController extends Controller
{
    private LeadInterface $leadInterface;
    private LeadAttributeInterface $leadAttributeInterface;

    public function __construct(LeadInterface $leadInterface, LeadAttributeInterface $leadAttributeInterface)
    {
        $this->leadInterface = $leadInterface;
        $this->leadAttributeInterface = $leadAttributeInterface;
    }

    public function findById($id): bool
    {
        if (!$id)
            return false;

        return (bool)$this->leadInterface->find((int)$id);
    }

    public function findSoftDeletedById($id): bool
    {
        if (!$id)
            return false;

        return (bool)$this->leadInterface->findSoftDelete((int)$id);
    }

    public function create(Request $request): Response
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => Rule::in(['male', 'female']),
        ]);

        if ($validator->fails())
            return response($validator->errors(), ResponseAlias::HTTP_FORBIDDEN);


        $request['full_name'] = LeadService::createFullName(first_name: $request['first_name'], last_name: $request['last_name']);

        $lead = $this->leadInterface->createNewLead();
        $this->leadAttributeInterface->createLeadAttribute($request->toArray(), (int)$lead->id);

        $lead_attribute = $this->leadInterface->getLeadAttribute((int)$lead->id);

        return response(['Lead' => $lead_attribute], ResponseAlias::HTTP_CREATED);

    }

    public function destroy(Request $request): Response
    {
        if (!$this->findById($request->id))
            return response("Lead doesn't exist", ResponseAlias::HTTP_FORBIDDEN);

        $lead_id = (int)$request->id;

        $this->leadInterface->destroy($lead_id);
        $this->leadInterface->updateDeletedBy($lead_id, auth()->id());

        return response("Lead is soft deleted", ResponseAlias::HTTP_OK);
    }

    public function restore(Request $request): Response
    {
        if (!($this->findSoftDeletedById($request->id)))
            return response("Lead doesn't exist", ResponseAlias::HTTP_FORBIDDEN);

        $lead_id = (int)$request->id;

        $this->leadInterface->restore($lead_id);
        $this->leadInterface->updateDeletedBy($lead_id, 0);

        return response("Lead is restored", ResponseAlias::HTTP_OK);
    }

    public function forceDelete(Request $request): Response
    {
        if (!$this->findSoftDeletedById($request->id))
            return response("Lead doesn't exist", ResponseAlias::HTTP_FORBIDDEN);

        $this->leadInterface->forceDelete((int)$request->id);
        return response("Lead is permanently deleted", ResponseAlias::HTTP_OK);

    }
}
