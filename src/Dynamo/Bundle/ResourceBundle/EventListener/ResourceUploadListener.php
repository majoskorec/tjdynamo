<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 14.1.2017
 * Time: 14:41
 */

namespace Dynamo\Bundle\ResourceBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Dynamo\Bundle\PortalBundle\Form\FileUploader;
use Dynamo\Bundle\ResourceBundle\Entity\Resource;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class ResourceUploadListener
 * @package Dynamo\Bundle\ResourceBundle\EventListener
 */
class ResourceUploadListener
{
    /** @var FileUploader */
    private $uploader;

    /**
     * ResourceUploadListener constructor.
     * @param FileUploader $uploader
     */
    public function __construct(FileUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    /**
     * @param PreUpdateEventArgs $args
     */
    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    /**
     * @param $entity
     */
    private function uploadFile($entity)
    {
        if (!$entity instanceof Resource) {
            return;
        }

        $file = $entity->getFile();

        // only upload new files
        if (!$file instanceof UploadedFile) {
            return;
        }

        $fileName = $this->uploader->upload($file, $entity->getDir());
        $entity->setFileName($fileName);
    }
}