<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin/todo' => [[['_route' => '_todo_index', '_locale' => 'en', '_controller' => 'App\\Controller\\Admin\\TodoCrudController::index', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TodoCrudController', 'crudAction' => 'index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/todo/new' => [[['_route' => '_todo_new', '_locale' => 'en', '_controller' => 'App\\Controller\\Admin\\TodoCrudController::new', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TodoCrudController', 'crudAction' => 'new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/todo/batch-delete' => [[['_route' => '_todo_batch_delete', '_locale' => 'en', '_controller' => 'App\\Controller\\Admin\\TodoCrudController::batchDelete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TodoCrudController', 'crudAction' => 'batchDelete'], null, ['POST' => 0], null, false, false, null]],
        '/admin/todo/autocomplete' => [[['_route' => '_todo_autocomplete', '_locale' => 'en', '_controller' => 'App\\Controller\\Admin\\TodoCrudController::autocomplete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TodoCrudController', 'crudAction' => 'autocomplete'], null, ['GET' => 0], null, false, false, null]],
        '/admin/todo/render-filters' => [[['_route' => '_todo_render_filters', '_locale' => 'en', '_controller' => 'App\\Controller\\Admin\\TodoCrudController::renderFilters', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TodoCrudController', 'crudAction' => 'renderFilters'], null, ['GET' => 0], null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'app_admin_dashboard_index', '_controller' => 'App\\Controller\\Admin\\DashboardController::index'], null, null, null, false, false, null]],
        '/assemblee/generale' => [[['_route' => 'app_assemblee_generale_index', '_controller' => 'App\\Controller\\AssembleeGeneraleController::index'], null, ['GET' => 0], null, false, false, null]],
        '/assemblee/generale/new' => [[['_route' => 'app_assemblee_generale_new', '_controller' => 'App\\Controller\\AssembleeGeneraleController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/coproprietaire' => [[['_route' => 'app_coproprietaire_index', '_controller' => 'App\\Controller\\CoproprietaireController::index'], null, ['GET' => 0], null, false, false, null]],
        '/coproprietaire/new' => [[['_route' => 'app_coproprietaire_new', '_controller' => 'App\\Controller\\CoproprietaireController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/copropriete' => [[['_route' => 'app_copropriete_index', '_controller' => 'App\\Controller\\CoproprieteController::index'], null, ['GET' => 0], null, false, false, null]],
        '/copropriete/new' => [[['_route' => 'app_copropriete_new', '_controller' => 'App\\Controller\\CoproprieteController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/participation' => [[['_route' => 'app_participation_index', '_controller' => 'App\\Controller\\ParticipationController::index'], null, ['GET' => 0], null, false, false, null]],
        '/participation/new' => [[['_route' => 'app_participation_new', '_controller' => 'App\\Controller\\ParticipationController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/question/a/discuter' => [[['_route' => 'app_question_a_discuter_index', '_controller' => 'App\\Controller\\QuestionADiscuterController::index'], null, ['GET' => 0], null, true, false, null]],
        '/question/a/discuter/new' => [[['_route' => 'app_question_a_discuter_new', '_controller' => 'App\\Controller\\QuestionADiscuterController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/question/a/voter' => [[['_route' => 'app_question_a_voter_index', '_controller' => 'App\\Controller\\QuestionAVoterController::index'], null, ['GET' => 0], null, true, false, null]],
        '/question/a/voter/new' => [[['_route' => 'app_question_a_voter_new', '_controller' => 'App\\Controller\\QuestionAVoterController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/question' => [[['_route' => 'app_question_index', '_controller' => 'App\\Controller\\QuestionController::index'], null, ['GET' => 0], null, false, false, null]],
        '/question/new' => [[['_route' => 'app_question_new', '_controller' => 'App\\Controller\\QuestionController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/vote' => [[['_route' => 'app_vote_index', '_controller' => 'App\\Controller\\VoteController::index'], null, ['GET' => 0], null, false, false, null]],
        '/vote/new' => [[['_route' => 'app_vote_new', '_controller' => 'App\\Controller\\VoteController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/a(?'
                    .'|dmin/todo/([^/]++)(?'
                        .'|/(?'
                            .'|edit(*:41)'
                            .'|delete(*:54)'
                        .')'
                        .'|(*:62)'
                    .')'
                    .'|ssemblee/generale/([^/]++)(?'
                        .'|(*:99)'
                        .'|/(?'
                            .'|edit(*:114)'
                            .'|ouvrir(*:128)'
                            .'|clore(*:141)'
                        .')'
                        .'|(*:150)'
                    .')'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:191)'
                    .'|wdt/([^/]++)(*:211)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:253)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:290)'
                                .'|router(*:304)'
                                .'|exception(?'
                                    .'|(*:324)'
                                    .'|\\.css(*:337)'
                                .')'
                            .')'
                            .'|(*:347)'
                        .')'
                    .')'
                .')'
                .'|/copropriet(?'
                    .'|aire/([^/]++)(?'
                        .'|(*:388)'
                        .'|/edit(*:401)'
                        .'|(*:409)'
                    .')'
                    .'|e/([^/]++)(?'
                        .'|(*:431)'
                        .'|/edit(*:444)'
                        .'|(*:452)'
                    .')'
                .')'
                .'|/participation/(?'
                    .'|([^/]++)(?'
                        .'|(*:491)'
                        .'|/edit(*:504)'
                        .'|(*:512)'
                    .')'
                    .'|assemblee/([^/]++)/(?'
                        .'|p(?'
                            .'|resence/add(*:558)'
                            .'|articipations(*:579)'
                        .')'
                        .'|representation/add(*:606)'
                    .')'
                .')'
                .'|/question/(?'
                    .'|a/(?'
                        .'|discuter/([^/]++)(?'
                            .'|(*:654)'
                            .'|/edit(*:667)'
                            .'|(*:675)'
                        .')'
                        .'|voter/([^/]++)(?'
                            .'|(*:701)'
                            .'|/edit(*:714)'
                            .'|(*:722)'
                        .')'
                    .')'
                    .'|([^/]++)(?'
                        .'|(*:743)'
                        .'|/edit(*:756)'
                        .'|(*:764)'
                    .')'
                .')'
                .'|/vote/([^/]++)(?'
                    .'|(*:791)'
                    .'|/edit(*:804)'
                    .'|(*:812)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        41 => [[['_route' => '_todo_edit', '_locale' => 'en', '_controller' => 'App\\Controller\\Admin\\TodoCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TodoCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        54 => [[['_route' => '_todo_delete', '_locale' => 'en', '_controller' => 'App\\Controller\\Admin\\TodoCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TodoCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        62 => [[['_route' => '_todo_detail', '_locale' => 'en', '_controller' => 'App\\Controller\\Admin\\TodoCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TodoCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        99 => [[['_route' => 'app_assemblee_generale_show', '_controller' => 'App\\Controller\\AssembleeGeneraleController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        114 => [[['_route' => 'app_assemblee_generale_edit', '_controller' => 'App\\Controller\\AssembleeGeneraleController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        128 => [[['_route' => 'assemblee_generale_ouvrir', '_controller' => 'App\\Controller\\AssembleeGeneraleController::ouvrir'], ['id'], ['POST' => 0], null, false, false, null]],
        141 => [[['_route' => 'assemblee_generale_clore', '_controller' => 'App\\Controller\\AssembleeGeneraleController::clore'], ['id'], ['POST' => 0], null, false, false, null]],
        150 => [[['_route' => 'app_assemblee_generale_delete', '_controller' => 'App\\Controller\\AssembleeGeneraleController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        191 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        211 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        253 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        290 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        304 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        324 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        337 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        347 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        388 => [[['_route' => 'app_coproprietaire_show', '_controller' => 'App\\Controller\\CoproprietaireController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        401 => [[['_route' => 'app_coproprietaire_edit', '_controller' => 'App\\Controller\\CoproprietaireController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        409 => [[['_route' => 'app_coproprietaire_delete', '_controller' => 'App\\Controller\\CoproprietaireController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        431 => [[['_route' => 'app_copropriete_show', '_controller' => 'App\\Controller\\CoproprieteController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        444 => [[['_route' => 'app_copropriete_edit', '_controller' => 'App\\Controller\\CoproprieteController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        452 => [[['_route' => 'app_copropriete_delete', '_controller' => 'App\\Controller\\CoproprieteController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        491 => [[['_route' => 'app_participation_show', '_controller' => 'App\\Controller\\ParticipationController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        504 => [[['_route' => 'app_participation_edit', '_controller' => 'App\\Controller\\ParticipationController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        512 => [[['_route' => 'app_participation_delete', '_controller' => 'App\\Controller\\ParticipationController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        558 => [[['_route' => 'participation_add_presence', '_controller' => 'App\\Controller\\ParticipationController::addPresence'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        579 => [[['_route' => 'participation_list_by_ag', '_controller' => 'App\\Controller\\ParticipationController::listByAG'], ['id'], ['GET' => 0], null, false, false, null]],
        606 => [[['_route' => 'participation_add_representant', '_controller' => 'App\\Controller\\ParticipationController::addRepresentant'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        654 => [[['_route' => 'app_question_a_discuter_show', '_controller' => 'App\\Controller\\QuestionADiscuterController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        667 => [[['_route' => 'app_question_a_discuter_edit', '_controller' => 'App\\Controller\\QuestionADiscuterController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        675 => [[['_route' => 'app_question_a_discuter_delete', '_controller' => 'App\\Controller\\QuestionADiscuterController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        701 => [[['_route' => 'app_question_a_voter_show', '_controller' => 'App\\Controller\\QuestionAVoterController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        714 => [[['_route' => 'app_question_a_voter_edit', '_controller' => 'App\\Controller\\QuestionAVoterController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        722 => [[['_route' => 'app_question_a_voter_delete', '_controller' => 'App\\Controller\\QuestionAVoterController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        743 => [[['_route' => 'app_question_show', '_controller' => 'App\\Controller\\QuestionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        756 => [[['_route' => 'app_question_edit', '_controller' => 'App\\Controller\\QuestionController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        764 => [[['_route' => 'app_question_delete', '_controller' => 'App\\Controller\\QuestionController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        791 => [[['_route' => 'app_vote_show', '_controller' => 'App\\Controller\\VoteController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        804 => [[['_route' => 'app_vote_edit', '_controller' => 'App\\Controller\\VoteController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        812 => [
            [['_route' => 'app_vote_delete', '_controller' => 'App\\Controller\\VoteController::delete'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
