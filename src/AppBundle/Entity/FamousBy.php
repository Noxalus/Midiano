<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="famous_by")
 */
class FamousBy
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false, unique=true)
     */
    protected $name;

    /**
     *  @ORM\ManyToOne(targetEntity="MusicGenre")
     */
    protected $genre;

    /**
     * @ORM\OneToMany(targetEntity="Music", mappedBy="famousBy")
     */
    protected $musics;

    public function __construct()
    {
        $this->musics = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return FamousBy
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add music
     *
     * @param \AppBundle\Entity\Music $music
     *
     * @return FamousBy
     */
    public function addMusic(\AppBundle\Entity\Music $music)
    {
        $this->musics[] = $music;

        return $this;
    }

    /**
     * Remove music
     *
     * @param \AppBundle\Entity\Music $music
     */
    public function removeMusic(\AppBundle\Entity\Music $music)
    {
        $this->musics->removeElement($music);
    }

    /**
     * Get musics
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMusics()
    {
        return $this->musics;
    }

    /**
     * Set genre
     *
     * @param \AppBundle\Entity\MusicGenre $genre
     *
     * @return FamousBy
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
}
