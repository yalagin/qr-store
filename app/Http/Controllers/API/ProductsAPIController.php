<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProductsAPIRequest;
use App\Http\Requests\API\UpdateProductsAPIRequest;
use App\Models\Products;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProductsController
 * @package App\Http\Controllers\API
 */

class ProductsAPIController extends AppBaseController
{
    /** @var  ProductsRepository */
    private $productsRepository;

    public function __construct(ProductsRepository $productsRepo)
    {
        $this->productsRepository = $productsRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/products",
     *      summary="Get a listing of the Products.",
     *      tags={"Products"},
     *      description="Get all Products",
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
     *                  @SWG\Items(ref="#/definitions/Products")
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
        $products = $this->productsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $products->toArray(),
            __('messages.retrieved', ['model' => __('models/products.plural')])
        );
    }

    /**
     * @param CreateProductsAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/products",
     *      summary="Store a newly created Products in storage",
     *      tags={"Products"},
     *      description="Store Products",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Products that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Products")
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
     *                  ref="#/definitions/Products"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateProductsAPIRequest $request)
    {
        $input = $request->all();

        $products = $this->productsRepository->create($input);

        return $this->sendResponse(
            $products->toArray(),
            __('messages.saved', ['model' => __('models/products.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/products/{id}",
     *      summary="Display the specified Products",
     *      tags={"Products"},
     *      description="Get Products",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Products",
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
     *                  ref="#/definitions/Products"
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
        /** @var Products $products */
        $products = $this->productsRepository->find($id);

        if (empty($products)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/products.singular')])
            );
        }

        return $this->sendResponse(
            $products->toArray(),
            __('messages.retrieved', ['model' => __('models/products.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateProductsAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/products/{id}",
     *      summary="Update the specified Products in storage",
     *      tags={"Products"},
     *      description="Update Products",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Products",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Products that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Products")
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
     *                  ref="#/definitions/Products"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateProductsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Products $products */
        $products = $this->productsRepository->find($id);

        if (empty($products)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/products.singular')])
            );
        }

        $products = $this->productsRepository->update($input, $id);

        return $this->sendResponse(
            $products->toArray(),
            __('messages.updated', ['model' => __('models/products.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/products/{id}",
     *      summary="Remove the specified Products from storage",
     *      tags={"Products"},
     *      description="Delete Products",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Products",
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
        /** @var Products $products */
        $products = $this->productsRepository->find($id);

        if (empty($products)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/products.singular')])
            );
        }

        $products->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/products.singular')])
        );
    }
}
