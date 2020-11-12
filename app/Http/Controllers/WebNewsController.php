<?php

namespace App\Http\Controllers;

use App\DataTables\WebNewsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateWebNewsRequest;
use App\Http\Requests\UpdateWebNewsRequest;
use App\Repositories\WebNewsRepository;
use Flash;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
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
     * @return Response
     */
    public function index()
    {
        $headers = [
            'Authorization' => 'Bearer 1|RNeAi0JPktPRPtYw0cME7487V7lstzKcQjsH1bkc',
            'Accept' => 'Application/json'
        ];

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://fnsr.com.ar',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', '/api/news', ['headers' => $headers]);

        return view('web_news.index')->with([
            'news' => json_decode($response->getBody())
        ]);
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
        $data = [
            'image_url' => $request->imageUrl,
            'title' => $request->title,
            'short_description' => $request->shortDescription,
            'extended_description' => $request->extendedDescription,
            'show_until' => $request->showUntil
        ];

        try {

            $headers = [
                'Authorization' => 'Bearer 1|RNeAi0JPktPRPtYw0cME7487V7lstzKcQjsH1bkc',
                'Accept' => 'Application/json'
            ];

            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'https://fnsr.com.ar',
                // You can set any number of default request options.
                'timeout'  => 2.0,
            ]);

            $res = $client->request('POST', '/api/news', [
                'headers' => $headers,
                'form_params' => $data
            ]);

            \Log::info($res->getStatusCode());
            \Log::info($res->getBody());

            Flash::success('Noticia web almacenada con éxito.');

        } catch(\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
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
        $headers = [
            'Authorization' => 'Bearer 1|RNeAi0JPktPRPtYw0cME7487V7lstzKcQjsH1bkc',
            'Accept' => 'Application/json'
        ];

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://fnsr.com.ar',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        $response = $client->request('DELETE', '/api/news/'.$id, ['headers' => $headers]);

        if($response->getStatusCode() == 200) {
            Flash::success('Noticia web eliminada con éxito.');
            return redirect(route('webNews.index'));
        }

        Flash::error('Ocurrió un error al eliminar la noticia.');
        return redirect(route('webNews.index'));
    }
}
