<?php

namespace Mujhtech\LaravelMentor;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Events\Dispatcher;
use Mujhtech\LaravelMentor\Helpers\MenuItemHelper;
use Mujhtech\LaravelMentor\Menu\Builder;
use Mujhtech\LaravelMentor\Events\BuildingMenu;

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

        $this->menuFilterMap = [
            'sidebar'      => [$this, 'sidebarFilter'],
            'navbar-left'  => [$this, 'navbarLeftFilter'],
            'navbar-right' => [$this, 'navbarRightFilter'],
            'navbar-user'  => [$this, 'navbarUserMenuFilter'],
        ];
    }


    public function menu($filterToken = null)
    {
        if (empty($this->menu)) {
            $this->menu = $this->buildMenu();
        }

        // Check for filter token.

        if (isset($this->menuFilterMap[$filterToken])) {
            return array_filter(
                $this->menu,
                $this->menuFilterMap[$filterToken]
            );
        }

        // No filter token provided, return the complete menu.

        return $this->menu;
    }

    /**
     * Build the menu.
     *
     * @return array The set of menu items
     */
    protected function buildMenu()
    {
        // Create the menu builder instance.

        $builder = new Builder($this->buildFilters());

        // Dispatch the BuildingMenu event. Listeners of this event will fill
        // the menu.

        $this->events->dispatch(new BuildingMenu($builder));

        // Return the set of menu items.

        return $builder->menu;
    }

    /**
     * Build the menu filters.
     *
     * @return array The set of filters that will apply on each menu item
     */
    protected function buildFilters()
    {
        return array_map([$this->container, 'make'], $this->filters);
    }

    /**
     * Filter method used to get the sidebar menu items.
     *
     * @param mixed $item A menu item
     * @return bool
     */
    private function sidebarFilter($item)
    {
        return MenuItemHelper::isSidebarItem($item);
    }

    /**
     * Filter method used to get the top navbar left menu items.
     *
     * @param mixed $item A menu item
     * @return bool
     */
    private function navbarLeftFilter($item)
    {
        if (MenuItemHelper::isSidebarItem($item)) {
            return MenuItemHelper::isValidNavbarItem($item);
        }

        return MenuItemHelper::isNavbarLeftItem($item);
    }

    /**
     * Filter method used to get the top navbar right menu items.
     *
     * @param mixed $item A menu item
     * @return bool
     */
    private function navbarRightFilter($item)
    {
        return MenuItemHelper::isNavbarRightItem($item);
    }

    /**
     * Filter method used to get the navbar user menu items.
     *
     * @param mixed $item A menu item
     * @return bool
     */
    private function navbarUserMenuFilter($item)
    {
        return MenuItemHelper::isNavbarUserItem($item);
    }
}