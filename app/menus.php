<?php

$leftMenu = Menu::instance('admin-menu');

$rightMenu = Menu::instance('admin-menu-right');

/**
 * @see https://github.com/pingpong-labs/menus
 * 
 * @example adding additional menu.
 *
 * $leftMenu->url('your-url', 'The Title');
 * 
 * $leftMenu->route('your-route', 'The Title');
 */
$menu = Menu::create('admin-menu', function ($menu)
{
    $menu->setPresenter('Pingpong\Admin\Presenters\SidebarMenuPresenter');
    $menu->route('admin.home', 'Хяналтын самбар', [], ['icon' => 'fa fa-dashboard']);
    $menu->dropdown('Аялал', function ($sub)
    {
        $sub->route('admin.tours.index', 'Аялалын жагсаалт');
        $sub->route('admin.tours.create', 'Шинээр нэмэх');
        $sub->route('admin.tour_categories.index', 'Ангилал');
    }, ['icon' => 'fa fa-map-marker']);
    $menu->dropdown('Мэдээ, мэдээлэл', function ($sub)
    {
        $sub->route('admin.articles.index', 'Мэдээний жагсаалт');
        $sub->route('admin.articles.create', 'Шинээр нэмэх');
        $sub->divider();
        $sub->route('admin.categories.index', 'Ангилалууд');
    }, ['icon' => 'fa fa-book']);
    $menu->dropdown('Хуудсууд', function ($sub)
    {
        $sub->route('admin.pages.index', 'Хуудсын жагсаалт');
        $sub->route('admin.pages.create', 'Шинээр нэмэх');
    }, ['icon' => 'fa fa-flag']);
    $menu->dropdown('Хэрэглэгчид', function ($sub)
    {
        $sub->route('admin.users.index', 'Хэрэглэгчдийн жагсаалт');
        $sub->route('admin.users.create', 'Шинээр нэмэх');
        $sub->divider();
        $sub->route('admin.roles.index', 'Хэрэглэгчийн төрөл');
        $sub->route('admin.permissions.index', 'Эрх');
    }, ['icon' => 'fa fa-users']);
});