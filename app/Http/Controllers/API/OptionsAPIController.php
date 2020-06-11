<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOptionsAPIRequest;
use App\Http\Requests\API\UpdateOptionsAPIRequest;
use App\Models\Options;
use App\Repositories\OptionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OptionsController
 * @package App\Http\Controllers\API
 */

class OptionsAPIController extends AppBaseController
{
    /** @var  OptionsRepository */
    private $optionsRepository;

    public function __construct(OptionsRepository $optionsRepo)
    {
        $this->optionsRepository = $optionsRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/options",
     *      summary="Get a listing of the Options.",
     *      tags={"Options"},
     *      description="Get all Options",
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
     *                  @SWG\Items(ref="#/definitions/Options")
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
        $options = $this->optionsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $options->toArray(),
            __('messages.retrieved', ['model' => __('models/options.plural')])
        );
    }

    /**
     * @param CreateOptionsAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/options",
     *      summary="Store a newly created Options in storage",
     *      tags={"Options"},
     *      description="Store Options",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Options that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Options")
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
     *                  ref="#/definitions/Options"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateOptionsAPIRequest $request)
    {
        $input = $request->all();

        $options = $this->optionsRepository->create($input);

        return $this->sendResponse(
            $options->toArray(),
            __('messages.saved', ['model' => __('models/options.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/options/{id}",
     *      summary="Display the specified Options",
     *      tags={"Options"},
     *      description="Get Options",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Options",
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
     *                  ref="#/definitions/Options"
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
        /** @var Options $options */
        $options = $this->optionsRepository->find($id);

        if (empty($options)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/options.singular')])
            );
        }

        return $this->sendResponse(
            $options->toArray(),
            __('messages.retrieved', ['model' => __('models/options.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateOptionsAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/options/{id}",
     *      summary="Update the specified Options in storage",
     *      tags={"Options"},
     *      description="Update Options",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Options",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Options that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Options")
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
     *                  ref="#/definitions/Options"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateOptionsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Options $options */
        $options = $this->optionsRepository->find($id);

        if (empty($options)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/options.singular')])
            );
        }

        $options = $this->optionsRepository->update($input, $id);

        return $this->sendResponse(
            $options->toArray(),
            __('messages.updated', ['model' => __('models/options.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/options/{id}",
     *      summary="Remove the specified Options from storage",
     *      tags={"Options"},
     *      description="Delete Options",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Options",
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
        /** @var Options $options */
        $options = $this->optionsRepository->find($id);

        if (empty($options)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/options.singular')])
            );
        }

        $options->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/options.singular')])
        );
    }
}
