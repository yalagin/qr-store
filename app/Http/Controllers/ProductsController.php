<?php

namespace App\Http\Controllers;

use App\DataTables\ProductsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Products;
use App\Repositories\ProductsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProductsController extends AppBaseController
{
    /** @var  ProductsRepository */
    private $productsRepository;

    public function __construct(ProductsRepository $productsRepo)
    {
        $this->productsRepository = $productsRepo;
    }

    /**
     * Display a listing of the Products.
     *
     * @param ProductsDataTable $productsDataTable
     * @return Response
     */
    public function index(ProductsDataTable $productsDataTable)
    {
        $page_title = __('models/products.plural');

        return $productsDataTable->render('products.index',compact('page_title'));
    }

    /**
     * Show the form for creating a new Products.
     *
     * @return Response
     */
    public function create()
    {
        $page_title = __('models/products.plural');
        $page_description = __('crud.add_new');
        return view('products.create',compact('page_title','page_description'));
    }

    /**
     * Store a newly created Products in storage.
     *
     * @param CreateProductsRequest $request
     *
     * @return Response
     */
    public function store(CreateProductsRequest $request)
    {
        $input = $request->all();

        $products = $this->productsRepository->createWithImages($input);

        Flash::success(__('messages.saved', ['model' => __('models/products.singular')]));

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Products.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $products = $this->productsRepository->find($id);

        if (empty($products)) {
            Flash::error(__('models/products.singular').' '.__('messages.not_found'));

            return redirect(route('products.index'));
        }
        $page_title = __('models/products.singular');
        $page_description = __('crud.detail');
        return view('products.show',compact('page_title','page_description'))->with('products', $products);
    }

    /**
     * Show the form for editing the specified Products.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $products = Products::with('images')->find($id);

        if (empty($products)) {
            Flash::error(__('messages.not_found', ['model' => __('models/products.singular')]));

            return redirect(route('products.index'));
        }
        $page_title = __('models/products.singular');
        $page_description = __('crud.edit');
        return view('products.edit',compact('page_title','page_description'))->with('products', $products);
    }

    /**
     * Update the specified Products in storage.
     *
     * @param  int              $id
     * @param UpdateProductsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductsRequest $request)
    {
        $products = $this->productsRepository->find($id);

        if (empty($products)) {
            Flash::error(__('messages.not_found', ['model' => __('models/products.singular')]));

            return redirect(route('products.index'));
        }

        $products = $this->productsRepository->updateWithImages($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/products.singular')]));

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Products from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $products = $this->productsRepository->find($id);

        if (empty($products)) {
            Flash::error(__('messages.not_found', ['model' => __('models/products.singular')]));

            return redirect(route('products.index'));
        }

        $this->productsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/products.singular')]));

        return redirect(route('products.index'));
    }
}
