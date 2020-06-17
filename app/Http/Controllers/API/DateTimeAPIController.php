<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDateTimeAPIRequest;
use App\Http\Requests\API\UpdateDateTimeAPIRequest;
use App\Models\DateTime;
use App\Repositories\DateTimeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DateTimeController
 * @package App\Http\Controllers\API
 */

class DateTimeAPIController extends AppBaseController
{
    /** @var  DateTimeRepository */
    private $dateTimeRepository;

    public function __construct(DateTimeRepository $dateTimeRepo)
    {
        $this->dateTimeRepository = $dateTimeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/dateTimes",
     *      summary="Get a listing of the DateTimes.",
     *      tags={"DateTime"},
     *      description="Get all DateTimes",
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
     *                  @SWG\Items(ref="#/definitions/DateTime")
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
        $dateTimes = $this->dateTimeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $dateTimes->toArray(),
            __('messages.retrieved', ['model' => __('models/date_times.plural')])
        );
    }

    /**
     * @param CreateDateTimeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/dateTimes",
     *      summary="Store a newly created DateTime in storage",
     *      tags={"DateTime"},
     *      description="Store DateTime",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="DateTime that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/DateTime")
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
     *                  ref="#/definitions/DateTime"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateDateTimeAPIRequest $request)
    {
        $input = $request->all();

        $dateTime = $this->dateTimeRepository->create($input);

        return $this->sendResponse(
            $dateTime->toArray(),
            __('messages.saved', ['model' => __('models/date_times.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/dateTimes/{id}",
     *      summary="Display the specified DateTime",
     *      tags={"DateTime"},
     *      description="Get DateTime",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DateTime",
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
     *                  ref="#/definitions/DateTime"
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
        /** @var DateTime $dateTime */
        $dateTime = $this->dateTimeRepository->find($id);

        if (empty($dateTime)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/date_times.singular')])
            );
        }

        return $this->sendResponse(
            $dateTime->toArray(),
            __('messages.retrieved', ['model' => __('models/date_times.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateDateTimeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/dateTimes/{id}",
     *      summary="Update the specified DateTime in storage",
     *      tags={"DateTime"},
     *      description="Update DateTime",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DateTime",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="DateTime that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/DateTime")
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
     *                  ref="#/definitions/DateTime"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateDateTimeAPIRequest $request)
    {
        $input = $request->all();

        /** @var DateTime $dateTime */
        $dateTime = $this->dateTimeRepository->find($id);

        if (empty($dateTime)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/date_times.singular')])
            );
        }

        $dateTime = $this->dateTimeRepository->update($input, $id);

        return $this->sendResponse(
            $dateTime->toArray(),
            __('messages.updated', ['model' => __('models/date_times.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/dateTimes/{id}",
     *      summary="Remove the specified DateTime from storage",
     *      tags={"DateTime"},
     *      description="Delete DateTime",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DateTime",
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
        /** @var DateTime $dateTime */
        $dateTime = $this->dateTimeRepository->find($id);

        if (empty($dateTime)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/date_times.singular')])
            );
        }

        $dateTime->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/date_times.singular')])
        );
    }
}
