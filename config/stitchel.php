<?php

return [

    'gmail' => [
        'get_token_url' => 'https://accounts.google.com/o/oauth2/token',
        'get_userinfo_url' => 'https://www.googleapis.com/oauth2/v1/userinfo',
        'revoke_token_url'=> 'https://oauth2.googleapis.com/revoke',
        'client_id' => env('GMAIL_CLIENT_ID', '612282034411-ojom6d0mbd7qfjhbjji8rmesjscqhsp2.apps.googleusercontent.com'),
        'client_secret' => env('GMAIL_CLIENT_ID', 'TzAwgOJWOKQCfyrndYsi4gML'),
    ],

    'jira' => [
        'app_token' => '1KJs0MFufT54seEPM0gI3181',
        'get_token_url' => 'https://auth.atlassian.com/oauth/token',
        'get_userinfo_url' => 'https://api.atlassian.com/me',
    	'client_id' => env('JIRA_CLIENT_ID', 'Vv7sUP85YMR5GFonZKi81NKZxlLSSNdg'),
        'client_secret' => env('JIRA_CLIENT_SECRET', 'ATOAnTZlBGgfVQhdplqF-ffbETlDFhebfSRjD-aqIGF5XSpMtOd8d-791NC-va11sq_z97D01FCD'),
        'revoke_token_url'=> '',
    	
    ],

     'slack' => [
        'get_token_url' => 'https://slack.com/api/oauth.v2.access',
        'get_userinfo_url' => 'https://slack.com/api/users.profile.get',
        'client_id' => env('SLACK_CLIENT_ID', '4384088872133.4427279434578'),
        'client_secret' => env('SLACK_CLIENT_SECRET', '262bc7fa99e7f0f88138f55485a6a4d0'),
        'revoke_token_url'=> 'https://slack.com/api/auth.revoke',
        
    ]
];
