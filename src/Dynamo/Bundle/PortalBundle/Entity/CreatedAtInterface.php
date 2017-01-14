<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 7.1.2017
 * Time: 12:38
 */

namespace Dynamo\Bundle\PortalBundle\Entity;

use DateTime;

/**
 * Interface CreatedAtInterface
 * @package Dynamo\Bundle\PortalBundle\Entity
 */
interface CreatedAtInterface
{
    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt = null);
}