<?php

namespace App\Http\Controllers;

use App\DataTables\VatDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVatRequest;
use App\Http\Requests\UpdateVatRequest;
use App\Repositories\VatRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VatController extends AppBaseController
{
    /** @var  VatRepository */
    private $vatRepository;

    public function __construct(VatRepository $vatRepo)
    {
        $this->vatRepository = $vatRepo;
    }

    /**
     * Display a listing of the Vat.
     *
     * @param VatDataTable $vatDataTable
     * @return Response
     */
    public function index(VatDataTable $vatDataTable)
    {
        $page_title = __('models/vats.plural');

        return $vatDataTable->render('vats.index',compact('page_title'));
    }

    /**
     * Show the form for creating a new Vat.
     *
     * @return Response
     */
    public function create()
    {
        $page_title = __('models/vats.plural');
        $page_description = __('crud.add_new');
        return view('vats.create',compact('page_title','page_description'));
    }

    /**
     * Store a newly created Vat in storage.
     *
     * @param CreateVatRequest $request
     *
     * @return Response
     */
    public function store(CreateVatRequest $request)
    {
        $input = $request->all();

        $vat = $this->vatRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/vats.singular')]));

        return redirect(route('vats.index'));
    }

    /**
     * Display the specified Vat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vat = $this->vatRepository->find($id);

        if (empty($vat)) {
            Flash::error(__('models/vats.singular').' '.__('messages.not_found'));

            return redirect(route('vats.index'));
        }
        $page_title = __('models/vats.singular');
        $page_description = __('crud.detail');
        return view('vats.show',compact('page_title','page_description'))->with('vat', $vat);
    }

    /**
     * Show the form for editing the specified Vat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vat = $this->vatRepository->find($id);

        if (empty($vat)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vats.singular')]));

            return redirect(route('vats.index'));
        }
        $page_title = __('models/vats.singular');
        $page_description = __('crud.edit');
        return view('vats.edit',compact('page_title','page_description'))->with('vat', $vat);
    }

    /**
     * Update the specified Vat in storage.
     *
     * @param  int              $id
     * @param UpdateVatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVatRequest $request)
    {
        $vat = $this->vatRepository->find($id);

        if (empty($vat)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vats.singular')]));

            return redirect(route('vats.index'));
        }

        $vat = $this->vatRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/vats.singular')]));

        return redirect(route('vats.index'));
    }

    /**
     * Remove the specified Vat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vat = $this->vatRepository->find($id);

        if (empty($vat)) {
            Flash::error(__('messages.not_found', ['model' => __('models/vats.singular')]));

            return redirect(route('vats.index'));
        }

        $this->vatRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/vats.singular')]));

        return redirect(route('vats.index'));
    }
}
