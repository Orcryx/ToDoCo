<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin' => [[['_route' => 'app_admin', '_controller' => 'App\\Controller\\AdminController::index'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/verify/email' => [[['_route' => 'app_verify_email', '_controller' => 'App\\Controller\\RegistrationController::verifyUserEmail'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/taskall/task' => [[['_route' => 'task_list', '_controller' => 'App\\Controller\\TaskController::index'], null, ['GET' => 0], null, false, false, null]],
        '/task/new' => [[['_route' => 'app_task_new', '_controller' => 'App\\Controller\\TaskController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/task' => [[['_route' => 'user_task_list', '_controller' => 'App\\Controller\\TaskController::list'], null, ['GET' => 0], null, false, false, null]],
        '/user' => [[['_route' => 'app_user', '_controller' => 'App\\Controller\\UserController::index'], null, null, null, false, false, null]],
        '/profile' => [[['_route' => 'app_profile', '_controller' => 'App\\Controller\\UserController::update'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/task/([^/]++)(?'
                    .'|(*:24)'
                    .'|/(?'
                        .'|edit(*:39)'
                        .'|toggle(*:52)'
                    .')'
                    .'|(*:60)'
                .')'
                .'|/user/([^/]++)/edit(*:87)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        24 => [[['_route' => 'app_task_show', '_controller' => 'App\\Controller\\TaskController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        39 => [[['_route' => 'app_task_edit', '_controller' => 'App\\Controller\\TaskController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        52 => [[['_route' => 'task_toggle', '_controller' => 'App\\Controller\\TaskController::toggle'], ['id'], ['POST' => 0], null, false, false, null]],
        60 => [[['_route' => 'app_task_delete', '_controller' => 'App\\Controller\\TaskController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        87 => [
            [['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], null, null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
