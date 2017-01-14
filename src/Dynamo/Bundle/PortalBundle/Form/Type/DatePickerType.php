<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 8.1.2017
 * Time: 13:48
 */

namespace Dynamo\Bundle\PortalBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

/**
 * Class DatePickerType
 * @package Dynamo\Bundle\PortalBundle\Form\Type
 */
class DatePickerType extends AbstractType
{
    /**
     * @inheritdoc
     */
    public function getParent()
    {
        return DateType::class;
    }
}