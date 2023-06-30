<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Default Route
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

// Main Route
$routes->get('/', 'Home::index');

// Login Route
$routes->get('login', 'Login::login');
$routes->get('forgot_password', 'Login::forgot_password');
$routes->get('logout', 'Login::logout');

// Register Route
$routes->get('register', 'Register::register');

// User Route
$routes->get('edit', 'User::edit');
$routes->get('profile', 'User::profile');
$routes->get('history', 'User::history');
$routes->get('report', 'User::report');

// Home Route
$routes->get('calendar', 'Home::calendar');
$routes->get('rule_use_room', 'Home::rule_use_room');

// Rooms Route
$routes->get('table', 'Rooms::table');
$routes->get('status_reservation', 'Rooms::status_reservation');

// Booking Route
$routes->get('reservation_mr', 'Booking::reservation_mr');

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}