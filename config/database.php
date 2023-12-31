<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    //'default' => env('DB_CONNECTION', 'mysql'),
    'default' => 'Hospital_extension',

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'personal' => [
            'driver' => 'mysql',
            'host' => env('PERSONAL_DB_HOST', 'localhost'),
            'port' => '3306',
            'database' => env('PERSONAL_DB_DATABASE', 'personal'),
            'username' => env('PERSONAL_DB_USER', 'administrador'),
            'password' => env('PERSONAL_DB_PASSWORD', 'Tramoya04'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'cloudmed' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'port' => '33060',
            'database' => 'cloudmed',
            'username' => 'homestead',
            'password' => 'secret',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'Hospital_extension' => [
            'driver' => 'sqlsrv',
            'host'      => env('DB_HOST_HOSPITAL_EXTENSION'),
            'port'      => env('DB_PORT_HOSPITAL_EXTENSION'),
            'database'  => env('DB_DATABASE_HOSPITAL_EXTENSION'),
            'username'  => env('DB_USERNAME_HOSPITAL_EXTENSION'),
            'password'  => env('DB_PASSWORD_HOSPITAL_EXTENSION'),
            'charset' => 'utf8',
            'prefix' => '',
            'trust_server_certificate' => true,
        ],

        'Hospital' => [
            'driver'    => 'sqlsrv',
            'host'      => env('DB_HOST_HOSPITAL'),
            'port'      => env('DB_PORT_HOSPITAL'),
            'database'  => env('DB_DATABASE_HOSPITAL'),
            'username'  => env('DB_USERNAME_HOSPITAL'),
            'password'  => env('DB_PASSWORD_HOSPITAL'),
            'charset' => 'utf8',
            'prefix' => '',
            'trust_server_certificate' => true,
        ],

        'Padron' => [
            'driver'    => 'sqlsrv',
            'host'      => env('DB_HOST_PADRON'),
            'port'      => env('DB_PORT_PADRON'),
            'database'  => env('DB_DATABASE_PADRON'),
            'username'  => env('DB_USERNAME_PADRON'),
            'password'  => env('DB_PASSWORD_PADRON'),
            'charset' => 'utf8',
            'prefix' => '',
            'trust_server_certificate' => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
