<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Gemini API Key
    |--------------------------------------------------------------------------
    |
    | The API key for your Gemini application.
    |
    */
    'api_key' => env('GOOGLE_API_KEY', env('GEMINI_API_KEY')),

    /*
    |--------------------------------------------------------------------------
    | Gemini Organization
    |--------------------------------------------------------------------------
    |
    | The Organization ID for your Gemini application.
    |
    */
    'organization' => env('GEMINI_ORGANIZATION'),

    /*
    |--------------------------------------------------------------------------
    | HTTP Client Options
    |--------------------------------------------------------------------------
    |
    | Options to be passed to the Guzzle HTTP client used by the Gemini SDK.
    | You can configure things like 'timeout' or 'proxy'.
    |
    */
    'http_client' => [
        'timeout' => 300, // Increased timeout to 300 seconds (5 minutes) to prevent cURL 28 errors
    ],
];
