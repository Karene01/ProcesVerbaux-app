<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/todo' => [[['_route' => 'home', '_controller' => 'App\\Controller\\TodoController::indexAction'], null, ['GET' => 0], null, true, false, null]],
        '/todo/list' => [[['_route' => 'todo_list', '_controller' => 'App\\Controller\\TodoController::listAction'], null, ['GET' => 0], null, false, false, null]],
        '/todo/index' => [[['_route' => 'todo_index', '_controller' => 'App\\Controller\\TodoController::listAction'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/todo/(\\d+)(*:53)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        53 => [
            [['_route' => 'todo_show', '_controller' => 'App\\Controller\\TodoController::showAction'], ['id'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
