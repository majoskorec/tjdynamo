<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 8.1.2017
 * Time: 14:58
 */

namespace Dynamo\Bundle\PortalBundle\Entity;

use Dynamo\Bundle\UserBundle\Entity\User;

/**
 * Interface AddedByInterface
 * @package Dynamo\Bundle\PortalBundle\Entity
 */
interface AddedByInterface
{
    /**
     * @param User $addedBy
     */
    public function setAddedBy(User $addedBy);
}