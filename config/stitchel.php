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
    	'client_id' => env('JIRA_CLIENT_ID', 'FZojGp8YzlsIoz81MGh6yuESotWMZL2G'),
        'client_secret' => env('JIRA_CLIENT_SECRET', '1WBY8B-iYr6m9aCZXDSfOM5a8JY2822LywYTG9YI8H1wlDVsF0-kZ17zR9wp8Zb3'),
        'revoke_token_url'=> '',
    	
    ],

     'slack' => [
        'get_token_url' => 'https://slack.com/api/oauth.token',
        'get_userinfo_url' => '',
        'client_id' => env('SLACK_CLIENT_ID', '2295220621542.2306457300818'),
        'client_secret' => env('SLACK_CLIENT_SECRET', '59c3a8bd0560913080af7a0f3289d39c'),
        // 'revoke_token_url'=> '',
        
    ]
];
