<?php

    return [

            'settings' => [

                'displayErrorDetails' => true,
                'view' => [
                    'path' => __DIR__ . '/resources/views',
                    'twig' => [
                    'cache' => false
                    ]
                ],
                // Database connection settings
                "db" => [
                "host" => "localhost",
                "dbname" => "slim_db",
                "user" => "root",
                "pass" => ""
        ],


            ]
    ];