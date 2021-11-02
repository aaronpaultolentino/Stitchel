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
        'get_token_url' => 'https://slack.com/api/oauth.v2.access',
        'get_userinfo_url' => 'https://slack.com/api/users.profile.get',
        'client_id' => env('SLACK_CLIENT_ID', '2295220621542.2643163578183'),
        'client_secret' => env('SLACK_CLIENT_SECRET', '90863d2f7e379f1364fe7481363fe5f6'),
        'revoke_token_url'=> 'https://slack.com/api/auth.revoke',
        
    ]
];
