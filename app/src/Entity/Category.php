<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Grade", mappedBy="ref_id_category")
     */
    private $ref_id_grade;

    public function __construct()
    {
        $this->ref_id_grade = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Grade[]
     */
    public function getRefIdGrade(): Collection
    {
        return $this->ref_id_grade;
    }

    public function addRefIdGrade(Grade $refIdGrade): self
    {
        if (!$this->ref_id_grade->contains($refIdGrade)) {
            $this->ref_id_grade[] = $refIdGrade;
            $refIdGrade->setRefIdCategory($this);
        }

        return $this;
    }

    public function removeRefIdGrade(Grade $refIdGrade): self
    {
        if ($this->ref_id_grade->contains($refIdGrade)) {
            $this->ref_id_grade->removeElement($refIdGrade);
            // set the owning side to null (unless already changed)
            if ($refIdGrade->getRefIdCategory() === $this) {
                $refIdGrade->setRefIdCategory(null);
            }
        }

        return $this;
    }
}
