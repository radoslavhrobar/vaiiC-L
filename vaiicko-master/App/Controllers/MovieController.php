<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Model;
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

    public function pridaj(): Response
    {
        return $this->html();
    }

    public function novy(): Response
    {
        $data = $this->app->getRequest()->getPost();

        $movie = new Movie();
        $movie->setNazov($data['nazov']);
        $movie->setRokVydania($data['rokVydania']);
        $movie->setMiestoVydania($data['miestoVydania']);
        $movie->setHodnotenie($data['hodnotenie']);
        $movie->save();
        return $this->redirect($this->url('movie.pridaj'));
    }

    public function uprav(): Response
    {
        $id = $this->request()->getValue('id');
        $movie = Movie::getOne($id);

        return $this->html(['movie' => $movie]);
    }

    public function upraveny(): Response
    {
        $id = (int)$this->request()->getValue('id');
        $movie = Movie::getOne($id);
        $movie->setRokVydania($this->request()->getValue('rokVydania'));
        $movie->setMiestoVydania($this->request()->getValue('miestoVydania'));
        $movie->setHodnotenie($this->request()->getValue('hodnotenie'));
        $movie->save();
        return $this->redirect($this->url('movie.index'));
    }

    public function zmaz(): Response
    {
        $id = $this->request()->getValue('id');
        $movie = Movie::getOne($id);

        $movie->delete();
        return $this->redirect($this->url("movie.index"));
    }

}