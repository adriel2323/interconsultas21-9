<?php

namespace App\Http\Controllers\API;

use Facades\App\Http\ApiServices\PALaboratorySamplesApiService;
use App\Http\Requests\API\CreatePALaboratorySampleAPIRequest;
use App\Http\Requests\API\UpdatePALaboratorySampleAPIRequest;
use App\Models\PALaboratorySample;
use App\Repositories\PALaboratorySampleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PALaboratorySampleController
 * @package App\Http\Controllers\API
 */

class PALaboratorySampleAPIController extends AppBaseController
{
    /** @var  PALaboratorySampleRepository */
    private $pALaboratorySampleRepository;

    public function __construct(PALaboratorySampleRepository $pALaboratorySampleRepo)
    {
        $this->pALaboratorySampleRepository = $pALaboratorySampleRepo;
    }

    /**
     * Display a listing of the PALaboratorySample.
     * GET|HEAD /pALaboratorySamples
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pALaboratorySampleRepository->pushCriteria(new RequestCriteria($request));
        $this->pALaboratorySampleRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pALaboratorySamples = $this->pALaboratorySampleRepository->all();

        return $this->sendResponse($pALaboratorySamples->toArray(), 'P A Laboratory Samples retrieved successfully');
    }

    /**
     * Store a newly created PALaboratorySample in storage.
     * POST /pALaboratorySamples
     *
     * @param CreatePALaboratorySampleAPIRequest $request
     *
     * @return JsonResponse
     */
    public function store(CreatePALaboratorySampleAPIRequest $request)
    {
        $pALaboratorySample = PALaboratorySamplesApiService::store($request->all());

        return Response::json($pALaboratorySample->id, 200);
    }

    /**
     * Display the specified PALaboratorySample.
     * GET|HEAD /pALaboratorySamples/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PALaboratorySample $pALaboratorySample */
        $pALaboratorySample = $this->pALaboratorySampleRepository->findWithoutFail($id);

        if (empty($pALaboratorySample)) {
            return $this->sendError('P A Laboratory Sample not found');
        }

        return $this->sendResponse($pALaboratorySample->toArray(), 'P A Laboratory Sample retrieved successfully');
    }

    /**
     * Update the specified PALaboratorySample in storage.
     * PUT/PATCH /pALaboratorySamples/{id}
     *
     * @param  int $id
     * @param UpdatePALaboratorySampleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePALaboratorySampleAPIRequest $request)
    {
        $input = $request->all();

        /** @var PALaboratorySample $pALaboratorySample */
        $pALaboratorySample = $this->pALaboratorySampleRepository->findWithoutFail($id);

        if (empty($pALaboratorySample)) {
            return $this->sendError('P A Laboratory Sample not found');
        }

        $pALaboratorySample = $this->pALaboratorySampleRepository->update($input, $id);

        return $this->sendResponse($pALaboratorySample->toArray(), 'PALaboratorySample updated successfully');
    }

    /**
     * Remove the specified PALaboratorySample from storage.
     * DELETE /pALaboratorySamples/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PALaboratorySample $pALaboratorySample */
        $pALaboratorySample = $this->pALaboratorySampleRepository->findWithoutFail($id);

        if (empty($pALaboratorySample)) {
            return $this->sendError('P A Laboratory Sample not found');
        }

        $pALaboratorySample->delete();

        return $this->sendResponse($id, 'P A Laboratory Sample deleted successfully');
    }
}
