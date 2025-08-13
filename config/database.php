<?php

use Illuminate\Support\Str;

return [

    'default' => env('DB_CONNECTION', 'mysql'),
    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    */

    'connections' => [
        'oracle' => [
            'driver'         => 'oracle',
            'tns'            => env('DB_ORACLE_TNS', ''), // Puedes dejarlo vacío si usas host+service_name
            'host'           => env('DB_ORACLE_HOST', 'localhost'),
            'port'           => env('DB_ORACLE_PORT', '1521'),
            'database'       => env('DB_ORACLE_SERVICE_NAME', 'XE'), // <-- aquí va el service_name que es "free"
            'username'       => env('DB_ORACLE_USERNAME', 'C##UBDPRODUCTO'),
            'password'       => env('DB_ORACLE_PASSWORD', '1234567'),
            'charset'        => env('DB_ORACLE_CHARSET', 'AL32UTF8'),
            'prefix'         => '',
            'prefix_schema'  => '',
        ],
        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'bdproducto'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', 'mysql123'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_PGSQL_HOST', '127.0.0.1'),
            'port' => env('DB_PGSQL_PORT', '5432'),
            'database' => env('DB_PGSQL_DATABASE', 'BDPRODUCTO'),
            'username' => env('DB_PGSQL_USERNAME', 'postgres'),
            'password' => env('DB_PGSQL_PASSWORD', '123456'),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_SQLSRV_HOST', 'localhost'),
            'port' => env('DB_SQLSRV_PORT', '1433'),
            'database' => env('DB_SQLSRV_DATABASE', 'BDPRODUCTO'),
            'username' => env('DB_SQLSRV_USERNAME', 'sa'),
            'password' => env('DB_SQLSRV_PASSWORD', '123456'),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'options' => [
                'TrustServerCertificate' => true,
            ],
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
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_') . '_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
