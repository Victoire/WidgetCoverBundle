<?php

namespace Victoire\Widget\CoverBundle\EventSubscriber;

use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Victoire\Bundle\CoreBundle\Event\WidgetFlushedEvent;
use Victoire\Bundle\CoreBundle\VictoireCmsEvents;
use Victoire\Bundle\WidgetBundle\Event\WidgetFormEvents;
use Victoire\Bundle\WidgetBundle\Event\WidgetFormPostCreateEvent;
use Victoire\Widget\CoverBundle\Entity\WidgetCover;

/**
 * This class listen Widget Cover creation event.
 */
class CreateSubscriber implements EventSubscriberInterface
{
    private $entityManager;
    private $defaultStyles;

    /**
     * Constructor.
     *
     * @param EntityManager $entityManager
     * @param array         $defaultStyles
     */
    public function __construct(EntityManager $entityManager, array $defaultStyles)
    {
        $this->entityManager = $entityManager;
        $this->defaultStyles = $defaultStyles;
    }

    /**
     * @return string[] The subscribed events
     */
    public static function getSubscribedEvents()
    {
        return [
            WidgetFormEvents::POST_CREATE.'_COVER' => 'postCreate',
            VictoireCmsEvents::WIDGET_POST_FLUSH.'_COVER' => 'postFlush'
        ];
    }

    /**
     * Set default values for Widget responsive heights.
     *
     * @param WidgetFormPostCreateEvent $event
     */
    public function postCreate(WidgetFormPostCreateEvent $event)
    {
        /* @var $widget WidgetCover */
        $widget =  $event->getBuilder()->getData();

        $widget->setContainerHeightLG($this->defaultStyles['containerHeightLG']);
        $widget->setContainerHeightMD($this->defaultStyles['containerHeightMD']);
        $widget->setContainerHeightSM($this->defaultStyles['containerHeightSM']);
        $widget->setContainerHeightXS($this->defaultStyles['containerHeightXS']);
    }

    /**
     * Set View cssUpToDate to false to regenerate CSS.
     *
     * @param WidgetFlushedEvent $event
     */
    public function postFlush(WidgetFlushedEvent $event)
    {
        /* @var $widget WidgetCover */
        $view =  $event->getWidget()->getWidgetMap()->getView();
        $view->setCssUpToDate(false);

        $this->entityManager->flush();
    }
}
