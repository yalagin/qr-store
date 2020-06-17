<?php

namespace App\Http\Controllers;

use App\DataTables\DateTimeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDateTimeRequest;
use App\Http\Requests\UpdateDateTimeRequest;
use App\Repositories\DateTimeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DateTimeController extends AppBaseController
{
    /** @var  DateTimeRepository */
    private $dateTimeRepository;

    public function __construct(DateTimeRepository $dateTimeRepo)
    {
        $this->dateTimeRepository = $dateTimeRepo;
    }

    /**
     * Display a listing of the DateTime.
     *
     * @param DateTimeDataTable $dateTimeDataTable
     * @return Response
     */
    public function index(DateTimeDataTable $dateTimeDataTable)
    {
        $page_title = __('models/date_times.plural');

        return $dateTimeDataTable->render('date_times.index',compact('page_title'));
    }

    /**
     * Show the form for creating a new DateTime.
     *
     * @return Response
     */
    public function create()
    {
        $page_title = __('models/date_times.plural');
        $page_description = __('crud.add_new');
        return view('date_times.create',compact('page_title','page_description'));
    }

    /**
     * Store a newly created DateTime in storage.
     *
     * @param CreateDateTimeRequest $request
     *
     * @return Response
     */
    public function store(CreateDateTimeRequest $request)
    {
        $input = $request->all();

        $dateTime = $this->dateTimeRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/date_times.singular')]));

        return redirect(route('dateTimes.index'));
    }

    /**
     * Display the specified DateTime.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dateTime = $this->dateTimeRepository->find($id);

        if (empty($dateTime)) {
            Flash::error(__('models/date_times.singular').' '.__('messages.not_found'));

            return redirect(route('dateTimes.index'));
        }
        $page_title = __('models/date_times.singular');
        $page_description = __('crud.detail');
        return view('date_times.show',compact('page_title','page_description'))->with('dateTime', $dateTime);
    }

    /**
     * Show the form for editing the specified DateTime.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dateTime = $this->dateTimeRepository->find($id);

        if (empty($dateTime)) {
            Flash::error(__('messages.not_found', ['model' => __('models/date_times.singular')]));

            return redirect(route('dateTimes.index'));
        }
        $page_title = __('models/date_times.singular');
        $page_description = __('crud.edit');
        return view('date_times.edit',compact('page_title','page_description'))->with('dateTime', $dateTime);
    }

    /**
     * Update the specified DateTime in storage.
     *
     * @param  int              $id
     * @param UpdateDateTimeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDateTimeRequest $request)
    {
        $dateTime = $this->dateTimeRepository->find($id);

        if (empty($dateTime)) {
            Flash::error(__('messages.not_found', ['model' => __('models/date_times.singular')]));

            return redirect(route('dateTimes.index'));
        }

        $dateTime = $this->dateTimeRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/date_times.singular')]));

        return redirect(route('dateTimes.index'));
    }

    /**
     * Remove the specified DateTime from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dateTime = $this->dateTimeRepository->find($id);

        if (empty($dateTime)) {
            Flash::error(__('messages.not_found', ['model' => __('models/date_times.singular')]));

            return redirect(route('dateTimes.index'));
        }

        $this->dateTimeRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/date_times.singular')]));

        return redirect(route('dateTimes.index'));
    }
}
