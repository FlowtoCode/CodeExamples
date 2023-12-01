<?php

declare(strict_types=1);

namespace Florian\GymManager\Controller;

use Florian\GymManager\Domain\Model\Event;
use Florian\GymManager\Domain\Repository\EventRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException;

class EventController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * @var EventRepository|null
     */
    protected ?EventRepository$eventRepository = null;

    /**
     * @param EventRepository $eventRepository
     */
    public function injectEventRepository(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * @return ResponseInterface
     */
    public function listAction(): ResponseInterface
    {
        $events = $this->eventRepository->findAll();
        $this->view->assign('events', $events);
        return $this->htmlResponse();
    }

    /**
     * @param Event $event
     * @return ResponseInterface
     * @throws NoSuchArgumentException
     */
    public function showAction(Event $event): ResponseInterface
    {
        $gym = $this->request->getArgument('gym');
        $this->view->assign('event', $event);
        $this->view->assign('gym', $gym);
        return $this->htmlResponse();
    }
}
