<?php
return [
    'matthewbdaly/artisan-standalone' => [
        'providers' => [
            'Matthewbdaly\\ArtisanStandalone\\Providers\\ServiceProvider'
        ],
        'nesbot/carbon' => [
            'providers' => [
                'Carbon\\Laravel\\ServiceProvider',
            ]
        ]
    ],
    'tychovbh/laravel-package-skeleton' => [
        'providers' => [
            'Tychovbh\\LaravelPackageSkeleton\\PackageSkeletonServiceProvider'
        ]
    ]
];
