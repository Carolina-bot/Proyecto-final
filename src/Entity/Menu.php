<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $Fecha;

    #[ORM\Column(type: 'string', length: 255)]
    private $Plato1;

    #[ORM\Column(type: 'string', length: 255)]
    private $Plato2;

    #[ORM\Column(type: 'string', length: 255)]
    private $Plato3;

    #[ORM\Column(type: 'string', length: 255)]
    private $Plato4;

    #[ORM\Column(type: 'string', length: 255)]
    private $Plato5;

    #[ORM\Column(type: 'string', length: 255)]
    private $Plato6;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->Fecha;
    }

    public function setFecha(\DateTimeInterface $Fecha): self
    {
        $this->Fecha = $Fecha;

        return $this;
    }

    public function getPlato1(): ?string
    {
        return $this->Plato1;
    }

    public function setPlato1(string $Plato1): self
    {
        $this->Plato1 = $Plato1;

        return $this;
    }

    public function getPlato2(): ?string
    {
        return $this->Plato2;
    }

    public function setPlato2(string $Plato2): self
    {
        $this->Plato2 = $Plato2;

        return $this;
    }

    public function getPlato3(): ?string
    {
        return $this->Plato3;
    }

    public function setPlato3(string $Plato3): self
    {
        $this->Plato3 = $Plato3;

        return $this;
    }

    public function getPlato4(): ?string
    {
        return $this->Plato4;
    }

    public function setPlato4(string $Plato4): self
    {
        $this->Plato4 = $Plato4;

        return $this;
    }

    public function getPlato5(): ?string
    {
        return $this->Plato5;
    }

    public function setPlato5(string $Plato5): self
    {
        $this->Plato5 = $Plato5;

        return $this;
    }

    public function getPlato6(): ?string
    {
        return $this->Plato6;
    }

    public function setPlato6(string $Plato6): self
    {
        $this->Plato6 = $Plato6;

        return $this;
    }
}
