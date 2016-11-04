<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    
	
	
	
	 /** add code here **/

   'github' => [
        'client_id' =>  env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => env('GITHUB_REDIRECT'),
    ],
    'facebook' => [
        'client_id' =>  '335065966829872',//env('FACEBOOK_APP_ID'),
        'client_secret' => '07efc7b8df59daa4aa761248c7b2277a',//env('FACEBOOK_APP_SECRET'),
        'redirect' => 'http://www.pororom.com/social/login/facebook',//env('FACEBOOK_REDIRECT'),
    ],
    'google' => [
        'client_id' =>  '701280359605-m8p30kvat634gk1f5ftlkhi970u21aqk.apps.googleusercontent.com',
        'client_secret' => 'KPqnXkCDFrGY1rqJjMRvWU1b',
        'redirect' => 'http://www.pororom.com/social/login/google',
    ],
    'twitter' => [
        'client_id' =>  'DSoJ6msUnyr1oEPhtxfDT5uBj',
        'client_secret' => 'P81C0HKsXTJTCnHal8BV3oSUGvbTwjpTvvm9kKNbJDJjRdECd2',
        'redirect' => 'http://www.pororom.com/social/login/twitter',
    ],

];
