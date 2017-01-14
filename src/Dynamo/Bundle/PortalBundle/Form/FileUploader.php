<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 14.1.2017
 * Time: 14:34
 */

namespace Dynamo\Bundle\PortalBundle\Form;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class FileUploader
 * @package Dynamo\Bundle\PortalBundle\Form
 */
class FileUploader
{
    /** @var string */
    private $webRoot;

    /** @var string */
    private $targetDir;

    /**
     * FileUploader constructor.
     * @param string $webRoot
     * @param string $targetDir
     */
    public function __construct($webRoot, $targetDir)
    {
        $this->webRoot = $webRoot;
        $this->targetDir = $targetDir;
    }

    /**
     * @param UploadedFile $file
     * @param null|string $targetDir
     * @param null|string $fileName
     * @return string
     */
    public function upload(UploadedFile $file, $targetDir = null, $fileName = null)
    {
        $targetDir = $targetDir ?: $this->targetDir;
        $fileName = $fileName ?: md5(uniqid()) . '.' . $file->guessExtension();

        $file->move($this->webRoot . $targetDir, $fileName);

        return $fileName;
    }
}