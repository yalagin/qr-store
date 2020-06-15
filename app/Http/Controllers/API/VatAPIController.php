<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVatAPIRequest;
use App\Http\Requests\API\UpdateVatAPIRequest;
use App\Models\Vat;
use App\Repositories\VatRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class VatController
 * @package App\Http\Controllers\API
 */

class VatAPIController extends AppBaseController
{
    /** @var  VatRepository */
    private $vatRepository;

    public function __construct(VatRepository $vatRepo)
    {
        $this->vatRepository = $vatRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/vats",
     *      summary="Get a listing of the Vats.",
     *      tags={"Vat"},
     *      description="Get all Vats",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Vat")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $vats = $this->vatRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $vats->toArray(),
            __('messages.retrieved', ['model' => __('models/vats.plural')])
        );
    }

    /**
     * @param CreateVatAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/vats",
     *      summary="Store a newly created Vat in storage",
     *      tags={"Vat"},
     *      description="Store Vat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Vat that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Vat")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Vat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateVatAPIRequest $request)
    {
        $input = $request->all();

        $vat = $this->vatRepository->create($input);

        return $this->sendResponse(
            $vat->toArray(),
            __('messages.saved', ['model' => __('models/vats.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/vats/{id}",
     *      summary="Display the specified Vat",
     *      tags={"Vat"},
     *      description="Get Vat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Vat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Vat $vat */
        $vat = $this->vatRepository->find($id);

        if (empty($vat)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/vats.singular')])
            );
        }

        return $this->sendResponse(
            $vat->toArray(),
            __('messages.retrieved', ['model' => __('models/vats.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateVatAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/vats/{id}",
     *      summary="Update the specified Vat in storage",
     *      tags={"Vat"},
     *      description="Update Vat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Vat that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Vat")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Vat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateVatAPIRequest $request)
    {
        $input = $request->all();

        /** @var Vat $vat */
        $vat = $this->vatRepository->find($id);

        if (empty($vat)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/vats.singular')])
            );
        }

        $vat = $this->vatRepository->update($input, $id);

        return $this->sendResponse(
            $vat->toArray(),
            __('messages.updated', ['model' => __('models/vats.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/vats/{id}",
     *      summary="Remove the specified Vat from storage",
     *      tags={"Vat"},
     *      description="Delete Vat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Vat $vat */
        $vat = $this->vatRepository->find($id);

        if (empty($vat)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/vats.singular')])
            );
        }

        $vat->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/vats.singular')])
        );
    }
}
