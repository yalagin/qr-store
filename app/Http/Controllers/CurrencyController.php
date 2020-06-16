<?php

namespace App\Http\Controllers;

use App\DataTables\CurrencyDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Repositories\CurrencyRepository;
use Cknow\Money\Money;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CurrencyController extends AppBaseController
{
    /** @var  CurrencyRepository */
    private $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepo)
    {
        $this->currencyRepository = $currencyRepo;
    }

    /**
     * Display a listing of the Currency.
     *
     * @param CurrencyDataTable $currencyDataTable
     * @return Response
     */
    public function index(CurrencyDataTable $currencyDataTable)
    {
        $page_title = __('models/currencies.plural');

        return $currencyDataTable->render('currencies.index',compact('page_title'));
    }

    /**
     * Show the form for creating a new Currency.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $currencies = Money::getCurrencies();

        $page_title = __('models/currencies.plural');
        $page_description = __('crud.add_new');
        return view('currencies.create',compact('page_title','page_description', 'currencies'));
    }

    /**
     * Store a newly created Currency in storage.
     *
     * @param CreateCurrencyRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreateCurrencyRequest $request)
    {
        $input = $request->all();

        $currency = $this->currencyRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/currencies.singular')]));

        return redirect(route('currencies.index'));
    }

    /**
     * Display the specified Currency.
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function show($id)
    {
        $currency = $this->currencyRepository->find($id);

        if (empty($currency)) {
            Flash::error(__('models/currencies.singular').' '.__('messages.not_found'));

            return redirect(route('currencies.index'));
        }
        $page_title = __('models/currencies.singular');
        $page_description = __('crud.detail');
        return view('currencies.show',compact('page_title','page_description'))->with('currency', $currency);
    }

    /**
     * Show the form for editing the specified Currency.
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $currency = $this->currencyRepository->find($id);

        if (empty($currency)) {
            Flash::error(__('messages.not_found', ['model' => __('models/currencies.singular')]));

            return redirect(route('currencies.index'));
        }
        $currencies = Money::getCurrencies();
        $page_title = __('models/currencies.singular');
        $page_description = __('crud.edit');
        return view('currencies.edit',compact('page_title','page_description'))
            ->with('currency', $currency)
            ->with('currencies', $currencies)
            ;
    }

    /**
     * Update the specified Currency in storage.
     *
     * @param  int              $id
     * @param UpdateCurrencyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCurrencyRequest $request)
    {
        $currency = $this->currencyRepository->find($id);

        if (empty($currency)) {
            Flash::error(__('messages.not_found', ['model' => __('models/currencies.singular')]));

            return redirect(route('currencies.index'));
        }

        $currency = $this->currencyRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/currencies.singular')]));

        return redirect(route('currencies.index'));
    }

    /**
     * Remove the specified Currency from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $currency = $this->currencyRepository->find($id);

        if (empty($currency)) {
            Flash::error(__('messages.not_found', ['model' => __('models/currencies.singular')]));

            return redirect(route('currencies.index'));
        }

        $this->currencyRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/currencies.singular')]));

        return redirect(route('currencies.index'));
    }
}
