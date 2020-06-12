<?php

namespace App\Http\Controllers;

use App\DataTables\categoriesDataTable;
use App\DataTables\ProductsDataTable;
use App\DataTables\ProductsDependentOncategoriesDataTable;
use App\Http\Requests\CreatecategoriesRequest;
use App\Http\Requests\UpdatecategoriesRequest;
use App\Models\categories;
use App\Models\image;
use App\Models\Products;
use App\Repositories\categoriesRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;
use Flash;
use Response;

class categoriesController extends AppBaseController
{
    /** @var  categoriesRepository */
    private $categoriesRepository;
    /**
     * @var ProductsRepository
     */
    private $productsRepository;

    public function __construct(categoriesRepository $categoriesRepo, ProductsRepository $productsRepository)
    {
        $this->categoriesRepository = $categoriesRepo;
        $this->productsRepository = $productsRepository;
    }

    /**
     * Display a listing of the categories.
     *
     * @param categoriesDataTable $categoriesDataTable
     * @return Response
     */
    public function index(categoriesDataTable $categoriesDataTable)
    {
//        $categories = categories::with('images')->get();
        $page_title = __('models/categories.plural');

        return $categoriesDataTable->render('categories.index',compact('page_title'));
    }

    /**
     * Show the form for creating a new categories.
     *
     * @return Response
     */
    public function create()
    {
        $products =/* Products::where('main_product', 1)->get()*/[];

        $page_title = __('models/categories.plural');
        $page_description = __('crud.add_new');
        return view('categories.create',compact('page_title', 'page_description'))
            ->with('products', $products);
    }

    /**
     * Store a newly created categories in storage.
     *
     * @param CreatecategoriesRequest $request
     *
     * @return Response
     */
    public function store(CreatecategoriesRequest $request)
    {
        $input = $request->all();
        $categories = $this->categoriesRepository->createWithImagesAndProducts($input);

        Flash::success(__('messages.saved', ['model' => __('models/categories.singular')]));

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified categories.
     *
     * @param int $id
     *
     * @param ProductsDataTable $productsDataTable
     * @return Response
     */
    public function show($id,ProductsDependentOncategoriesDataTable $productsDataTable)
    {
        $categories = categories::with(['images', 'products'])->find($id);

        if (empty($categories)) {
            Flash::error(__('models/categories.singular').' '.__('messages.not_found'));

            return redirect(route('categories.index'));
        }

        $productsDataTable->setCategoryId($id);

        $page_title = __('models/categories.singular');
        $page_description = __('crud.detail');
        return $productsDataTable->render('categories.show',compact('page_title','page_description','categories'));
    }

    /**
     * Show the form for editing the specified categories.
     *
     * @param  int $id
     *
     */
    public function edit($id)
    {
        $categories = categories::with(['images', 'products'])->find($id);
        if (empty($categories)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categories.singular')]));

            return redirect(route('categories.index'));
        }
        $products =/* Products::where('main_product', 1)->get()*/[];
        $page_title = __('models/categories.singular');
        $page_description = __('crud.edit');
        return view('categories.edit',compact('page_title','page_description'))
            ->with('categories', $categories)
            ->with('products', $products);
    }

    /**
     * Update the specified categories in storage.
     *
     * @param int $id
     * @param UpdatecategoriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecategoriesRequest $request)
    {
        $categories = $this->categoriesRepository->find($id);

        if (empty($categories)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categories.singular')]));

            return redirect(route('categories.index'));
        }

        $categories = $this->categoriesRepository->updateWithImagesAndProducts($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/categories.singular')]));

        return redirect(route('categories.index'));
//        return redirect(route('categories.show',[$id]));
    }

    /**
     * Remove the specified categories from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categories = $this->categoriesRepository->find($id);

        if (empty($categories)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categories.singular')]));

            return redirect(route('categories.index'));
        }

        $this->categoriesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/categories.singular')]));

        return redirect(route('categories.index'));
    }
}
