<?php

namespace Dynamo\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class DynamoUserBundle
 * @package Dynamo\Bundle\UserBundle
 */
class DynamoUserBundle extends Bundle
{
    /**
     * @inheritdoc
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
