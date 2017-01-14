<?php
/**
 * Created by PhpStorm.
 * User: majoskorec
 * Date: 6.1.2017
 * Time: 19:09
 */

namespace Dynamo\Bundle\PortalBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Class Builder
 * @package Dynamo\Bundle\PortalBundle\Menu
 */
class Builder
{
    /** @var FactoryInterface */
    private $factory;

    /** @var TranslatorInterface */
    private $translator;

    /**
     * Builder constructor.
     * @param FactoryInterface $factory
     * @param TranslatorInterface $translator
     */
    public function __construct(FactoryInterface $factory, TranslatorInterface $translator)
    {
        $this->factory = $factory;
        $this->translator = $translator;
    }

    /**
     * @param array $options
     * @return ItemInterface
     */
    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');
//        $menu->addChild('Projects', array('route' => 'dynamo_portal_default_twopercent'))
//            ->setAttribute('icon', 'fa fa-list');
//        $menu->addChild('Employees', array('route' => 'dynamo_portal_default_twopercent'))
//            ->setAttribute('icon', 'fa fa-group');

        $menu->addChild($this->translator->trans('menu.calendar'), [
            'route' => 'dynamo_portal_default_twopercent'
        ]);
        $menu->addChild($this->translator->trans('menu.profile'), [
            'route' => 'dynamo_portal_default_twopercent'
        ]);
        $menu->addChild($this->translator->trans('menu.chat'), [
            'route' => 'dynamo_portal_chat_index'
        ]);
        $menu->addChild($this->translator->trans('menu.members'), [
            'route' => 'dynamo_user_user_list'
        ]);
        $menu->addChild($this->translator->trans('menu.statistics'), [
            'route' => 'dynamo_portal_default_twopercent'
        ]);
        $menu->addChild($this->translator->trans('menu.colonizator'), [
            'route' => 'dynamo_colonization_colonization_index'
        ]);
        $menu->addChild($this->translator->trans('menu.two-percent'), [
            'route' => 'dynamo_portal_default_twopercent'
        ]);
        $menu->addChild($this->translator->trans('menu.archive'), [
            'route' => 'dynamo_portal_default_twopercent'
        ]);
        $menu->addChild($this->translator->trans('menu.log'), [
            'route' => 'dynamo_portal_default_twopercent'
        ]);

//        // access services from the container!
//        $em = $this->container->get('doctrine')->getManager();
//        // findMostRecent and Blog are just imaginary examples
//        $blog = $em->getRepository('AppBundle:Blog')->findMostRecent();
//
//        $menu->addChild('Latest Blog Post', array(
//            'route' => 'blog_show',
//            'routeParameters' => array('id' => $blog->getId())
//        ));

//        // create another menu item
//        $menu->addChild('About Me', array('route' => 'about'));
//        // you can also add sub level's to your menu's as follows
//        $menu['About Me']->addChild('Edit profile', array('route' => 'edit_profile'));

        // ... add more children

        return $menu;
    }
}