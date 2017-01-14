<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 7.1.2017
 * Time: 12:18
 */

namespace Dynamo\Bundle\ColonizationBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Dynamo\Bundle\PortalBundle\Entity\AddedByInterface;
use Dynamo\Bundle\PortalBundle\Entity\CreatedAtInterface;
use Dynamo\Bundle\PortalBundle\Entity\Traits\AddedByTrait;
use Dynamo\Bundle\PortalBundle\Entity\Traits\CreatedAtTrait;

/**
 * Class Colonization
 * @package Dynamo\Bundle\ColonizationBundle\Entity
 * @ORM\Entity()
 * @ORM\Table(name="dynamo_colonization")
 */
class Colonization implements CreatedAtInterface, AddedByInterface
{
    use AddedByTrait;
    use CreatedAtTrait;

    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="place", type="string", length=255, nullable=true)
     */
    private $place;

    /**
     * @var string
     * @ORM\Column(name="map", type="string", length=255, nullable=true)
     */
    private $map;

    /**
     * @var DateTime
     * @ORM\Column(name="date_from", type="date", nullable=false)
     */
    private $dateFrom;

    /**
     * @var DateTime
     * @ORM\Column(name="date_to", type="date", nullable=false)
     */
    private $dateTo;

    /**
     * @var string
     * @ORM\Column(name="note", type="text")
     */
    private $note;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Dynamo\Bundle\ResourceBundle\Entity\Resource")
     * @ORM\JoinTable(
     *  name="dynamo_colonization_resource",
     *  joinColumns={
     *      @ORM\JoinColumn(name="colonization_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="resource_id", referencedColumnName="id")
     *  }
     * )
     */
    private $photos;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Dynamo\Bundle\UserBundle\Entity\User")
     * @ORM\JoinTable(
     *  name="dynamo_colonization_user",
     *  joinColumns={
     *      @ORM\JoinColumn(name="colonization_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *  }
     * )
     */
    private $colonizers;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param string $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return string
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * @param string $map
     */
    public function setMap($map)
    {
        $this->map = $map;
    }

    /**
     * @return DateTime
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    /**
     * @param DateTime $dateFrom
     */
    public function setDateFrom(DateTime $dateFrom)
    {
        $this->dateFrom = $dateFrom;
    }

    /**
     * @return DateTime
     */
    public function getDateTo()
    {
        return $this->dateTo;
    }

    /**
     * @param DateTime $dateTo
     */
    public function setDateTo(DateTime $dateTo)
    {
        $this->dateTo = $dateTo;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return ArrayCollection
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @param ArrayCollection $photos
     */
    public function setPhotos(ArrayCollection $photos)
    {
        $this->photos = $photos;
    }

    /**
     * @return ArrayCollection
     */
    public function getColonizers()
    {
        return $this->colonizers;
    }

    /**
     * @param ArrayCollection $colonizers
     */
    public function setColonizers(ArrayCollection $colonizers)
    {
        $this->colonizers = $colonizers;
    }
}