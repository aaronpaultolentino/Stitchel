<?php

return [

    'gmail' => [
        'get_token_url' => 'https://accounts.google.com/o/oauth2/token',
        'get_userinfo_url' => 'https://www.googleapis.com/oauth2/v1/userinfo',
        'revoke_token_url'=> 'https://oauth2.googleapis.com/revoke',
        'client_id' => env('GMAIL_CLIENT_ID', '382106922048-jc5cjs40rm925vhasu1a1gcp1ee8jvc2.apps.googleusercontent.com'),
        'client_secret' => env('GMAIL_CLIENT_ID', 'TGouv1LfMh_ORVOJ2C5xIRL6'),
    ],

    'jira' => [
        'get_token_url' => 'https://auth.atlassian.com/oauth/token',
        'get_userinfo_url' => 'https://api.atlassian.com/me',
    	'client_id' => env('JIRA_CLIENT_ID', 'ZG9PdjJf5QEeTOyBUEakMmKCnHwiLt0B'),
        'client_secret' => env('JIRA_CLIENT_SECRET', '34Q-PPn8BIPjqwzcmypJUHQ2AKsQ4tevb1GciLPRCWuFg5Q5XI6TiXMax9jlqvh5'),
        'revoke_token_url'=> '',
    	
    ]
];
