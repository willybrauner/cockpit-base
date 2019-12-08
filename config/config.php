<?php

return [

    "debug" => true,

    # cockpit session name
    'app.name' => 'cockpit-base',

    # cockpit session name
    'session.name' => 'admin',


    # define the languages you want to manage
    'languages' => [
        # setting a default language is optional
        'default' => 'English',
        // french
        'fr' => 'French',
        'de' => 'German',
    ],

    #'site_url' => 'http://localhost/cockpit-base/',

    # Define Access-Control (CORS) settings.
    # Those are the default values. You don't need to duplicate them all.
    'cors' => [
        'allowedHeaders' => 'X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding, Cockpit-Token',
        'allowedMethods' => 'PUT, POST, GET, OPTIONS, DELETE',
        'allowedOrigins' => '*',
        'maxAge' => '1000',
        'allowCredentials' => 'true',
        'exposedHeaders' => 'true',
    ],
];
