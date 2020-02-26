<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $contents;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ordre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pic", mappedBy="article" )
     */
    private $pic;

    public function __construct()
    {
        $this->pic = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContents(): ?string
    {
        return $this->contents;
    }

    public function setContents(string $contents): self
    {
        $this->contents = $contents;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(?int $ordre): self
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * @return Collection|Pic[]
     */
    public function getPic(): Collection
    {
        return $this->pic;
    }

    public function addPic(Pic $pic): self
    {
        if (!$this->pic->contains($pic)) {
            $this->pic[] = $pic;
            $pic->setArticle($this);
        }

        return $this;
    }

    public function removePic(Pic $pic): self
    {
        if ($this->pic->contains($pic)) {
            $this->pic->removeElement($pic);
            // set the owning side to null (unless already changed)
            if ($pic->getArticle() === $this) {
                $pic->setArticle(null);
            }
        }

        return $this;
    }
}
