<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => ' Sistema Carteira Clientes',

    'title_prefix' => 'Amana Seguros -',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Amana Seguros</b>',

    'logo_mini' => '<b>AS</b>',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'red',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => 'fixed',

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'admin/home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        'MENU',
        [
            'text'        => 'Home',
            'url'         => 'admin/home',
            'icon'        => 'home',
        ],
       
        [
            'text'        => 'Gestão Clientes',
             'url'        => 'admin/clientes',
            'icon'        => 'users',
         ],
        [
            'text'        => 'Gestão Prospecções',
            'url'         => 'admin/prospecoes/index',
            'icon'        => 'briefcase',
        ],
        [
            
            'text'        => 'Gestão Contratos',
            'url'         => 'admin/contrato/index',
            'icon'        => 'folder-open',
            'submenu'     => [
                [
                    'text'  => 'Contratos',
                    'url'   => 'admin/contrato/index',
                    'icon'  => 'folder-open',
                     'submenu'     => [
                                        [
                                            'text'  => 'Contratos',
                                            'url'   => 'admin/contrato/index',
                                            'icon'  => 'folder-open',

                                        ],
                                        [
                                            'text'  => 'A Expirar Este Mês',
                                            'url'   => 'admin/contrato/expira',
                                            'icon'  => 'clock-o',

                                        ],
                                      ]

                ],
                [
                    'text'        => ' Saúde',
                    'url'         => 'admin/saude/index',
                    'icon'        => 'medkit',
                     'submenu'     => [
                                        [
                                            'text'        => ' Saúde',
                                            'url'         => 'admin/saude/index',
                                            'icon'  => 'medkit',

                                        ],
                                        [
                                            'text'  => 'A Expirar  Este Mês',
                                            'url'   => 'admin/saude/expira',
                                            'icon'  => 'clock-o',

                                        ],
                                      ]
                ],
                [
                    'text'  => 'Avisos',
                    'url'   => 'admin/avisode-cobranca-index',
                    'icon'  => 'fax',
                     'submenu'     => [
                                        [
                                            'text'        => ' Avisos',
                                            'url'         => 'admin/avisode-cobranca-index',
                                            'icon'  => 'fax',

                                        ],
                                        [
                                            'text'  => 'A Expirar Em 30 dias',
                                            'url'   => 'admin/aviso/expira',
                                            'icon'  => 'clock-o',

                                        ],
                                        [
                                            'text'  => 'Vencidos Não pagos',
                                            'url'   => 'admin/aviso/vencidos-nao-pagos',
                                            'icon'  => 'clock-o',

                                        ],
                                      ]

                ],
            ]
        ],
        [
            'text'        => 'Gestão Consultores',
            'url'         => 'admin/consultor/index',
            'icon'        => 'user',
           
        ],
        [
            'text'        => 'Gestão Seguradoras',
            'url'         => 'admin/seguradoras/index',
            'icon'        => 'institution',
            'submenu'     => [
                [
                    'text'  => 'Gestão Seguradoras',
                    'url'   => 'admin/seguradoras/index',
                    'icon'  => 'institution',

                ],
                [
                    'text'  => 'Ramo',
                    'url'   => 'admin/ramo/index',

                ],
            ]
               
            
        ],
        [
            'text'        => 'Gestão Sinistros',
            'url'         => 'admin/sinistro/index',
            'icon'        => 'subway',
            
        ],

        [
            'text'        => 'Finanças',
            'url'         => '#',
            'icon'        => 'calculator',
            'submenu'     => [
                [
                    'text'  => 'Aviso de Cobranças',
                    'url'   => 'admin/financas',
                    'icon'  => 'warning',

                ],
                [
                    'text'  => 'Recibos',
                    'url'   => 'admin/recibostable',
                    'icon'  => 'file-text-o',

                ],
            ]
               
        ],
        
        'SUB MENU',
        [
            
            'text'        => 'Relatórios',
            'url'         => 'admin/report/index',
            'icon'        => 'bar-chart',
            'submenu'     => [
                [
                    'text'  => 'My Reports',
                    'url'   => 'admin/report/index',
                    'icon'  => 'warning',

                ],
                [
                    'text'  => 'New Report',
                    'url'   => 'admin/report/new',
                    'icon'  => 'file-text-o',

                ],
            ]
        ],
        [
            'text'        => 'Calendário',
            'url'         => 'admin/calendario',
            'icon'        => 'calendar',
        ],
        [
            'text'        => 'Email',
            'url'         => 'admin/email/all',
            'icon'        => 'telegram',
        ],
        [
            'text'        => 'Aniversários',
            'url'         => 'admin/aniversarios/index',
            'icon'        => 'birthday-cake',
        ],
        [
            'text'        => 'Configurações',
            'url'         => 'admin',
            'icon'        => 'cog',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
