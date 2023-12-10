<?php

// return [
//     'paths' => ['api/*', 'sanctum/csrf-cookie'],

//     'allowed_methods' => ['*'],

//     'allowed_origins' => [], // Add your React app URL

//     'allowed_origins_patterns' => ["*localhost*"],

//     'allowed_headers' => ['*'],

//     'exposed_headers' => [],

//     'max_age' => 0,

//     'supports_credentials' => false,
// ];

return [
    'paths' => ['*'], // Adjust as needed
    'allowed_methods' => ['*'], // Adjust as needed
    'allowed_origins' => ['*'], // Adjust as needed
    'allowed_headers' => ['*'], // Adjust as needed
    'supports_credentials' => false,
    'exposed_headers' => [],
];