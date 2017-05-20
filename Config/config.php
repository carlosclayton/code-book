<?php

return [
    'name' => 'CodeEduBook',
    'acl' => [
        'role_author' => env('ROLE_AUTHOR', 'Author'),
        'role_author_description' => env('ROLE_AUTHOR_DESCRIPTION =', 'Permissions of author'),
        'permissions' => [
            'name' => 'book-admin',
            'description' => 'Book administration',
            'resource_name' => 'manage_all',
            'resource_description' => 'Admin of book administration'
        ]
    ]

];
