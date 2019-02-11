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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Event", mappedBy="category")
     */
    private $place;

    public function __construct()
    {
        $this->ref_id_grade = new ArrayCollection();
        $this->place = new ArrayCollection();
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

    public function __toString()
    {
        $strName = $this->getName();
        $bExist = isset($strName);
        return $bExist ? $this->getName() : '';
    }

    /**
     * @return Collection|Event[]
     */
    public function getEvent(): Collection
    {
        return $this->event;
    }

    public function addPlace(Event $event): self
    {
        if (!$this->event->contains($event)) {
            $this->event[] = $event;
            $event->setCategory($this);
        }

        return $this;
    }

    public function removePlace(Event $event): self
    {
        if ($this->event->contains($event)) {
            $this->event->removeElement($event);
            // set the owning side to null (unless already changed)
            if ($event->getCategory() === $this) {
                $event->setCategory(null);
            }
        }

        return $this;
    }
}
