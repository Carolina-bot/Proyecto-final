<?php

namespace App\Entity;

use App\Repository\PlatoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlatoRepository::class)]
class Plato
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nombre;

    #[ORM\Column(type: 'string', length: 255)]
    private $Tipo;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $Altranuces;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $Apio;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $Cacahuetes;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $Crustaceos;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $Sulfitos;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $Cascara;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $Gluten;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $Sesamo;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $Huevo;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $Lacteos;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $Moluscos;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $Mostaza;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $Pescado;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $Soja;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->Id = $id;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->Tipo;
    }

    public function setTipo(string $Tipo): self
    {
        $this->Tipo = $Tipo;

        return $this;
    }

    public function getAltranuces(): ?bool
    {
        return $this->Altranuces;
    }

    public function setAltranuces(?bool $Altranuces): self
    {
        $this->Altranuces = $Altranuces;

        return $this;
    }

    public function getApio(): ?bool
    {
        return $this->Apio;
    }

    public function setApio(?bool $Apio): self
    {
        $this->Apio = $Apio;

        return $this;
    }

    public function getCacahuetes(): ?bool
    {
        return $this->Cacahuetes;
    }

    public function setCacahuetes(?bool $Cacahuetes): self
    {
        $this->Cacahuetes = $Cacahuetes;

        return $this;
    }

    public function getCrustaceos(): ?bool
    {
        return $this->Crustaceos;
    }

    public function setCrustaceos(?bool $Crustaceos): self
    {
        $this->Crustaceos = $Crustaceos;

        return $this;
    }

    public function getSulfitos(): ?bool
    {
        return $this->Sulfitos;
    }

    public function setSulfitos(?bool $Sulfitos): self
    {
        $this->Sulfitos = $Sulfitos;

        return $this;
    }

    public function getCascara(): ?bool
    {
        return $this->Cascara;
    }

    public function setCascara(?bool $Cascara): self
    {
        $this->Cascara = $Cascara;

        return $this;
    }

    public function getGluten(): ?bool
    {
        return $this->Gluten;
    }

    public function setGluten(?bool $Gluten): self
    {
        $this->Gluten = $Gluten;

        return $this;
    }

    public function getSesamo(): ?bool
    {
        return $this->Sesamo;
    }

    public function setSesamo(?bool $Sesamo): self
    {
        $this->Sesamo = $Sesamo;

        return $this;
    }

    public function getHuevo(): ?bool
    {
        return $this->Huevo;
    }

    public function setHuevo(?bool $Huevo): self
    {
        $this->Huevo = $Huevo;

        return $this;
    }

    public function getLacteos(): ?bool
    {
        return $this->Lacteos;
    }

    public function setLacteos(?bool $Lacteos): self
    {
        $this->Lacteos = $Lacteos;

        return $this;
    }

    public function getMoluscos(): ?bool
    {
        return $this->Moluscos;
    }

    public function setMoluscos(?bool $Moluscos): self
    {
        $this->Moluscos = $Moluscos;

        return $this;
    }

    public function getMostaza(): ?bool
    {
        return $this->Mostaza;
    }

    public function setMostaza(?bool $Mostaza): self
    {
        $this->Mostaza = $Mostaza;

        return $this;
    }

    public function getPescado(): ?bool
    {
        return $this->Pescado;
    }

    public function setPescado(?bool $Pescado): self
    {
        $this->Pescado = $Pescado;

        return $this;
    }

    public function getSoja(): ?bool
    {
        return $this->Soja;
    }

    public function setSoja(?bool $Soja): self
    {
        $this->Soja = $Soja;

        return $this;
    }
}
