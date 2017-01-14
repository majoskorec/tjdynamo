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
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\EqualTo;

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
        $builder->add('title', TextType::class);
        $builder->add('file', FileType::class);
        $builder->add('dir', HiddenType::class, [
            'data' => $options['upload_dir'],
            'constraints' => new EqualTo(["value" => $options['upload_dir']]),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Resource::class,
        ]);
    }
}