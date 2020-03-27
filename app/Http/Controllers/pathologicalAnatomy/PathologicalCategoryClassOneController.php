<?php

namespace App\Http\Controllers\pathologicalAnatomy;

use App\DataTables\pathologicalAnatomy\PathologicalCategoryClassOneDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePathologicalCategoryClassOneRequest;
use App\Http\Requests\UpdatePathologicalCategoryClassOneRequest;
use App\Repositories\PathologicalCategoryClassOneRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\View\View;
use Response;

class PathologicalCategoryClassOneController extends AppBaseController
{
    /** @var  PathologicalCategoryClassOneRepository */
    private $pathologicalCategoryClassOneRepository;

    public function __construct(PathologicalCategoryClassOneRepository $pathologicalCategoryClassOneRepo)
    {
        $this->pathologicalCategoryClassOneRepository = $pathologicalCategoryClassOneRepo;
    }

    /**
     * Display a listing of the PathologicalCategoryClassOne.
     *
     * @param PathologicalCategoryClassOneDataTable $pathologicalCategoryClassOneDataTable
     * @return Response
     */
    public function index(PathologicalCategoryClassOneDataTable $pathologicalCategoryClassOneDataTable)
    {
        return $pathologicalCategoryClassOneDataTable->render('pathologicalAnatomy.pathological_category_class_one.index');
    }

    /**
     * Show the form for creating a new PathologicalCategoryClassOne.
     *
     * @return Response
     */
    public function create()
    {
        return view('pathologicalAnatomy.pathological_category_class_one.create');
    }

    /**
     * Store a newly created PathologicalCategoryClassOne in storage.
     *
     * @param CreatePathologicalCategoryClassOneRequest $request
     *
     * @return Response
     */
    public function store(CreatePathologicalCategoryClassOneRequest $request)
    {
        $input = $request->all();

        $input["name"] = mb_strtoupper($input["name"]);

        $pathologicalCategoryClassOne = $this->pathologicalCategoryClassOneRepository->create($input);

        Flash::success('Categoría almacenada con éxito.');

        return redirect(route('pathologicalCategoryClassOne.index'));
    }

    /**
     * Display the specified PathologicalCategoryClassOne.
     *
     * @param  int $id
     *
     * @return View
     */
    public function show($id)
    {
        $pathologicalCategoryClassOne = $this->pathologicalCategoryClassOneRepository->findWithoutFail($id);

        if (empty($pathologicalCategoryClassOne)) {
            Flash::error('Categoría no encontrada');

            return redirect(route('pathologicalCategoryClassOne.index'));
        }

        return view('pathologicalAnatomy.pathological_category_class_one.show')->with('pathologicalCategoryClassOne', $pathologicalCategoryClassOne);
    }

    /**
     * Show the form for editing the specified PathologicalCategoryClassOne.
     *
     * @param  int $id
     *
     * @return View
     */
    public function edit($id)
    {
        $pathologicalCategoryClassOne = $this->pathologicalCategoryClassOneRepository->findWithoutFail($id);

        if (empty($pathologicalCategoryClassOne)) {

            Flash::error('Categoría no encontrada.');

            return redirect(route('pathologicalCategoryClassOne.index'));
        }

        return view('pathologicalAnatomy.pathological_category_class_one.edit')->with('pathologicalCategoryClassOne', $pathologicalCategoryClassOne);
    }

    /**
     * Update the specified PathologicalCategoryClassOne in storage.
     *
     * @param  int              $id
     * @param UpdatePathologicalCategoryClassOneRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePathologicalCategoryClassOneRequest $request)
    {
        $pathologicalCategoryClassOne = $this->pathologicalCategoryClassOneRepository->findWithoutFail($id);

        if (empty($pathologicalCategoryClassOne)) {
            Flash::error('Categoría no encontrada');

            return redirect(route('pathologicalCategoryClassOne.index'));
        }

        $input = $request->all();
        $input["name"] = mb_strtoupper($input["name"]);

        $pathologicalCategoryClassOne = $this->pathologicalCategoryClassOneRepository->update($request->all(), $id);

        Flash::success('Categoría actualizada con éxito.');

        return redirect(route('pathologicalCategoryClassOne.index'));
    }

    /**
     * Remove the specified PathologicalCategoryClassOne from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pathologicalCategoryClassOne = $this->pathologicalCategoryClassOneRepository->findWithoutFail($id);

        if (empty($pathologicalCategoryClassOne)) {

            Flash::error('Categoría no encontrada');

            return redirect(route('pathologicalCategoryClassOne.index'));
        }

        $this->pathologicalCategoryClassOneRepository->delete($id);

        Flash::success('Categoría eliminada con éxito.');

        return redirect(route('pathologicalCategoryClassOne.index'));
    }

    public function getChildCategories($categoryId)
    {
        $category = $this->pathologicalCategoryClassOneRepository->findWithoutFail($categoryId);
        $response = \Form::label('name', 'Categoría Nivel II:');
        $response .= \Form::select('pathology_category_class_two_id', $category->childCategories->pluck('name', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione la categoría principal', 'onchange' => 'bringThirdLevelCategoriesSelect();']);
        return $response;
    }
}
