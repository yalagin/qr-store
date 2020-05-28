<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateimageAPIRequest;
use App\Http\Requests\API\UpdateimageAPIRequest;
use App\Models\image;
use App\Repositories\imageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class imageController
 * @package App\Http\Controllers\API
 */

class imageAPIController extends AppBaseController
{
    /** @var  imageRepository */
    private $imageRepository;

    public function __construct(imageRepository $imageRepo)
    {
        $this->imageRepository = $imageRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/images",
     *      summary="Get a listing of the images.",
     *      tags={"image"},
     *      description="Get all images",
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
     *                  @SWG\Items(ref="#/definitions/image")
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
        $images = $this->imageRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($images->toArray(), 'Images retrieved successfully');
    }

    /**
     * @param CreateimageAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/images",
     *      summary="Store a newly created image in storage",
     *      tags={"image"},
     *      description="Store image",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="image that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/image")
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
     *                  ref="#/definitions/image"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateimageAPIRequest $request)
    {
        $input = $request->all();

        $image = $this->imageRepository->create($input);

        return $this->sendResponse($image->toArray(), 'Image saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/images/{id}",
     *      summary="Display the specified image",
     *      tags={"image"},
     *      description="Get image",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of image",
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
     *                  ref="#/definitions/image"
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
        /** @var image $image */
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            return $this->sendError('Image not found');
        }

        return $this->sendResponse($image->toArray(), 'Image retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateimageAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/images/{id}",
     *      summary="Update the specified image in storage",
     *      tags={"image"},
     *      description="Update image",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of image",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="image that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/image")
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
     *                  ref="#/definitions/image"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateimageAPIRequest $request)
    {
        $input = $request->all();

        /** @var image $image */
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            return $this->sendError('Image not found');
        }

        $image = $this->imageRepository->update($input, $id);

        return $this->sendResponse($image->toArray(), 'image updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/images/{id}",
     *      summary="Remove the specified image from storage",
     *      tags={"image"},
     *      description="Delete image",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of image",
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
        /** @var image $image */
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            return $this->sendError('Image not found');
        }

        $image->delete();

        return $this->sendSuccess('Image deleted successfully');
    }
}
