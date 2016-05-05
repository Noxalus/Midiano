<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="music")
 */
class Music
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $title;

    /**
     * @ORM\ManyToMany(targetEntity="Composer")
     * @ORM\JoinTable(name="music_composer_relationship")
     */
    protected $composers;

    /**
     * @ORM\OneToMany(targetEntity="MusicArrangement", mappedBy="music")
     */
    protected $arrangements;

    /**
     *  @ORM\ManyToOne(targetEntity="MusicGenre", inversedBy="musics")
     */
    protected $genre;

    /**
     *  @ORM\ManyToOne(targetEntity="FamousBy", inversedBy="musics")
     */
    protected $famousBy;

    public function __construct()
    {
        $this->composers = new ArrayCollection();
        $this->arrangements = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Music
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Add composer
     *
     * @param \AppBundle\Entity\Composer $composer
     *
     * @return Music
     */
    public function addComposer(\AppBundle\Entity\Composer $composer)
    {
        $this->composers[] = $composer;

        return $this;
    }

    /**
     * Remove composer
     *
     * @param \AppBundle\Entity\Composer $composer
     */
    public function removeComposer(\AppBundle\Entity\Composer $composer)
    {
        $this->composers->removeElement($composer);
    }

    /**
     * Get composers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComposers()
    {
        return $this->composers;
    }

    /**
     * Set genre
     *
     * @param \AppBundle\Entity\MusicGenre $genre
     *
     * @return Music
     */
    public function setGenre(\AppBundle\Entity\MusicGenre $genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return \AppBundle\Entity\MusicGenre
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set famousBy
     *
     * @param \AppBundle\Entity\FamousBy $famousBy
     *
     * @return Music
     */
    public function setFamousBy(\AppBundle\Entity\FamousBy $famousBy = null)
    {
        $this->famousBy = $famousBy;

        return $this;
    }

    /**
     * Get famousBy
     *
     * @return \AppBundle\Entity\FamousBy
     */
    public function getFamousBy()
    {
        return $this->famousBy;
    }

    /**
     * Add arrangement
     *
     * @param \AppBundle\Entity\MusicArrangement $arrangement
     *
     * @return Music
     */
    public function addArrangement(\AppBundle\Entity\MusicArrangement $arrangement)
    {
        $this->arrangements[] = $arrangement;

        return $this;
    }

    /**
     * Remove arrangement
     *
     * @param \AppBundle\Entity\MusicArrangement $arrangement
     */
    public function removeArrangement(\AppBundle\Entity\MusicArrangement $arrangement)
    {
        $this->arrangements->removeElement($arrangement);
    }

    /**
     * Get arrangements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArrangements()
    {
        return $this->arrangements;
    }
}
