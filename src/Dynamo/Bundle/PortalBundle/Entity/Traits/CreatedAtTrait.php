<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 6.1.2017
 * Time: 17:28
 */

namespace Dynamo\Bundle\PortalBundle\Entity\Traits;

use \DateTime;
use \DateTimeZone;

/**
 * Class CreatedAtTrait
 * @package Dynamo\Bundle\PortalBundle\Entity\Traits
 */
trait CreatedAtTrait
{
    /**
     * @var DateTime
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    protected $createdAt;

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt = null)
    {
        $this->createdAt = $createdAt ?: new DateTime('now', new DateTimeZone('Europe/Bratislava'));
    }
}
