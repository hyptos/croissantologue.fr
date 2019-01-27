<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlaceRepository")
 */
class Place
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
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Grade", mappedBy="ref_id_place")
     */
    private $ref_id_grade;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Event", mappedBy="place")
     */
    private $events;

    public function __construct()
    {
        $this->ref_id_grade = new ArrayCollection();
        $this->events = new ArrayCollection();
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

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
            $refIdGrade->setRefIdPlace($this);
        }

        return $this;
    }

    public function removeRefIdGrade(Grade $refIdGrade): self
    {
        if ($this->ref_id_grade->contains($refIdGrade)) {
            $this->ref_id_grade->removeElement($refIdGrade);
            // set the owning side to null (unless already changed)
            if ($refIdGrade->getRefIdPlace() === $this) {
                $refIdGrade->setRefIdPlace(null);
            }
        }

        return $this;
    }


    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return Collection|Event[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->setPlace($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
            // set the owning side to null (unless already changed)
            if ($event->getPlace() === $this) {
                $event->setPlace(null);
            }
        }

        return $this;
    }
}
