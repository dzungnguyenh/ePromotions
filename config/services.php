<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1825537217668365',
        'client_secret' => '94f4f79f5ccac05560c1ed5404361a26',
        'redirect' => 'http://localhost/callback/facebook',
    ],

    'twitter' => [
        'client_id' => 'jvVgZoMJFDGF0nuSRFzrE4jO3',
        'client_secret' => 'onPJd84dU1ZrHgsGmWCFBI4iv5octmWDLQooJ1TZix1T34ttjf',
        'redirect' => 'http://localhost/callback/twitter',
    ],

];
