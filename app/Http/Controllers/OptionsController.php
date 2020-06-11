<?php

namespace App\Http\Controllers;

use App\DataTables\OptionsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOptionsRequest;
use App\Http\Requests\UpdateOptionsRequest;
use App\Repositories\OptionsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OptionsController extends AppBaseController
{
    /** @var  OptionsRepository */
    private $optionsRepository;

    public function __construct(OptionsRepository $optionsRepo)
    {
        $this->optionsRepository = $optionsRepo;
    }

    /**
     * Display a listing of the Options.
     *
     * @param OptionsDataTable $optionsDataTable
     * @return Response
     */
    public function index(OptionsDataTable $optionsDataTable)
    {
        $page_title = __('models/options.plural');

        return $optionsDataTable->render('options.index',compact('page_title'));
    }

    /**
     * Show the form for creating a new Options.
     *
     * @return Response
     */
    public function create()
    {
        $page_title = __('models/options.singular');
        $page_description = __('crud.add_new');
        return view('options.create',compact('page_title','page_description'));
    }

    /**
     * Store a newly created Options in storage.
     *
     * @param CreateOptionsRequest $request
     *
     * @return Response
     */
    public function store(CreateOptionsRequest $request)
    {
        $input = $request->all();

        $options = $this->optionsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/options.singular')]));

        return redirect(route('options.index'));
    }

    /**
     * Display the specified Options.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $options = $this->optionsRepository->find($id);

        if (empty($options)) {
            Flash::error(__('models/options.singular').' '.__('messages.not_found'));

            return redirect(route('options.index'));
        }
        $page_title = __('models/options.singular');
        $page_description = __('crud.detail');
        return view('options.show',compact('page_title','page_description'))->with('options', $options);
    }

    /**
     * Show the form for editing the specified Options.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $options = $this->optionsRepository->find($id);

        if (empty($options)) {
            Flash::error(__('messages.not_found', ['model' => __('models/options.singular')]));

            return redirect(route('options.index'));
        }
        $page_title = __('models/options.singular');
        $page_description = __('crud.edit');
        return view('options.edit',compact('page_title','page_description'))->with('options', $options);
    }

    /**
     * Update the specified Options in storage.
     *
     * @param  int              $id
     * @param UpdateOptionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOptionsRequest $request)
    {
        $options = $this->optionsRepository->find($id);

        if (empty($options)) {
            Flash::error(__('messages.not_found', ['model' => __('models/options.singular')]));

            return redirect(route('options.index'));
        }

        $options = $this->optionsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/options.singular')]));

        return redirect(route('options.index'));
    }

    /**
     * Remove the specified Options from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $options = $this->optionsRepository->find($id);

        if (empty($options)) {
            Flash::error(__('messages.not_found', ['model' => __('models/options.singular')]));

            return redirect(route('options.index'));
        }

        $this->optionsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/options.singular')]));

        return redirect(route('options.index'));
    }
}
