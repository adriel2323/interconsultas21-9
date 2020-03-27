<?php

namespace App\Http\Controllers\pathologicalAnatomy;

use App\DataTables\pathologicalAnatomy\PathologicalAnatomyTemplateDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePathologicalAnatomyTemplateRequest;
use App\Http\Requests\UpdatePathologicalAnatomyTemplateRequest;
use App\Models\pathologicalAnatomy\PapanicolaousTemplate;
use App\Repositories\PathologicalAnatomyTemplateRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PathologicalAnatomyTemplateController extends AppBaseController
{
    /** @var  PathologicalAnatomyTemplateRepository */
    private $pathologicalAnatomyTemplateRepository;

    public function __construct(PathologicalAnatomyTemplateRepository $pathologicalAnatomyTemplateRepo)
    {
        $this->pathologicalAnatomyTemplateRepository = $pathologicalAnatomyTemplateRepo;
    }

    /**
     * Display a listing of the PathologicalAnatomyTemplate.
     *
     * @param PathologicalAnatomyTemplateDataTable $pathologicalAnatomyTemplateDataTable
     * @return Response
     */
    public function index(PathologicalAnatomyTemplateDataTable $pathologicalAnatomyTemplateDataTable)
    {
        return $pathologicalAnatomyTemplateDataTable->render('pathologicalAnatomy.pathological_anatomy_templates.index');
    }

    /**
     * Show the form for creating a new PathologicalAnatomyTemplate.
     *
     * @return Response
     */
    public function create()
    {
        return view('pathologicalAnatomy.pathological_anatomy_templates.create');
    }

    /**
     * Store a newly created PathologicalAnatomyTemplate in storage.
     *
     * @param CreatePathologicalAnatomyTemplateRequest $request
     *
     * @return Response
     */
    public function store(CreatePathologicalAnatomyTemplateRequest $request)
    {
        $input = $request->all();

        $pathologicalAnatomyTemplate = $this->pathologicalAnatomyTemplateRepository->create($input);

        Flash::success('Plantilla de informe creada con éxito.');

        return redirect(route('pathologicalAnatomyTemplates.create'));
    }

    /**
     * Display the specified PathologicalAnatomyTemplate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pathologicalAnatomyTemplate = $this->pathologicalAnatomyTemplateRepository->findWithoutFail($id);

        if (empty($pathologicalAnatomyTemplate)) {
            Flash::error('Plantilla de informe no encontrada');

            return redirect(route('pathologicalAnatomyTemplates.index'));
        }

        return view('pathologicalAnatomy.pathological_anatomy_templates.show')->with('pathologicalAnatomyTemplate', $pathologicalAnatomyTemplate);
    }

    /**
     * Show the form for editing the specified PathologicalAnatomyTemplate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pathologicalAnatomyTemplate = $this->pathologicalAnatomyTemplateRepository->findWithoutFail($id);

        if (empty($pathologicalAnatomyTemplate)) {
            Flash::error('Plantilla de informe no encontrada.');

            return redirect(route('pathologicalAnatomyTemplates.index'));
        }

        return view('pathologicalAnatomy.pathological_anatomy_templates.edit')->with('pathologicalAnatomyTemplate', $pathologicalAnatomyTemplate);
    }

    /**
     * Update the specified PathologicalAnatomyTemplate in storage.
     *
     * @param  int              $id
     * @param UpdatePathologicalAnatomyTemplateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePathologicalAnatomyTemplateRequest $request)
    {
        $pathologicalAnatomyTemplate = $this->pathologicalAnatomyTemplateRepository->findWithoutFail($id);

        if (empty($pathologicalAnatomyTemplate)) {
            Flash::error('Plantilla de informe no encontrada.');

            return redirect(route('pathologicalAnatomyTemplates.index'));
        }

        $pathologicalAnatomyTemplate = $this->pathologicalAnatomyTemplateRepository->update($request->all(), $id);

        Flash::success('Plantilla de informe actualizada con éxito.');

        return redirect(route('pathologicalAnatomyTemplates.index'));
    }

    /**
     * Remove the specified PathologicalAnatomyTemplate from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pathologicalAnatomyTemplate = $this->pathologicalAnatomyTemplateRepository->findWithoutFail($id);

        if (empty($pathologicalAnatomyTemplate)) {
            Flash::error('Plantilla de informe no encontrada');

            return redirect(route('pathologicalAnatomyTemplates.index'));
        }

        $this->pathologicalAnatomyTemplateRepository->delete($id);

        Flash::success('Plantilla de informe eliminada con éxito.');

        return redirect(route('pathologicalAnatomyTemplates.index'));
    }

    public function papanicolaouDialogTemplate()
    {
        return view('pathologicalAnatomy.papanicolaouTemplate');
    }

    public function getPapanicolaouTemplateDescription($templateId)
    {
        $template = PapanicolaousTemplate::find($templateId);
        $templateDescription = explode('-' , $template->description);
        $templateDescription = trim($templateDescription[1]);
        return $templateDescription;
    }
}
