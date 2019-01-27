<?php

namespace AppBundle\Form\FilterType\Model;

use Symfony\Component\Validator\Constraints as Assert;

class UserFilter
{
    const LIMIT = 30;

    const DEFAULT_PAGE = 1;
    const DEFAULT_ORDER_KEY = 'id';
    const DEFAULT_ORDER_DIRECTION = 'DESC';

    /**
     * @var int
     *
     * @Assert\Type(type="integer")
     */
    protected $page;

    /**
     * @var int
     *
     * @Assert\Type(type="integer")
     * @Assert\Range(min=1, max=30)
     */
    protected $limit;

    /**
     * @var string
     *
     * @Assert\Type(type="string")
     * @Assert\Length(min=1, max=30)
     */
    protected $keyword;

    /**
     * @var string
     *
     * @Assert\Choice(
     *     callback = "getOrderKeys"
     * )
     */
    protected $orderKey;

    /**
     * @var string
     *
     * @Assert\Choice(
     *     callback = "getOrderDirections"
     * )
     */
    protected $orderDirection;

    /**
     * @var array
     *
     * @Assert\Choice(
     *     callback = "getPossibleSerialisationGroups",
     *     multiple = true
     * )
     */
    protected $serialisationGroups;

    /**
     * @var string
     *
     * @Assert\Type(type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @Assert\Type(type="string")
     */
    protected $email;

    /**
    *
    * @var int
    *
    * @Assert\type(type="integer")
    **/
    protected $jobid;

    /**
     * @return array
     */
    public static function getOrderKeys()
    {
        return ['id'];
    }

    /**
     * @return array
     */
    public static function getOrderDirections()
    {
        return [-1, 1];
    }

    /**
     * @return string
     */
    public function getName()
    {
      return $this->name;
    }

    /**
     * @param string $name
     *
     * @return self
     */
     public function setName($name)
     {
        $this->name = $name;

        return $this;
     }

     /**
      * @return string
      */
     public function getEmail()
     {
       return $this->email;
     }

     /**
      * @param string $email
      *
      * @return self
      */
      public function setEmail($email)
      {
         $this->email = $email;

         return $this;
      }
     /**
      * @return int
      */
      public function getJobId()
      {
        return $this->jobid;
      }

      /**
       * @param int $jobid
       *
       * @return self
       */
       public function setJobId($jobid)
       {
          $this->jobid = $jobid;

          return $this;
       }

    /**
     * @return array
     */
    public static function getPossibleSerialisationGroups()
    {
        return ['user', 'default', 'email', 'jobid'];
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page ? $this->page : self::DEFAULT_PAGE;
    }

    /**
     * @param int $page
     *
     * @return self
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderKey()
    {
        return $this->orderKey ? $this->orderKey : self::DEFAULT_ORDER_KEY;
    }

    /**
     * @param string $orderKey
     *
     * @return self
     */
    public function setOrderKey($orderKey)
    {
        $this->orderKey = $orderKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderDirection()
    {
        return empty($this->orderDirection) || $this->orderDirection == -1 ? 'DESC' : 'ASC';
    }

    /**
     * @param string $orderDirection
     *
     * @return self
     */
    public function setOrderDirection($orderDirection)
    {
        $this->orderDirection = $orderDirection;

        return $this;
    }

    /**
     * @return string
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @param string $keyword
     *
     * @return self
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return empty($this->limit) || $this->limit > self::LIMIT ? self::LIMIT : $this->limit;
    }

    /**
     * @param int $limit
     *
     * @return self
     */
    public function setLimit($limit)
    {
        $this->limit = $limit > self::LIMIT ? self::LIMIT : $limit;

        return $this;
    }

    /**
     * @return array
     */
    public function getSerialisationGroups()
    {
        return !empty($this->serialisationGroups) ? $this->serialisationGroups : ['default'];
    }

    /**
     * @param string $serialisationGroups
     *
     * @return array
     */
    public function setSerialisationGroups($serialisationGroups)
    {
        $this->serialisationGroups = $serialisationGroups;

        return $this;
    }
}
