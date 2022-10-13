<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

        'productCategory' => [
            'driver' => 'local',
            'root' => storage_path('app/public/pdtcatg'),
            'visibility' => 'public',
        ],

        'productSubCategory' => [
            'driver' => 'local',
            'root' => storage_path('app/public/pdtsubcatg'),
            'visibility' => 'public',
        ],

        'products' => [
            'driver' => 'local',
            'root' => storage_path('app/public/products'),
            'visibility' => 'public',
        ],

        'serviceCategory' => [
            'driver' => 'local',
            'root' => storage_path('app/public/sercatg'),
            'visibility' => 'public',
        ],

        'serviceSubCategory' => [
            'driver' => 'local',
            'root' => storage_path('app/public/sersubcatg'),
            'visibility' => 'public',
        ],

        'services' => [
            'driver' => 'local',
            'root' => storage_path('app/public/services'),
            'visibility' => 'public',
        ],

        'projectCategory' => [
            'driver' => 'local',
            'root' => storage_path('app/public/pjxcatg'),
            'visibility' => 'public',
        ],

        'projects' => [
            'driver' => 'local',
            'root' => storage_path('app/public/projects'),
            'visibility' => 'public',
        ],

        'blogCategory' => [
            'driver' => 'local',
            'root' => storage_path('app/public/blgcatg'),
            'visibility' => 'public',
        ],        
        
        'blogs' => [
            'driver' => 'local',
            'root' => storage_path('app/public/blogs'),
            'visibility' => 'public',
        ],
        'homepageImages' => [
            'driver' => 'local',
            'root' => storage_path('app/public/homepageImages'),
            'visibility' => 'public',
        ],
        'galleryCategory' => [
            'driver' => 'local',
            'root' => storage_path('app/public/glycatg'),
            'visibility' => 'public',
        ],  

        'gallerys' => [
            'driver' => 'local',
            'root' => storage_path('app/public/gallerys'),
            'visibility' => 'public',
        ],
        
        'sliders' => [
            'driver' => 'local',
            'root' => storage_path('app/public/sliders'),
            'visibility' => 'public',
        ],

        'questionPapers' => [
            'driver' => 'local',
            'root' => storage_path('app/public/questionpapers'),
            'visibility' => 'public',
        ],

        'results' => [
            'driver' => 'local',
            'root' => storage_path('app/public/results'),
            'visibility' => 'public',
        ],

        'testimonials' => [
            'driver' => 'local',
            'root' => storage_path('app/public/testimonials'),
            'visibility' => 'public',
        ],

        'tutors' => [
            'driver' => 'local',
            'root' => storage_path('app/public/tutors'),
            'visibility' => 'public',
        ],
        'resource' => [
            'driver' => 'local',
            'root' => storage_path('app/public/resource'),
            'visibility' => 'public',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
