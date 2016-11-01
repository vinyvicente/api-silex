<?php

namespace Api;

use Silex\Application;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class Service
 * @package Api
 */
class Service extends EventDispatcher
{
    /**
     * @var Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @param string $eventName
     * @param Event|null $event
     * @return Event
     */
    public function dispatch($eventName, Event $event = null)
    {
        return parent::dispatch($eventName, $event);
    }
}
