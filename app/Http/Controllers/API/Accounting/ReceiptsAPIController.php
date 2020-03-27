<?php

namespace App\Http\Controllers\API\Accounting;

use App\Http\Requests\API\Accounting\CreateReceiptsAPIRequest;
use App\Http\Requests\API\Accounting\UpdateReceiptsAPIRequest;
use App\Models\Accounting\Receipts;
use App\Repositories\Accounting\ReceiptsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ReceiptsController
 * @package App\Http\Controllers\API\Accounting
 */

class ReceiptsAPIController extends AppBaseController
{
    /** @var  ReceiptsRepository */
    private $receiptsRepository;

    public function __construct(ReceiptsRepository $receiptsRepo)
    {
        $this->receiptsRepository = $receiptsRepo;
    }

    /**
     * Display a listing of the Receipts.
     * GET|HEAD /receipts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->receiptsRepository->pushCriteria(new RequestCriteria($request));
        $this->receiptsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $receipts = $this->receiptsRepository->all();

        return $this->sendResponse($receipts->toArray(), 'Receipts retrieved successfully');
    }

    /**
     * Store a newly created Receipts in storage.
     * POST /receipts
     *
     * @param CreateReceiptsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateReceiptsAPIRequest $request)
    {
        $input = $request->all();

        $receipts = $this->receiptsRepository->create($input);

        return $this->sendResponse($receipts->toArray(), 'Receipts saved successfully');
    }

    /**
     * Display the specified Receipts.
     * GET|HEAD /receipts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Receipts $receipts */
        $receipts = $this->receiptsRepository->findWithoutFail($id);

        if (empty($receipts)) {
            return $this->sendError('Receipts not found');
        }

        return $this->sendResponse($receipts->toArray(), 'Receipts retrieved successfully');
    }

    /**
     * Update the specified Receipts in storage.
     * PUT/PATCH /receipts/{id}
     *
     * @param  int $id
     * @param UpdateReceiptsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReceiptsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Receipts $receipts */
        $receipts = $this->receiptsRepository->findWithoutFail($id);

        if (empty($receipts)) {
            return $this->sendError('Receipts not found');
        }

        $receipts = $this->receiptsRepository->update($input, $id);

        return $this->sendResponse($receipts->toArray(), 'Receipts updated successfully');
    }

    /**
     * Remove the specified Receipts from storage.
     * DELETE /receipts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Receipts $receipts */
        $receipts = $this->receiptsRepository->findWithoutFail($id);

        if (empty($receipts)) {
            return $this->sendError('Receipts not found');
        }

        $receipts->delete();

        return $this->sendResponse($id, 'Receipts deleted successfully');
    }
}
