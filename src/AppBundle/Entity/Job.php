<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Table(name="job")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JobRepository")
 */
class Job
{
    const STATUS_OPEN = 0;
    const STATUS_DONE = 1;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @JMS\Expose
     * @JMS\Groups({"default", "list"})
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     *
     * @JMS\Expose
     * @JMS\Groups({"default", "list"})
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(type="integer")
     *
     * @JMS\Expose
     * @JMS\Groups({"default", "list"})
     */
    protected $status = self::STATUS_OPEN;

     /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     *
     * @JMS\Expose
     * @JMS\Groups({"default", "list"})
     */
    protected $userid;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

     /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserid()
    {
        return $this->id;
    }

    /**
     * @param int $userid
     *
     * @return self
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }
}
