<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 6.1.2017
 * Time: 22:45
 */

namespace Dynamo\Bundle\UserBundle\Model;

/**
 * Class Membership
 * @package Dynamo\Bundle\UserBundle\Model
 */
class Membership
{
    const REGULAR = 'memberRIAD';
    const OCCASIONAL = 'memberPRIZ';
    const SYMPATHIZER = 'memberSYMP';

    /**
     * @return array
     */
    public function getMemberships()
    {
        return [
            self::REGULAR,
            self::OCCASIONAL,
            self::SYMPATHIZER,
        ];
    }

}