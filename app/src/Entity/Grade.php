<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GradeRepository")
 */
class Grade
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Place", inversedBy="ref_id_grade")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ref_id_place;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="ref_id_grade")
     */
    private $ref_id_user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="ref_id_grade")
     */
    private $ref_id_category;

    public function __construct()
    {
        $this->ref_id_user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getRefIdPlace(): ?Place
    {
        return $this->ref_id_place;
    }

    public function setRefIdPlace(?Place $ref_id_place): self
    {
        $this->ref_id_place = $ref_id_place;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getRefIdUser(): Collection
    {
        return $this->ref_id_user;
    }

    public function addRefIdUser(User $refIdUser): self
    {
        if (!$this->ref_id_user->contains($refIdUser)) {
            $this->ref_id_user[] = $refIdUser;
        }

        return $this;
    }

    public function removeRefIdUser(User $refIdUser): self
    {
        if ($this->ref_id_user->contains($refIdUser)) {
            $this->ref_id_user->removeElement($refIdUser);
        }

        return $this;
    }

    public function getRefIdCategory(): ?Category
    {
        return $this->ref_id_category;
    }

    public function setRefIdCategory(?Category $ref_id_category): self
    {
        $this->ref_id_category = $ref_id_category;

        return $this;
    }
}