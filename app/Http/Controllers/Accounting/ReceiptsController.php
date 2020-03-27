<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\ReceiptsDataTable;
use App\Http\Requests\Accounting;
use App\Http\Requests\Accounting\CreateReceiptsRequest;
use App\Http\Requests\Accounting\UpdateReceiptsRequest;
use App\Repositories\Accounting\ReceiptsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ReceiptsController extends AppBaseController
{
    /** @var  ReceiptsRepository */
    private $receiptsRepository;

    public function __construct(ReceiptsRepository $receiptsRepo)
    {
        $this->receiptsRepository = $receiptsRepo;
    }

    /**
     * Display a listing of the Receipts.
     *
     * @param ReceiptsDataTable $receiptsDataTable
     * @return Response
     */
    public function index(ReceiptsDataTable $receiptsDataTable)
    {
        return $receiptsDataTable->render('accounting.receipts.index');
    }

    /**
     * Show the form for creating a new Receipts.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.receipts.create');
    }

    /**
     * Store a newly created Receipts in storage.
     *
     * @param CreateReceiptsRequest $request
     *
     * @return Response
     */
    public function store(CreateReceiptsRequest $request)
    {
        $input = $request->all();

        $receipts = $this->receiptsRepository->create($input);

        Flash::success('Recibo almacenado con éxito.');

        return redirect(route('accounting.receipts.index'));
    }

    /**
     * Display the specified Receipts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $receipts = $this->receiptsRepository->findWithoutFail($id);

        if (empty($receipts)) {
            Flash::error('Recibo no encontrado');

            return redirect(route('accounting.receipts.index'));
        }

        return view('accounting.receipts.show')->with('receipts', $receipts);
    }

    /**
     * Show the form for editing the specified Receipts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $receipts = $this->receiptsRepository->findWithoutFail($id);

        if (empty($receipts)) {
            Flash::error('Recibo no encontrado');

            return redirect(route('accounting.receipts.index'));
        }

        return view('accounting.receipts.edit')->with('receipts', $receipts);
    }

    /**
     * Update the specified Receipts in storage.
     *
     * @param  int              $id
     * @param UpdateReceiptsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReceiptsRequest $request)
    {
        $receipts = $this->receiptsRepository->findWithoutFail($id);

        if (empty($receipts)) {
            Flash::error('Recibo no encontrado');

            return redirect(route('accounting.receipts.index'));
        }

        $receipts = $this->receiptsRepository->update($request->all(), $id);

        Flash::success('Recibo actualizado con éxito.');

        return redirect(route('accounting.receipts.index'));
    }

    /**
     * Remove the specified Receipts from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $receipts = $this->receiptsRepository->findWithoutFail($id);

        if (empty($receipts)) {
            Flash::error('Recibo no encontrado');

            return redirect(route('accounting.receipts.index'));
        }

        $this->receiptsRepository->delete($id);

        Flash::success('Recibo eliminado con éxito.');

        return redirect(route('accounting.receipts.index'));
    }
}
