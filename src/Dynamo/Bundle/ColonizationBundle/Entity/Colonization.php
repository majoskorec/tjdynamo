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
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Regex("/^\-?\d+(\.\d+)?, \-?\d+(\.\d+)?$/")
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
     * @ORM\ManyToMany(targetEntity="Dynamo\Bundle\ResourceBundle\Entity\Resource", cascade={"all"})
     * @ORM\JoinTable(
     *  name="dynamo_colonization_resource",
     *  joinColumns={
     *      @ORM\JoinColumn(name="colonization_id", referencedColumnName="id", onDelete="CASCADE")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="resource_id", referencedColumnName="id", onDelete="CASCADE")
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
     * @return bool
     */
    public function isCorrectMap()
    {
        return (bool) preg_match('/^\-?\d+(\.\d+)?, \-?\d+(\.\d+)?$/', $this->map);
    }

    /**
     * @return mixed
     */
    public function getMapLat()
    {
        list($lat, $lng) = preg_split("/, /", $this->map);
        return $lat;
    }

    /**
     * @return mixed
     */
    public function getMapLng()
    {
        list($lat, $lng) = preg_split("/, /", $this->map);
        return $lng;
    }

    /**
     * @return bool
     */
    public function isOneDay()
    {
        return $this->dateFrom == $this->dateTo;
    }

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
    public function setPhotos($photos)
    {
        if ($photos instanceof ArrayCollection) {
            $this->photos = $photos;
            return;
        }
        if (is_array($photos)) {
            $this->photos = new ArrayCollection($photos);
            return;
        }
        throw new \InvalidArgumentException(
            sprintf("%s expected array or ArrayCollection, got %s", __METHOD__, get_class($photos))
        );
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