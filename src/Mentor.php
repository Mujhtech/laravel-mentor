<?php

namespace Mujhtech\LaravelMentor;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Events\Dispatcher;

class Mentor {

    protected $menu;

    /**
     * The array of menu filters. These filters will apply on each one of the
     * menu items in order to transforms they in some way.
     *
     * @var array
     */
    protected $filters;

    /**
     * The events dispatcher.
     *
     * @var Dispatcher
     */
    protected $events;

    /**
     * The application service container.
     *
     * @var Container
     */
    protected $container;


    protected $menuFilterMap;


    public function __construct(array $filters, Dispatcher $events, Container $container)
    {
        $this->filters = $filters;
        $this->events = $events;
        $this->container = $container;

        // Fill the map of filters methods.

        //$this->menuFilterMap = [
           // 'sidebar'      => [$this, 'sidebarFilter'],
            //'navbar-left'  => [$this, 'navbarLeftFilter'],
            //'navbar-right' => [$this, 'navbarRightFilter'],
            //'navbar-user'  => [$this, 'navbarUserMenuFilter'],
        //];
    }
}