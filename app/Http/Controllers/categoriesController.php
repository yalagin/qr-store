<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecategoriesRequest;
use App\Http\Requests\UpdatecategoriesRequest;
use App\Models\image;
use App\Repositories\categoriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class categoriesController extends AppBaseController
{
    /** @var  categoriesRepository */
    private $categoriesRepository;

    public function __construct(categoriesRepository $categoriesRepo)
    {
        $this->categoriesRepository = $categoriesRepo;
    }

    /**
     * Display a listing of the categories.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $categories = $this->categoriesRepository->all();
        $page_title = 'Categories';
        $page_description = 'listing';
        return view('categories.index',compact('page_title', 'page_description'))
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new categories.
     *
     * @return Response
     */
    public function create()
    {
        $page_title = 'Categories';
        $page_description = 'creating';
        return view('categories.create',compact('page_title', 'page_description'));
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
        $categories = $this->categoriesRepository->createWithImages($input);

        Flash::success('Categories saved successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified categories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categories = $this->categoriesRepository->find($id);

        if (empty($categories)) {
            Flash::error('Categories not found');

            return redirect(route('categories.index'));
        }

        $page_title = 'Categories';
        $page_description = 'Display the specified categories.';
        return view('categories.show',compact('page_title', 'page_description'))->with('categories', $categories);
    }

    /**
     * Show the form for editing the specified categories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categories = $this->categoriesRepository->find($id);

        if (empty($categories)) {
            Flash::error('Categories not found');

            return redirect(route('categories.index'));
        }

        $page_title = 'Categories';
        $page_description = 'Edit the specified categories.';
        return view('categories.edit',compact('page_title', 'page_description'))->with('categories', $categories);
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
            Flash::error('Categories not found');

            return redirect(route('categories.index'));
        }

        $categories = $this->categoriesRepository->update($request->all(), $id);

        Flash::success('Categories updated successfully.');

        return redirect(route('categories.index'));
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
            Flash::error('Categories not found');

            return redirect(route('categories.index'));
        }

        $this->categoriesRepository->delete($id);

        Flash::success('Categories deleted successfully.');

        return redirect(route('categories.index'));
    }
}
