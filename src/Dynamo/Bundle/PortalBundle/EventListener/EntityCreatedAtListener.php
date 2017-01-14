<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 7.1.2017
 * Time: 12:42
 */

namespace Dynamo\Bundle\PortalBundle\EventListener;

use DateTime;
use DateTimeZone;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Dynamo\Bundle\PortalBundle\Entity\AddedByInterface;
use Dynamo\Bundle\PortalBundle\Entity\CreatedAtInterface;
use Dynamo\Bundle\UserBundle\Entity\User;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Class EntityCreatedAtListener
 * @package Dynamo\Bundle\PortalBundle\EventListener
 */
class EntityCreatedAtListener
{
    /** @var TokenStorageInterface */
    private $tokenStorage;

    /**
     * EntityCreatedAtListener constructor.
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $this->setCreatedAt($entity);
        $this->setAddedBy($entity);
    }

    /**
     * @param $entity
     */
    private function setAddedBy($entity)
    {
        if (!$entity instanceof AddedByInterface) {
            return;
        }
        $token = $this->tokenStorage->getToken();
        if (!$token) {
            throw new AccessDeniedException();
        }
        $user = $token->getUser();
        if (!$user instanceof User) {
            throw new AccessDeniedException();
        }
        $entity->setAddedBy($user);
    }

    /**
     * @param $entity
     */
    private function setCreatedAt($entity)
    {
        if (!$entity instanceof CreatedAtInterface) {
            return;
        }
        $entity->setCreatedAt(new DateTime('now', new DateTimeZone('Europe/Bratislava')));
    }
}