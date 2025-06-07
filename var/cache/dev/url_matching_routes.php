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
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\LoginController::index'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\LoginController::logout'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
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
                            .'|ouvrir(*:116)'
                            .'|clore(*:129)'
                            .'|edit(*:141)'
                        .')'
                    .')'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:183)'
                    .'|wdt/([^/]++)(*:203)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:245)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:282)'
                                .'|router(*:296)'
                                .'|exception(?'
                                    .'|(*:316)'
                                    .'|\\.css(*:329)'
                                .')'
                            .')'
                            .'|(*:339)'
                        .')'
                    .')'
                .')'
                .'|/copropriet(?'
                    .'|aire/([^/]++)(?'
                        .'|(*:380)'
                        .'|/edit(*:393)'
                        .'|(*:401)'
                    .')'
                    .'|e/([^/]++)(?'
                        .'|(*:423)'
                        .'|/edit(*:436)'
                        .'|(*:444)'
                    .')'
                .')'
                .'|/participation/(?'
                    .'|([^/]++)(?'
                        .'|(*:483)'
                        .'|/edit(*:496)'
                        .'|(*:504)'
                    .')'
                    .'|assemblee/([^/]++)/(?'
                        .'|p(?'
                            .'|resence/add(*:550)'
                            .'|articipations(*:571)'
                        .')'
                        .'|representation/add(*:598)'
                    .')'
                .')'
                .'|/question/(?'
                    .'|a/(?'
                        .'|discuter/(?'
                            .'|([^/]++)(?'
                                .'|(*:649)'
                                .'|/edit(*:662)'
                                .'|(*:670)'
                            .')'
                            .'|assemblee/([^/]++)/question\\-a\\-discuter/add(*:723)'
                        .')'
                        .'|voter/(?'
                            .'|([^/]++)(?'
                                .'|(*:752)'
                                .'|/edit(*:765)'
                                .'|(*:773)'
                            .')'
                            .'|assemblee/([^/]++)/question\\-a\\-voter/add(*:823)'
                        .')'
                    .')'
                    .'|([^/]++)(?'
                        .'|(*:844)'
                        .'|/edit(*:857)'
                        .'|(*:865)'
                    .')'
                .')'
                .'|/vote/(?'
                    .'|([^/]++)(?'
                        .'|(*:895)'
                        .'|/edit(*:908)'
                        .'|(*:916)'
                    .')'
                    .'|vote/(?'
                        .'|assemblee/([^/]++)/(?'
                            .'|questions(*:964)'
                            .'|liste(*:977)'
                        .')'
                        .'|vote/([^/]++)/([^/]++)/submit(*:1015)'
                        .'|([^/]++)/supprimer(*:1042)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        41 => [[['_route' => '_todo_edit', '_locale' => 'en', '_controller' => 'App\\Controller\\Admin\\TodoCrudController::edit', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TodoCrudController', 'crudAction' => 'edit'], ['entityId'], ['GET' => 0, 'POST' => 1, 'PATCH' => 2], null, false, false, null]],
        54 => [[['_route' => '_todo_delete', '_locale' => 'en', '_controller' => 'App\\Controller\\Admin\\TodoCrudController::delete', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TodoCrudController', 'crudAction' => 'delete'], ['entityId'], ['POST' => 0], null, false, false, null]],
        62 => [[['_route' => '_todo_detail', '_locale' => 'en', '_controller' => 'App\\Controller\\Admin\\TodoCrudController::detail', 'routeCreatedByEasyAdmin' => true, 'dashboardControllerFqcn' => 'App\\Controller\\Admin\\DashboardController', 'crudControllerFqcn' => 'App\\Controller\\Admin\\TodoCrudController', 'crudAction' => 'detail'], ['entityId'], ['GET' => 0], null, false, true, null]],
        99 => [
            [['_route' => 'app_assemblee_generale_show', '_controller' => 'App\\Controller\\AssembleeGeneraleController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_assemblee_generale_delete', '_controller' => 'App\\Controller\\AssembleeGeneraleController::delete'], ['id'], ['POST' => 0], null, false, true, null],
        ],
        116 => [[['_route' => 'assemblee_generale_ouvrir', '_controller' => 'App\\Controller\\AssembleeGeneraleController::ouvrir'], ['id'], ['POST' => 0], null, false, false, null]],
        129 => [[['_route' => 'assemblee_generale_clore', '_controller' => 'App\\Controller\\AssembleeGeneraleController::clore'], ['id'], ['POST' => 0], null, false, false, null]],
        141 => [[['_route' => 'app_assemblee_generale_edit', '_controller' => 'App\\Controller\\AssembleeGeneraleController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        183 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        203 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        245 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        282 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        296 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        316 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        329 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        339 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        380 => [[['_route' => 'app_coproprietaire_show', '_controller' => 'App\\Controller\\CoproprietaireController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        393 => [[['_route' => 'app_coproprietaire_edit', '_controller' => 'App\\Controller\\CoproprietaireController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        401 => [[['_route' => 'app_coproprietaire_delete', '_controller' => 'App\\Controller\\CoproprietaireController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        423 => [[['_route' => 'app_copropriete_show', '_controller' => 'App\\Controller\\CoproprieteController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        436 => [[['_route' => 'app_copropriete_edit', '_controller' => 'App\\Controller\\CoproprieteController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        444 => [[['_route' => 'app_copropriete_delete', '_controller' => 'App\\Controller\\CoproprieteController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        483 => [[['_route' => 'app_participation_show', '_controller' => 'App\\Controller\\ParticipationController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        496 => [[['_route' => 'app_participation_edit', '_controller' => 'App\\Controller\\ParticipationController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        504 => [[['_route' => 'app_participation_delete', '_controller' => 'App\\Controller\\ParticipationController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        550 => [[['_route' => 'app_participation_add_presence', '_controller' => 'App\\Controller\\ParticipationController::addPresence'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        571 => [[['_route' => 'participation_list_by_ag', '_controller' => 'App\\Controller\\ParticipationController::listByAG'], ['id'], ['GET' => 0], null, false, false, null]],
        598 => [[['_route' => 'participation_add_representant', '_controller' => 'App\\Controller\\ParticipationController::addRepresentant'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        649 => [[['_route' => 'app_question_a_discuter_show', '_controller' => 'App\\Controller\\QuestionADiscuterController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        662 => [[['_route' => 'app_question_a_discuter_edit', '_controller' => 'App\\Controller\\QuestionADiscuterController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        670 => [[['_route' => 'app_question_a_discuter_delete', '_controller' => 'App\\Controller\\QuestionADiscuterController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        723 => [[['_route' => 'app_question_a_discuter_new_for_ag', '_controller' => 'App\\Controller\\QuestionADiscuterController::newForAG'], ['id'], null, null, false, false, null]],
        752 => [[['_route' => 'app_question_a_voter_show', '_controller' => 'App\\Controller\\QuestionAVoterController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        765 => [[['_route' => 'app_question_a_voter_edit', '_controller' => 'App\\Controller\\QuestionAVoterController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        773 => [[['_route' => 'app_question_a_voter_delete', '_controller' => 'App\\Controller\\QuestionAVoterController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        823 => [[['_route' => 'app_question_a_voter_new_for_ag', '_controller' => 'App\\Controller\\QuestionAVoterController::newForAG'], ['id'], null, null, false, false, null]],
        844 => [[['_route' => 'app_question_show', '_controller' => 'App\\Controller\\QuestionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        857 => [[['_route' => 'app_question_edit', '_controller' => 'App\\Controller\\QuestionController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        865 => [[['_route' => 'app_question_delete', '_controller' => 'App\\Controller\\QuestionController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        895 => [[['_route' => 'app_vote_show', '_controller' => 'App\\Controller\\VoteController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        908 => [[['_route' => 'app_vote_edit', '_controller' => 'App\\Controller\\VoteController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        916 => [[['_route' => 'app_vote_delete', '_controller' => 'App\\Controller\\VoteController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        964 => [[['_route' => 'app_vote_questions', '_controller' => 'App\\Controller\\VoteController::questions'], ['id'], null, null, false, false, null]],
        977 => [[['_route' => 'app_vote_list', '_controller' => 'App\\Controller\\VoteController::listVotes'], ['id'], ['GET' => 0], null, false, false, null]],
        1015 => [[['_route' => 'app_vote_submit', '_controller' => 'App\\Controller\\VoteController::submit'], ['questionId', 'participationId'], ['POST' => 0], null, false, false, null]],
        1042 => [
            [['_route' => 'app_vote_delete_custom', '_controller' => 'App\\Controller\\VoteController::deleteVoteManuellement'], ['id'], ['POST' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
