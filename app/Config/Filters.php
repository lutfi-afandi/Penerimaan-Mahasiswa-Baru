<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'     => CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'filteradmin' => \App\Filters\FilterAdmin::class,
        'filtermahasiswa' => \App\Filters\FilterMahasiswa::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            'filteradmin' => [
                'except' => [
                    'panel', 'admin/panel', 'admin/panel/*',
                    'home', 'home/*',
                    'portal', 'portal/*',
                    'mahasiswa/auth', 'mahasiswa/auth/*',
                    '/'
                ]
            ],
            'filtermahasiswa' => [
                'except' => [
                    'panel', 'admin/panel', 'admin/panel/*',
                    'home', 'home/*',
                    'portal', 'portal/*',
                    'mahasiswa/auth', 'mahasiswa/auth/*',
                    '/'
                ]
            ],
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            'filteradmin' => [
                'except' => [
                    'admin', 'admin/banner/*',
                    'admin/home', 'admin/home/*',
                    'admin/kelulusan', 'admin/kelulusan/*',
                    'admin/banner', 'admin/banner/*',
                    'admin/mahasiswa', 'admin/mahasiswa/*',
                    'admin/pengaturan', 'admin/pengaturan/*',
                    'admin/slideshow', 'admin/slideshow/*',
                    'admin/tahunakademik', 'admin/tahunakademik/*',
                    'admin/user', 'admin/user/*',
                ]
            ],
            'filtermahasiswa' => [
                'except' => [
                    'mahasiswa/data', 'mahasiswa/data/*',
                ]
            ],
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
