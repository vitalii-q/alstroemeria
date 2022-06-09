<?php
/**
 * App routes
 */

/**
 * TODO: групирование роутов $this->router->group(['middleware' => 'Auth', 'prefix' => 'admin'], [...]);
 */

/*$this->router->group(['middleware' => 'Auth', 'prefix' => 'admin'], [
    ['login', '/login', 'Auth\LoginController:index'],
    ['login', '/login', 'Auth\LoginController:index'],
    ['login', '/login', 'Auth\LoginController:index'],
]);*/

// auth
$this->router->add('login_page', '/login', 'Auth\LoginController:index');
$this->router->add('login', '/login/in', 'Auth\LoginController:login', 'POST');
$this->router->add('logout', '/login/logout', 'Auth\LoginController:logout');

$this->router->add('registration', '/registration', 'Auth\RegController:index');
$this->router->add('add_user', '/registration/reg', 'Auth\RegController:registration', 'POST');

// admin panel
$this->router->add('admin', '/admin', 'Admin\AdminController:index');

// site routes
$this->router->add('home', '/', 'HomeController:index');

$this->router->add('catalog', '/catalog', 'CatalogController:index');

$this->router->add('blog', '/blog', 'BlogController:index');
$this->router->add('blog_article', '/blog/{article}', 'BlogController:article');


