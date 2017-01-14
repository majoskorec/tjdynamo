<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 14.1.2017
 * Time: 14:47
 */

namespace Dynamo\Bundle\ColonizationBundle\Form\Type;

use Dynamo\Bundle\ResourceBundle\Form\Type\ResourceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

/**
 * Class ColonizationPhotoType
 * @package Dynamo\Bundle\ColonizationBundle\Form\Type
 */
class ColonizationPhotoType extends AbstractType
{
    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add("file", FileType::class, [
            "constraints" => new File(["mimeTypes" => "image/jpeg", "maxSize" => "2M"]),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults(['upload_dir' => '/photos/colonizations']);
    }

    /**
     * @inheritdoc
     */
    public function getParent()
    {
        return ResourceType::class;
    }
}