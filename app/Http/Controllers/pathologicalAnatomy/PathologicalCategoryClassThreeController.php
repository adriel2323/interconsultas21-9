<?php

namespace App\Http\Controllers\pathologicalAnatomy;

use App\DataTables\pathologicalAnatomy\PathologicalCategoryClassThreeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePathologicalCategoryClassThreeRequest;
use App\Http\Requests\UpdatePathologicalCategoryClassThreeRequest;
use App\Repositories\PathologicalCategoryClassThreeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\View\View;
use Response;

class PathologicalCategoryClassThreeController extends AppBaseController
{
    /** @var  PathologicalCategoryClassThreeRepository */
    private $pathologicalCategoryClassThreeRepository;

    public function __construct(PathologicalCategoryClassThreeRepository $pathologicalCategoryClassThreeRepo)
    {
        $this->pathologicalCategoryClassThreeRepository = $pathologicalCategoryClassThreeRepo;
    }

    /**
     * Display a listing of the PathologicalCategoryClassThree.
     *
     * @param PathologicalCategoryClassThreeDataTable $pathologicalCategoryClassThreeDataTable
     * @return Response
     */
    public function index(PathologicalCategoryClassThreeDataTable $pathologicalCategoryClassThreeDataTable)
    {
        return $pathologicalCategoryClassThreeDataTable->render('pathologicalAnatomy.pathological_category_class_three.index');
    }

    /**
     * Show the form for creating a new PathologicalCategoryClassThree.
     *
     * @return view
     */
    public function create()
    {
        return view('pathologicalAnatomy.pathological_category_class_three.create');
    }

    /**
     * Store a newly created PathologicalCategoryClassThree in storage.
     *
     * @param CreatePathologicalCategoryClassThreeRequest $request
     *
     * @return Response
     */
    public function store(CreatePathologicalCategoryClassThreeRequest $request)
    {
        $input = $request->all();
        $input["name"] = mb_strtoupper($input["name"]);

        $pathologicalCategoryClassThree = $this->pathologicalCategoryClassThreeRepository->create($input);

        Flash::success('Categoría almacenada con éxito.');

        return redirect(route('pathologicalCategoryClassThree.create'));
    }

    /**
     * Display the specified PathologicalCategoryClassThree.
     *
     * @param  int $id
     *
     * @return View
     */
    public function show($id)
    {
        $pathologicalCategoryClassThree = $this->pathologicalCategoryClassThreeRepository->findWithoutFail($id);

        if (empty($pathologicalCategoryClassThree)) {
            Flash::error('Categoría no encontrada');

            return redirect(route('pathologicalCategoryClassThree.index'));
        }

        return view('pathologicalAnatomy.pathological_category_class_three.show')->with('pathologicalCategoryClassThree', $pathologicalCategoryClassThree);
    }

    /**
     * Show the form for editing the specified PathologicalCategoryClassThree.
     *
     * @param  int $id
     *
     * @return View
     */
    public function edit($id)
    {
        $pathologicalCategoryClassThree = $this->pathologicalCategoryClassThreeRepository->findWithoutFail($id);

        if (empty($pathologicalCategoryClassThree)) {

            Flash::error('Categoría no encontrada.');

            return redirect(route('pathologicalCategoryClassThree.index'));
        }

        return view('pathologicalAnatomy.pathological_category_class_three.edit')->with('pathologicalCategoryClassThree', $pathologicalCategoryClassThree);
    }

    /**
     * Update the specified PathologicalCategoryClassThree in storage.
     *
     * @param  int              $id
     * @param UpdatePathologicalCategoryClassThreeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePathologicalCategoryClassThreeRequest $request)
    {
        $pathologicalCategoryClassThree = $this->pathologicalCategoryClassThreeRepository->findWithoutFail($id);

        if (empty($pathologicalCategoryClassThree)) {
            Flash::error('Categoría no encontrada');

            return redirect(route('pathologicalCategoryClassThree.index'));
        }

        $input = $request->all();
        $input["name"] = mb_strtoupper($input["name"]);

        $pathologicalCategoryClassThree = $this->pathologicalCategoryClassThreeRepository->update($input, $id);

        Flash::success('Categoría actualizada con éxito.');

        return redirect(route('pathologicalCategoryClassThree.index'));
    }

    /**
     * Remove the specified PathologicalCategoryClassThree from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pathologicalCategoryClassThree = $this->pathologicalCategoryClassThreeRepository->findWithoutFail($id);

        if (empty($pathologicalCategoryClassThree)) {

            Flash::error('Categoría no encontrada');

            return redirect(route('pathologicalCategoryClassThree.index'));
        }

        $this->pathologicalCategoryClassThreeRepository->delete($id);

        Flash::success('Categoría eliminada con éxito.');

        return redirect(route('pathologicalCategoryClassThree.index'));
    }

    public function getChildCategories($categoryId)
    {
        $category = $this->pathologicalCategoryClassThreeRepository->findWithoutFail($categoryId);

        $response = \Form::label('name', 'Categoría Nivel IV:');

        $response .= \Form::select('pathology_category_class_four_id',
            $category->childCategories->pluck('name', 'id'),
            null,
            ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione la categoría']);
        return $response;
    }
}
