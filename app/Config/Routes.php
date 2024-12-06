<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'authFilter']);
$routes->group("api", function ($routes) {
    $routes->post("register", "Register::index");
    $routes->post("login", "Login::index");
    $routes->get("users", "User::index", ['filter' => 'authFilter']);
    $routes->get("users", "User::index", ['filter' => 'authFilter']);
    $routes->get("version", "Version::index");
    $routes->resource('presensi', ['filter' => 'authFilter']);
});
