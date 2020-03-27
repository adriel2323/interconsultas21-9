<?php

namespace App\Http\Controllers\pathologicalAnatomy;

use App\DataTables\pathologicalAnatomy\PathologicalCategoryClassTwoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePathologicalCategoryClassTwoRequest;
use App\Http\Requests\UpdatePathologicalCategoryClassTwoRequest;
use App\Repositories\PathologicalCategoryClassTwoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\View\View;
use Response;

class PathologicalCategoryClassTwoController extends AppBaseController
{
    /** @var  PathologicalCategoryClassTwoRepository */
    private $pathologicalCategoryClassTwoRepository;

    public function __construct(PathologicalCategoryClassTwoRepository $pathologicalCategoryClassTwoRepo)
    {
        $this->pathologicalCategoryClassTwoRepository = $pathologicalCategoryClassTwoRepo;
    }

    /**
     * Display a listing of the PathologicalCategoryClassTwo.
     *
     * @param PathologicalCategoryClassTwoDataTable $pathologicalCategoryClassTwoDataTable
     * @return Response
     */
    public function index(PathologicalCategoryClassTwoDataTable $pathologicalCategoryClassTwoDataTable)
    {
        return $pathologicalCategoryClassTwoDataTable->render('pathologicalAnatomy.pathological_category_class_two.index');
    }

    /**
     * Show the form for creating a new PathologicalCategoryClassTwo.
     *
     * @return view
     */
    public function create()
    {
        return view('pathologicalAnatomy.pathological_category_class_two.create');
    }

    /**
     * Store a newly created PathologicalCategoryClassTwo in storage.
     *
     * @param CreatePathologicalCategoryClassTwoRequest $request
     *
     * @return Response
     */
    public function store(CreatePathologicalCategoryClassTwoRequest $request)
    {
        $input = $request->all();
        $input["name"] = mb_strtoupper($input["name"]);

        $pathologicalCategoryClassTwo = $this->pathologicalCategoryClassTwoRepository->create($input);

        Flash::success('Categoría almacenada con éxito.');

        return redirect(route('pathologicalCategoryClassTwo.create'));
    }

    /**
     * Display the specified PathologicalCategoryClassTwo.
     *
     * @param  int $id
     *
     * @return View
     */
    public function show($id)
    {
        $pathologicalCategoryClassTwo = $this->pathologicalCategoryClassTwoRepository->findWithoutFail($id);

        if (empty($pathologicalCategoryClassTwo)) {
            Flash::error('Categoría no encontrada');

            return redirect(route('pathologicalCategoryClassTwo.index'));
        }

        return view('pathologicalAnatomy.pathological_category_class_two.show')->with('pathologicalCategoryClassTwo', $pathologicalCategoryClassTwo);
    }

    /**
     * Show the form for editing the specified PathologicalCategoryClassTwo.
     *
     * @param  int $id
     *
     * @return View
     */
    public function edit($id)
    {
        $pathologicalCategoryClassTwo = $this->pathologicalCategoryClassTwoRepository->findWithoutFail($id);

        if (empty($pathologicalCategoryClassTwo)) {

            Flash::error('Categoría no encontrada.');

            return redirect(route('pathologicalCategoryClassTwo.index'));
        }

        return view('pathologicalAnatomy.pathological_category_class_two.edit')->with('pathologicalCategoryClassTwo', $pathologicalCategoryClassTwo);
    }

    /**
     * Update the specified PathologicalCategoryClassTwo in storage.
     *
     * @param  int              $id
     * @param UpdatePathologicalCategoryClassTwoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePathologicalCategoryClassTwoRequest $request)
    {
        $pathologicalCategoryClassTwo = $this->pathologicalCategoryClassTwoRepository->findWithoutFail($id);

        if (empty($pathologicalCategoryClassTwo)) {
            Flash::error('Categoría no encontrada');

            return redirect(route('pathologicalCategoryClassTwo.index'));
        }

        $input = $request->all();
        $input["name"] = mb_strtoupper($input["name"]);

        $pathologicalCategoryClassTwo = $this->pathologicalCategoryClassTwoRepository->update($input, $id);

        Flash::success('Categoría actualizada con éxito.');

        return redirect(route('pathologicalCategoryClassTwo.index'));
    }

    /**
     * Remove the specified PathologicalCategoryClassTwo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pathologicalCategoryClassTwo = $this->pathologicalCategoryClassTwoRepository->findWithoutFail($id);

        if (empty($pathologicalCategoryClassTwo)) {

            Flash::error('Categoría no encontrada');

            return redirect(route('pathologicalCategoryClassTwo.index'));
        }

        $this->pathologicalCategoryClassTwoRepository->delete($id);

        Flash::success('Categoría eliminada con éxito.');

        return redirect(route('pathologicalCategoryClassTwo.index'));
    }

    public function getChildCategories($categoryId)
    {
        $category = $this->pathologicalCategoryClassTwoRepository->findWithoutFail($categoryId);

        $response = \Form::label('name', 'Categoría Nivel III:');

        $response .= \Form::select('pathology_category_class_three_id',
                                    $category->childCategories->pluck('name', 'id'),
                                    null,
                                    ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione la categoría', 'onchange' => 'bringFourthLevelCategoriesSelect();']);
        return $response;
    }
}
