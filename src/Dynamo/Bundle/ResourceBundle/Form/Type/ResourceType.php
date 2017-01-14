<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 8.1.2017
 * Time: 16:30
 */

namespace Dynamo\Bundle\ResourceBundle\Form\Type;

use Dynamo\Bundle\ResourceBundle\Entity\Resource;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ResourceType
 * @package Dynamo\Bundle\ResourceBundle\Form\Type
 */
class ResourceType extends AbstractType
{
    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file', FileType::class);
        $builder->add('title', TextType::class);
    }

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Resource::class,
        ));
    }
}