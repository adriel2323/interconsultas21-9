<?php

namespace App\Http\Controllers\pathologicalAnatomy;

use App\DataTables\pathologicalAnatomy\PathologicalAnatomyTemplatesTitlesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePathologicalAnatomyTemplatesTitlesRequest;
use App\Http\Requests\UpdatePathologicalAnatomyTemplatesTitlesRequest;
use App\Repositories\PathologicalAnatomyTemplatesTitlesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PathologicalAnatomyTemplatesTitlesController extends AppBaseController
{
    /** @var  PathologicalAnatomyTemplatesTitlesRepository */
    private $pathologicalAnatomyTemplatesTitlesRepository;

    public function __construct(PathologicalAnatomyTemplatesTitlesRepository $pathologicalAnatomyTemplatesTitlesRepo)
    {
        $this->pathologicalAnatomyTemplatesTitlesRepository = $pathologicalAnatomyTemplatesTitlesRepo;
    }

    /**
     * Display a listing of the PathologicalAnatomyTemplatesTitles.
     *
     * @param PathologicalAnatomyTemplatesTitlesDataTable $pathologicalAnatomyTemplatesTitlesDataTable
     * @return Response
     */
    public function index(PathologicalAnatomyTemplatesTitlesDataTable $pathologicalAnatomyTemplatesTitlesDataTable)
    {
        return $pathologicalAnatomyTemplatesTitlesDataTable->render('pathologicalAnatomy.pathological_anatomy_templates_titles.index');
    }

    /**
     * Show the form for creating a new PathologicalAnatomyTemplatesTitles.
     *
     * @return Response
     */
    public function create()
    {
        return view('pathologicalAnatomy.pathological_anatomy_templates_titles.create');
    }

    /**
     * Store a newly created PathologicalAnatomyTemplatesTitles in storage.
     *
     * @param CreatePathologicalAnatomyTemplatesTitlesRequest $request
     *
     * @return Response
     */
    public function store(CreatePathologicalAnatomyTemplatesTitlesRequest $request)
    {
        $input = $request->all();

        $pathologicalAnatomyTemplatesTitles = $this->pathologicalAnatomyTemplatesTitlesRepository->create($input);

        Flash::success('Categoría de plantilla de informe almacenada con éxito.');

        return redirect(route('paTemplatesTitles.index'));
    }

    /**
     * Display the specified PathologicalAnatomyTemplatesTitles.
     *
     * @param  int $id
     *
     * @return view
     */
    public function show($id)
    {
        $pATemplatesTitles = $this->pathologicalAnatomyTemplatesTitlesRepository->findWithoutFail($id);

        if (empty($pATemplatesTitles)) {
            Flash::error('Categoría de plantilla de informe no encontrada.');

            return redirect(route('paTemplatesTitles.index'));
        }

        return view('pathologicalAnatomy.pathological_anatomy_templates_titles.show')->with('pATemplatesTitles', $pATemplatesTitles);
    }

    /**
     * Show the form for editing the specified PathologicalAnatomyTemplatesTitles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pATemplatesTitles = $this->pathologicalAnatomyTemplatesTitlesRepository->findWithoutFail($id);

        if (empty($pATemplatesTitles)) {
            Flash::error('Categoría de plantilla de informe no encontrada.');

            return redirect(route('paTemplatesTitles.index'));
        }

        return view('pathologicalAnatomy.pathological_anatomy_templates_titles.edit')->with('pATemplatesTitles', $pATemplatesTitles);
    }

    /**
     * Update the specified PathologicalAnatomyTemplatesTitles in storage.
     *
     * @param  int              $id
     * @param UpdatePathologicalAnatomyTemplatesTitlesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePathologicalAnatomyTemplatesTitlesRequest $request)
    {
        $pathologicalAnatomyTemplatesTitles = $this->pathologicalAnatomyTemplatesTitlesRepository->findWithoutFail($id);

        if (empty($pathologicalAnatomyTemplatesTitles)) {
            Flash::error('Categoría de plantilla de informe no encontrada.');

            return redirect(route('paTemplatesTitles.index'));
        }

        $pathologicalAnatomyTemplatesTitles = $this->pathologicalAnatomyTemplatesTitlesRepository->update($request->all(), $id);

        Flash::success('Categoría de plantilla de informe actualizada con éxito.');

        return redirect(route('paTemplatesTitles.index'));
    }

    /**
     * Remove the specified PathologicalAnatomyTemplatesTitles from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pathologicalAnatomyTemplatesTitles = $this->pathologicalAnatomyTemplatesTitlesRepository->findWithoutFail($id);

        if (empty($pathologicalAnatomyTemplatesTitles)) {
            Flash::error('Categoría de plantilla de informe no encontrada.');

            return redirect(route('paTemplatesTitles.index'));
        }

        $this->pathologicalAnatomyTemplatesTitlesRepository->delete($id);

        Flash::success('Categoría de plantilla de informe eliminada con éxito.');

        return redirect(route('paTemplatesTitles.index'));
    }
}
