<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Pseudo", type="string", length=255)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=255)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CreatedAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="isBanished", type="boolean")
     */
    private $isBanished;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateBanishment", type="datetime")
     */
    private $dateBanishment;

    /**
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Film" ,  cascade={"persist"})
     * @ORM\JoinTable(name="listWatchLaterUser")
     */
    private $listFilmWatchLater;

    /**
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Film" , cascade={"persist"})
     * @ORM\JoinTable(name="listHeartStrokeUser")
     * 
     */
    private $listFilmHeartStroke;
    
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Comment", mappedBy="user")
     */
    private $comments;

    

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     *
     * @return User
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set isBanished
     *
     * @param boolean $isBanished
     *
     * @return User
     */
    public function setIsBanished($isBanished)
    {
        $this->isBanished = $isBanished;

        return $this;
    }

    /**
     * Get isBanished
     *
     * @return bool
     */
    public function getIsBanished()
    {
        return $this->isBanished;
    }

    /**
     * Set dateBanishment
     *
     * @param \DateTime $dateBanishment
     *
     * @return User
     */
    public function setDateBanishment($dateBanishment)
    {
        $this->dateBanishment = $dateBanishment;

        return $this;
    }

    /**
     * Get dateBanishment
     *
     * @return \DateTime
     */
    public function getDateBanishment()
    {
        return $this->dateBanishment;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listFilmWatchLater = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add listFilmWatchLater
     *
     * @param \AppBundle\Entity\Film $listFilmWatchLater
     *
     * @return User
     */
    public function addListFilmWatchLater(\AppBundle\Entity\Film $listFilmWatchLater)
    {
        $this->listFilmWatchLater[] = $listFilmWatchLater;

        return $this;
    }

    /**
     * Remove listFilmWatchLater
     *
     * @param \AppBundle\Entity\Film $listFilmWatchLater
     */
    public function removeListFilmWatchLater(\AppBundle\Entity\Film $listFilmWatchLater)
    {
        $this->listFilmWatchLater->removeElement($listFilmWatchLater);
    }

    /**
     * Get listFilmWatchLater
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getListFilmWatchLater()
    {
        return $this->listFilmWatchLater;
    }

    /**
     * Add listFilmHeartStroke
     *
     * @param \AppBundle\Entity\Film $listFilmHeartStroke
     *
     * @return User
     */
    public function addListFilmHeartStroke(\AppBundle\Entity\Film $listFilmHeartStroke)
    {
        $this->listFilmHeartStroke[] = $listFilmHeartStroke;

        return $this;
    }

    /**
     * Remove listFilmHeartStroke
     *
     * @param \AppBundle\Entity\Film $listFilmHeartStroke
     */
    public function removeListFilmHeartStroke(\AppBundle\Entity\Film $listFilmHeartStroke)
    {
        $this->listFilmHeartStroke->removeElement($listFilmHeartStroke);
    }

    /**
     * Get listFilmHeartStroke
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getListFilmHeartStroke()
    {
        return $this->listFilmHeartStroke;
    }

    /**
     * Add comment
     *
     * @param \AppBundle\Entity\Comment $comment
     *
     * @return User
     */
    public function addComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \AppBundle\Entity\Comment $comment
     */
    public function removeComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
