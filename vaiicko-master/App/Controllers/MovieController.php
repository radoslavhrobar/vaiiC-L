<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Models\Movie;

class MovieController extends AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        return $this->html(['movies' => Movie::getAll()]);
    }

    public function pridajFilm(): Response
    {
        $data = $this->app->getRequest()->getPost();

        $movie = new Movie();
        $movie->setMeno($data['meno']);
        $movie->setRokVydania($data['rokVydania']);
        $movie->setMiestoVydania($data['miestoVydania']);
        $movie->setHodnotenie($data['hodnotenie']);
        $movie->save();
        return $this->redirect($this->url('movie.index'));
    }

    public function zmazFilm(): Response
    {
        $id = $this->request()->getValue('id');
        $movie = Movie::getOne($id);

        $movie->delete();
        return $this->redirect($this->url("movie.index"));
    }

}