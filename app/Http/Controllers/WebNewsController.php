<?php

namespace App\Http\Controllers;

use App\DataTables\WebNewsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateWebNewsRequest;
use App\Http\Requests\UpdateWebNewsRequest;
use App\Repositories\WebNewsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class WebNewsController extends AppBaseController
{
    /** @var  WebNewsRepository */
    private $webNewsRepository;

    public function __construct(WebNewsRepository $webNewsRepo)
    {
        $this->webNewsRepository = $webNewsRepo;
    }

    /**
     * Display a listing of the WebNews.
     *
     * @param WebNewsDataTable $webNewsDataTable
     * @return Response
     */
    public function index(WebNewsDataTable $webNewsDataTable)
    {
        return $webNewsDataTable->render('web_news.index');
    }

    /**
     * Show the form for creating a new WebNews.
     *
     * @return Response
     */
    public function create()
    {
        return view('web_news.create');
    }

    /**
     * Store a newly created WebNews in storage.
     *
     * @param CreateWebNewsRequest $request
     *
     * @return Response
     */
    public function store(CreateWebNewsRequest $request)
    {
        $input = $request->all();

        $webNews = $this->webNewsRepository->create($input);

        Flash::success('Noticia web almacenada con éxito.');

        return redirect(route('webNews.index'));
    }

    /**
     * Display the specified WebNews.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $webNews = $this->webNewsRepository->findWithoutFail($id);

        if (empty($webNews)) {
            Flash::error('Noticia web no encontrada');

            return redirect(route('webNews.index'));
        }

        return view('web_news.show')->with('webNews', $webNews);
    }

    /**
     * Show the form for editing the specified WebNews.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $webNews = $this->webNewsRepository->findWithoutFail($id);

        if (empty($webNews)) {
            Flash::error('Noticia web no encontrada');

            return redirect(route('webNews.index'));
        }

        return view('web_news.edit')->with('webNews', $webNews);
    }

    /**
     * Update the specified WebNews in storage.
     *
     * @param  int              $id
     * @param UpdateWebNewsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWebNewsRequest $request)
    {
        $webNews = $this->webNewsRepository->findWithoutFail($id);

        if (empty($webNews)) {
            Flash::error('Noticia web no encontrada');

            return redirect(route('webNews.index'));
        }

        $webNews = $this->webNewsRepository->update($request->all(), $id);

        Flash::success('Noticia web actualizada con éxito.');

        return redirect(route('webNews.index'));
    }

    /**
     * Remove the specified WebNews from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $webNews = $this->webNewsRepository->findWithoutFail($id);

        if (empty($webNews)) {
            Flash::error('Noticia web no encontrada');

            return redirect(route('webNews.index'));
        }

        $this->webNewsRepository->delete($id);

        Flash::success('Noticia web eliminada con éxito.');

        return redirect(route('webNews.index'));
    }
}
