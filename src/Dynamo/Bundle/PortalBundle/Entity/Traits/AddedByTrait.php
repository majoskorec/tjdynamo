<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 7.1.2017
 * Time: 12:33
 */

namespace Dynamo\Bundle\PortalBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Dynamo\Bundle\UserBundle\Entity\User;

/**
 * Class AddedByTrait
 * @package Dynamo\Bundle\PortalBundle\Entity\Traits
 */
trait AddedByTrait
{
    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="Dynamo\Bundle\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="added_by", referencedColumnName="id", nullable=false)
     */
    private $addedBy;

    /**
     * @return User
     */
    public function getAddedBy()
    {
        return $this->addedBy;
    }

    /**
     * @param User $addedBy
     */
    public function setAddedBy(User $addedBy)
    {
        $this->addedBy = $addedBy;
    }
}