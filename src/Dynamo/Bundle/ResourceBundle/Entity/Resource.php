<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 7.1.2017
 * Time: 12:31
 */

namespace Dynamo\Bundle\ResourceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dynamo\Bundle\PortalBundle\Entity\AddedByInterface;
use Dynamo\Bundle\PortalBundle\Entity\CreatedAtInterface;
use Dynamo\Bundle\PortalBundle\Entity\Traits\AddedByTrait;
use Dynamo\Bundle\PortalBundle\Entity\Traits\CreatedAtTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class Resource
 * @package Dynamo\Bundle\ResourceBundle\Entity
 * @ORM\Entity()
 * @ORM\Table(name="dynamo_resource")
 */
class Resource implements CreatedAtInterface, AddedByInterface
{
    use AddedByTrait;
    use CreatedAtTrait;

    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="file_name", type="string", length=255, nullable=false)
     */
    private $fileName;

    /**
     * @var string
     * @ORM\Column(name="dir", type="string", length=255, nullable=false)
     */
    private $dir;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var UploadedFile
     */
    private $file;

    /**
     * @return UploadedFile|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return string
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * @param string $dir
     */
    public function setDir($dir)
    {
        $this->dir = $dir;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}