<?php

namespace App\Models;

use App\Core\Model;
use App\Helpers\Pohlavie;
use App\Helpers\Rola;
use DateTime;

class User extends Model
{
    protected ?int $id = null;
    protected string $email;
    protected string $p_meno;
    protected string $heslo;
    protected string $rola = Rola::User->value;
    protected ?string $meno;
    protected ?string $priezvisko;
    protected ?string $pohlavie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPMeno(): string
    {
        return $this->p_meno;
    }

    public function setPMeno(string $p_meno): void
    {
        $this->p_meno = $p_meno;
    }

    public function getHeslo(): string
    {
        return $this->heslo;
    }

    public function setHeslo(string $heslo): void
    {
        $this->heslo = $heslo;
    }

    public function getRola(): string
    {
        return $this->rola;
    }

    public function setRola(string $rola): void
    {
        $this->rola = $rola;
    }

    public function getMeno(): ?string
    {
        return $this->meno;
    }

    public function setMeno(?string $meno): void
    {
        $this->meno = $meno;
    }

    public function getPriezvisko(): ?string
    {
        return $this->priezvisko;
    }

    public function setPriezvisko(?string $priezvisko): void
    {
        $this->priezvisko = $priezvisko;
    }

    public function getPohlavie(): ?string
    {
        return $this->pohlavie;
    }

    public function setPohlavie(?string $pohlavie): void
    {
        $this->pohlavie = $pohlavie;
    }

}