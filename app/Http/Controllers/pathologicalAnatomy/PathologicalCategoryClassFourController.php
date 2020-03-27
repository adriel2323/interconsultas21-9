<?php

namespace App\Http\Controllers\pathologicalAnatomy;

use App\DataTables\pathologicalAnatomy\PathologicalCategoryClassFourDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePathologicalCategoryClassFourRequest;
use App\Http\Requests\UpdatePathologicalCategoryClassFourRequest;
use App\Repositories\PathologicalCategoryClassFourRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\View\View;
use Response;

class PathologicalCategoryClassFourController extends AppBaseController
{
    /** @var  PathologicalCategoryClassFourRepository */
    private $pathologicalCategoryClassFourRepository;

    public function __construct(PathologicalCategoryClassFourRepository $pathologicalCategoryClassFourRepo)
    {
        $this->pathologicalCategoryClassFourRepository = $pathologicalCategoryClassFourRepo;
    }

    /**
     * Display a listing of the PathologicalCategoryClassFour.
     *
     * @param PathologicalCategoryClassFourDataTable $pathologicalCategoryClassFourDataTable
     * @return Response
     */
    public function index(PathologicalCategoryClassFourDataTable $pathologicalCategoryClassFourDataTable)
    {
        return $pathologicalCategoryClassFourDataTable->render('pathologicalAnatomy.pathological_category_class_four.index');
    }

    /**
     * Show the form for creating a new PathologicalCategoryClassFour.
     *
     * @return view
     */
    public function create()
    {
        return view('pathologicalAnatomy.pathological_category_class_four.create');
    }

    /**
     * Store a newly created PathologicalCategoryClassFour in storage.
     *
     * @param CreatePathologicalCategoryClassFourRequest $request
     *
     * @return Response
     */
    public function store(CreatePathologicalCategoryClassFourRequest $request)
    {
        $input = $request->all();
        $input["name"] = mb_strtoupper($input["name"]);

        $pathologicalCategoryClassFour = $this->pathologicalCategoryClassFourRepository->create($input);

        Flash::success('Categoría almacenada con éxito.');

        return redirect(route('pathologicalCategoryClassFour.create'));
    }

    /**
     * Display the specified PathologicalCategoryClassFour.
     *
     * @param  int $id
     *
     * @return View
     */
    public function show($id)
    {
        $pathologicalCategoryClassFour = $this->pathologicalCategoryClassFourRepository->findWithoutFail($id);

        if (empty($pathologicalCategoryClassFour)) {
            Flash::error('Categoría no encontrada');

            return redirect(route('pathologicalCategoryClassFour.index'));
        }

        return view('pathologicalAnatomy.pathological_category_class_four.show')->with('pathologicalCategoryClassFour', $pathologicalCategoryClassFour);
    }

    /**
     * Show the form for editing the specified PathologicalCategoryClassFour.
     *
     * @param  int $id
     *
     * @return View
     */
    public function edit($id)
    {
        $pathologicalCategoryClassFour = $this->pathologicalCategoryClassFourRepository->findWithoutFail($id);

        if (empty($pathologicalCategoryClassFour)) {

            Flash::error('Categoría no encontrada.');

            return redirect(route('pathologicalCategoryClassFour.index'));
        }

        return view('pathologicalAnatomy.pathological_category_class_four.edit')->with('pathologicalCategoryClassFour', $pathologicalCategoryClassFour);
    }

    /**
     * Update the specified PathologicalCategoryClassFour in storage.
     *
     * @param  int              $id
     * @param UpdatePathologicalCategoryClassFourRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePathologicalCategoryClassFourRequest $request)
    {
        $pathologicalCategoryClassFour = $this->pathologicalCategoryClassFourRepository->findWithoutFail($id);

        if (empty($pathologicalCategoryClassFour)) {
            Flash::error('Categoría no encontrada');

            return redirect(route('pathologicalCategoryClassFour.index'));
        }

        $input = $request->all();
        $input["name"] = mb_strtoupper($input["name"]);

        $pathologicalCategoryClassFour = $this->pathologicalCategoryClassFourRepository->update($input, $id);

        Flash::success('Categoría actualizada con éxito.');

        return redirect(route('pathologicalCategoryClassFour.index'));
    }

    /**
     * Remove the specified PathologicalCategoryClassFour from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pathologicalCategoryClassFour = $this->pathologicalCategoryClassFourRepository->findWithoutFail($id);

        if (empty($pathologicalCategoryClassFour)) {

            Flash::error('Categoría no encontrada');

            return redirect(route('pathologicalCategoryClassFour.index'));
        }

        $this->pathologicalCategoryClassFourRepository->delete($id);

        Flash::success('Categoría eliminada con éxito.');

        return redirect(route('pathologicalCategoryClassFour.index'));
    }
}
