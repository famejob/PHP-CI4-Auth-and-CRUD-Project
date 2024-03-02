<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'Auth::show_register_page');
$routes->get('/login', 'Auth::show_login_page');
$routes->get('/forgot_password', 'Auth::show_forgot_password_page');
$routes->get('/reset_password/(:alphanum)', 'Auth::show_reset_password_page/$1');
$routes->get('/user_page/', 'User::index');
$routes->get('/search', 'User::search_product');
$routes->get('/logout', 'Auth::logout');
$routes->get('/product_list', 'Product::show_list_product', ['filter' => 'authGuard']);
$routes->get('/add_product_form', 'Product::show_add_product', ['filter' => 'authGuard']);
$routes->get('/view_product_detail/(:num)', 'Product::show_detail_product/$1', ['filter' => 'authGuard']);
$routes->get('/edit_product_form/(:num)', 'Product::show_edit_product/$1', ['filter' => 'authGuard']);
$routes->get('/delete_product/(:num)', 'Product::delete_product/$1', ['filter' => 'authGuard']);
$routes->get('/user_list', 'Admin::show_list_user', ['filter' => 'authGuard']);
$routes->get('/add_user_form', 'Admin::show_add_user', ['filter' => 'authGuard']);
$routes->get('/view_user_detail/(:num)', 'Admin::show_detail_user/$1', ['filter' => 'authGuard']);
$routes->get('/edit_user_form/(:num)', 'Admin::show_edit_user/$1', ['filter' => 'authGuard']);
$routes->get('/view_user_detail/(:num)', 'Admin::show_detail_user/$1', ['filter' => 'authGuard']);
$routes->get('/delete_user/(:num)', 'Admin::delete_user/$1', ['filter' => 'authGuard']);
$routes->post('/update_password', 'Auth::updatePassword');
$routes->post('/send_Email', 'Auth::send_Email');
$routes->post('/check_email_update', 'Admin::check_email_update');
$routes->post('/check_username_update', 'Admin::check_username_update');
$routes->post('/add_user', 'Admin::add_user');
$routes->post('/edit_user', 'Admin::update_user');
$routes->post('/add_product', 'Product::add_product');
$routes->post('/edit_product', 'Product::update_product');
$routes->post('/check_username_unique', 'Auth::check_username_unique');
$routes->post('/check_email_unique', 'Auth::check_email_unique');
$routes->post('/register_user', 'Auth::register_user');
$routes->post('/login_user', 'Auth::login_user');
