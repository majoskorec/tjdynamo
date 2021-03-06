<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 7.1.2017
 * Time: 13:13
 */

namespace Dynamo\Bundle\ColonizationBundle\Form\Type;

use Dynamo\Bundle\ColonizationBundle\Entity\Colonization;
use Dynamo\Bundle\PortalBundle\Form\Type\DatePickerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ColonizationType
 * @package Dynamo\Bundle\ColonizationBundle\Form\Type
 */
class ColonizationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('place', TextType::class, [
            'label' => 'colonization.place',
        ]);
        $builder->add('map', TextType::class, [
            'label' => 'colonization.map',
            'required' => false,
        ]);
        $builder->add('dateFrom', DatePickerType::class, [
            'label' => 'colonization.date_from',
            'widget' => 'single_text',
            'html5' => false,
            'attr' => ['class' => 'js-datepicker'],
        ]);
        $builder->add('dateTo', DatePickerType::class, [
            'label' => 'colonization.date_to',
            'widget' => 'single_text',
            'html5' => false,
            'attr' => ['class' => 'js-datepicker'],
        ]);
        $builder->add('note', TextareaType::class, [
            'label' => 'colonization.note',
        ]);
        $builder->add('photos', CollectionType::class, [
            'label' => 'colonization.photos',
            'entry_type' => ColonizationPhotoType::class,
            'entry_options' => array(
                'label' => false,
            ),
            'allow_add' => true,
            'allow_delete' => true,
            'prototype' => true,
            'attr' => ['class' => 'colonization-photos',],
        ]);
        $builder->add('colonizers', null, [
            'label' => 'colonization.colonizers',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Colonization::class,
        ]);
    }
}