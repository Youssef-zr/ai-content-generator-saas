<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        "Admin" => [
            'dashboard' => 'a',
            'category' => 'a,c,r,u,d',
            'question' => 'a,c,r,u,d',
            "tone" => 'a,c,r,u,d',
            "engine" => 'a,c,r,u,d',
            "language" => 'a,c,r,u,d',
            "prompt" => 'a,c,r,u,d',

            "subscription_management" => 'a',
            "subscription" => 'a,c,r,u,d',
            "plan" => 'a,c,r,u,d',

            "settings" => 'a',
            "brand" => 'a,u',
            "third_party" => 'a,u',
            "content" => 'a,u',

            "customize" => 'a',
            "landing_page"=>'a,u',
            "hero"=>'a,u',
            "partner"=>'a,c,r,u,d',
            "story"=>'a,u',
            "block"=>'a,c,r,u,d',
            "pricing"=>'a,u',
            "testimonial"=>'a,u',

            'user' => 'a,c,r,u,d',
            'profile' => 'r,u',
            "permission" => 'a,c,r,u,d',
            "role" => 'a,c,r,u,d',
            "audit_log" => 'a,c,r,u,d',
        ],
    ],
    "create_users" => [
        "admin"
    ],
    "permissions_map" => [
        "a" => "access",
        'c' => "create",
        'r' => "read",
        'u' => "update",
        'd' => "delete",
    ]
];
