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
            'user' => 'c,r,u,d',
            'payment' => 'c,r,u,d',
            'profile' => 'r,u',
            "permission" => 'c,r,u,d',
            "role" => 'c,r,u,d',
            "question" => 'c,r,u,d',
            "content" => 'c,r,u,d',
            "tone" => 'c,r,u,d',
            "answer" => 'c,r,u,d',
            "audit_log" => 'c,r,u,d',
            "payment" => 'c,r,u,d',
            "currencie" => 'c,r,u,d',
            "plan" => 'c,r,u,d',
            "subscription" => 'c,r,u,d',
            "payment" => 'c,r,u,d',
        ],
    ],
    "create_users" => [
        "admin"
    ],
    "permissions_map" => [
        'c' => "create",
        'r' => "read",
        'u' => "update",
        'd' => "delete",
    ]
];
