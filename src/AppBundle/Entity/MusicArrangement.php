<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @ORM\Entity
 * @ORM\Table(name="music_arrangement")
 */
class MusicArrangement
{
    use ORMBehaviors\Timestampable\Timestampable;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *  @ORM\ManyToOne(targetEntity="Music", inversedBy="arrangements", cascade={"persist"})
     */
    protected $music;

    /**
     *  @ORM\ManyToOne(targetEntity="User")
     */
    protected $uploader;

    /**
     *  @ORM\OneToOne(targetEntity="MidiFile", cascade={"persist"})
     */
    protected $midi;

    /**
     *  @ORM\OneToOne(targetEntity="ScoreFile", cascade={"persist"})
     */
    protected $score;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $youtubeId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $arranger;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $transcriber;

    /**
     * @ORM\Column(type="integer")
     */
    protected $difficulty;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $userDifficulty;

    public function __construct()
    {
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
     * Set youtubeId
     *
     * @param string $youtubeId
     *
     * @return MusicArrangement
     */
    public function setYoutubeId($youtubeId)
    {
        $this->youtubeId = $youtubeId;

        return $this;
    }

    /**
     * Get youtubeId
     *
     * @return string
     */
    public function getYoutubeId()
    {
        return $this->youtubeId;
    }

    /**
     * Set arranger
     *
     * @param string $arranger
     *
     * @return MusicArrangement
     */
    public function setArranger($arranger)
    {
        $this->arranger = $arranger;

        return $this;
    }

    /**
     * Get arranger
     *
     * @return string
     */
    public function getArranger()
    {
        return $this->arranger;
    }

    /**
     * Set difficulty
     *
     * @param integer $difficulty
     *
     * @return MusicArrangement
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * Get difficulty
     *
     * @return integer
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * Set userDifficulty
     *
     * @param integer $userDifficulty
     *
     * @return MusicArrangement
     */
    public function setUserDifficulty($userDifficulty)
    {
        $this->userDifficulty = $userDifficulty;

        return $this;
    }

    /**
     * Get userDifficulty
     *
     * @return integer
     */
    public function getUserDifficulty()
    {
        return $this->userDifficulty;
    }

    /**
     * Set music
     *
     * @param \AppBundle\Entity\Music $music
     *
     * @return MusicArrangement
     */
    public function setMusic(\AppBundle\Entity\Music $music = null)
    {
        $this->music = $music;

        return $this;
    }

    /**
     * Get music
     *
     * @return \AppBundle\Entity\Music
     */
    public function getMusic()
    {
        return $this->music;
    }

    /**
     * Set uploader
     *
     * @param \AppBundle\Entity\User $uploader
     *
     * @return MusicArrangement
     */
    public function setUploader(\AppBundle\Entity\User $uploader = null)
    {
        $this->uploader = $uploader;

        return $this;
    }

    /**
     * Get uploader
     *
     * @return \AppBundle\Entity\User
     */
    public function getUploader()
    {
        return $this->uploader;
    }

    /**
     * Set midi
     *
     * @param \AppBundle\Entity\MidiFile $midi
     *
     * @return MusicArrangement
     */
    public function setMidi(\AppBundle\Entity\MidiFile $midi = null)
    {
        $this->midi = $midi;

        return $this;
    }

    /**
     * Get midi
     *
     * @return \AppBundle\Entity\MidiFile
     */
    public function getMidi()
    {
        return $this->midi;
    }

    /**
     * Set score
     *
     * @param \AppBundle\Entity\ScoreFile $score
     *
     * @return MusicArrangement
     */
    public function setScore(\AppBundle\Entity\ScoreFile $score = null)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return \AppBundle\Entity\ScoreFile
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set transcriber
     *
     * @param string $transcriber
     *
     * @return MusicArrangement
     */
    public function setTranscriber($transcriber)
    {
        $this->transcriber = $transcriber;

        return $this;
    }

    /**
     * Get transcriber
     *
     * @return string
     */
    public function getTranscriber()
    {
        return $this->transcriber;
    }
}
