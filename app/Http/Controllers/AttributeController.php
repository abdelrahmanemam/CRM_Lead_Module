<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AttributeInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AttributeController extends Controller
{

    private AttributeInterface $AttributeInterface;

    public function __construct(AttributeInterface $AttributeInterface)
    {
        $this->AttributeInterface = $AttributeInterface;
    }


    public function index(): Response
    {
        $attributes = $this->AttributeInterface->getAttributesWithDetails();

        return response(['Attributes' => $attributes], ResponseAlias::HTTP_OK);
    }


    public function create(Request $request): Response
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'option_id' => Rule::in(['1', '2', '3', '4'])
        ]);

        if ($validator->fails())
            return response($validator->errors(), ResponseAlias::HTTP_FORBIDDEN);


        $attribute = $this->AttributeInterface->create($request->toArray());

        return response(['Attribute' => $attribute], ResponseAlias::HTTP_CREATED);
    }


    public function show(string $id): Response
    {
        $attribute = $this->AttributeInterface->getAttributeWithDetailsById($id);

        if (!isset($attribute))
            return response('Attribute is not found', ResponseAlias::HTTP_NOT_FOUND);

        return response(['Attribute' => $attribute], ResponseAlias::HTTP_OK);
    }


    public function update(Request $request): Response
    {
        $validator = Validator::make($request->all(), [
            'attribute_id' => 'required',
            'option_id' => Rule::in(['1', '2', '3', '4'])
        ]);

        if ($validator->fails())
            return response($validator->errors(), ResponseAlias::HTTP_FORBIDDEN);

        $id = $request->attribute_id;

        if (!$this->findById($id))
            return response("Attribute doesn't exist", ResponseAlias::HTTP_FORBIDDEN);

        if (!$this->AttributeInterface->update($request->toArray()))
            return response("Update failed", ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);

        return $this->show($id);
    }


    public function destroy(Request $request): Response
    {
        if (!$this->findById($request->id))
            return response("Attribute doesn't exist", ResponseAlias::HTTP_FORBIDDEN);

        $this->AttributeInterface->destroy($request->id);

        return response("Attribute is deleted", ResponseAlias::HTTP_OK);
    }

    protected function findById($id): bool
    {
        if (!$id)
            return false;

        return (bool)$this->AttributeInterface->find((int)$id);
    }
}
