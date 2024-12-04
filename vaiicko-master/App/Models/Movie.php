<?php

namespace App\Models;

use App\Core\Model;

class Movie extends Model
{
    protected int $id;
    protected string $meno;
    protected int $rokVydania;
    protected string $miestoVydania;
    protected string $hodnotenie;

    public function getId(): int
    {
        return $this->id;
    }

    public function getMeno(): string
    {
        return $this->meno;
    }

    public function setMeno(string $meno): void
    {
        $this->meno = $meno;
    }

    public function getRokVydania(): int
    {
        return $this->rokVydania;
    }

    public function setRokVydania(int $rokVydania): void
    {
        $this->rokVydania = $rokVydania;
    }

    public function getMiestoVydania(): string
    {
        return $this->miestoVydania;
    }

    public function setMiestoVydania(string $miestoVydania): void
    {
        $this->miestoVydania = $miestoVydania;
    }

    public function getHodnotenie(): string
    {
        return $this->hodnotenie;
    }

    public function setHodnotenie(string $hodnotenie): void
    {
        $this->hodnotenie = $hodnotenie;
    }


}