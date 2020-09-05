<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    |
    */

    'title' => 'Laravel Mentor',
    'title_prefix' => 'Laravel Mentor - ',


    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    |
    */

    'logo_img' => '/assets/images/cashgiver.jpeg',
    'logo_img_class' => 'brand-image elevation-3 w-full',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'laravel-mentor',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    |
    */

    'usermenu_enabled' => true,
    'usermenu_image' => 'vendor/laravel-mentor/assets/img/avtar/02.jpg',
    'usermenu_profile_url' => 'profile',


    /*
    |--------------------------------------------------------------------------
    | Preloader
    |--------------------------------------------------------------------------
    |
    |
    */

    "enable_preloader" => false,


    /*
    |--------------------------------------------------------------------------
    | Breadcrumb
    |--------------------------------------------------------------------------
    |
    |
    */

    "enable_breadcrumb" => true,

    /*
    |--------------------------------------------------------------------------
    | Mega Menu
    |--------------------------------------------------------------------------
    |
    |
    */

    "enable_mega_menu" => false,

    /*
    |--------------------------------------------------------------------------
    | Dropdown Menu
    |--------------------------------------------------------------------------
    |
    |
    */

    "enable_nav_dropdown_menu" => false,

    /*
    |--------------------------------------------------------------------------
    | Footer content
    |--------------------------------------------------------------------------
    |
    |
    */

    "footer_text" => "Copyright 2019. All rights reserved.",

    /*
    |--------------------------------------------------------------------------
    | Search
    |--------------------------------------------------------------------------
    |
    |
    */

    "enabled_search" => true,
    "search_route" => "search",

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'dashboard',

    'logout_url' => 'dashboard/logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => 'profile',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    |
    */

    'menu' => [
        
        [
            'header' => 'Admin Section',
            'url' => '/admin',
            'can' => 'admin'
        ],
        [
            'text' => 'Admin Dashboard',
            'url'  => '/dashboard/admin',
            'can' => 'admin'
        ],
        [
            'text' => 'All Users',
            'route'  => 'users.index',
            'can' => 'admin'
        ],
        [
            'text' => 'Banned Users',
            'route'  => 'users.banned',
            'can' => 'admin'
        ],
        [
            'text' => 'Manual Merge',
            'route'  => 'users.merge',
            'can' => 'admin'
        ],
        [
            'text' => 'View All Coupon Code',
            'route'  => 'activation_fees.index',
            'can' => 'admin'
        ],
        [
            'text' => 'View All Paid PH',
            'route'  => 'donations.admin',
            'can' => 'admin'
        ],
        [
            'text' => 'View All GH',
            'route'  => 'gh.admin',
            'can' => 'admin'
        ],
        [
            'text' => 'Withdrawal Requests',
            'route'  => 'withdrawals.index',
            'can' => 'admin'
        ],
        [
            'text' => 'Fake Proof Reports',
            'route'  => 'reports.index',
            'can' => 'admin'
        ],
        [
            'text' => 'Reward User With GH',
            'route'  => 'users.reward',
            'can' => 'admin'
        ],
        [
            'text' => 'Change Admin Password',
            'route'  => 'users.edit_password',
            'can' => 'admin'
        ],
        [
            'text' => 'Edit Admin Bank Details',
            'route'  => 'bank_accounts.edit',
            'can' => 'admin'
        ],
        [
            'text' => 'Edit Admin Phone Number',
            'route'  => 'users.edit_admin_phone',
            'can' => 'admin'
        ],
        [
            'text' => 'Settings',
            'url'  => '/dashboard/admin/settings',
            'can' => 'admin'
        ],

        
        ['header' => 'Your Accout'],
        [
            'text' => 'Dashboard',
            'url'  => '/dashboard',
        ],
        [
            'text' => 'Upload Payment Proof',
            'route'  => 'donations.upload',
            'can' => 'upload_proof'
        ],
        [
            'text' => 'Confrim GH Payment',
            'route'  => 'ghs.confirm',
            'can' => 'confirm_gh'
        ],
        [
            'text' => 'Bank Details',
            'route'  => 'bank_accounts.show',
        ],
        [
            'text' => 'Edit Bank Details',
            'route'  => 'bank_accounts.edit',
        ],
        [
            'text' => 'Activation Fee',
            'route'  => 'activation_fees.show',
        ],
        [
            'text' => 'Make Donation (PH)',
            'route'  => 'donations.create',
        ],
        [
            'text' => 'Donations (PHs)',
            'route'  => 'donations.index',
        ],
        [
            'text' => 'GHs',
            'route'  => 'ghs.index',
        ],
        [
            'text' => 'All Referrals',
            'route'  => 'referrals.show',
        ],
        [
            'text' => 'Confirm New Referrals',
            'route'  => 'referrals.index',
            'can' => 'confirm_referrals'
        ],
        [
            'text' => 'Guider',
            'route'  => 'guiders.show',
            'can' => 'guider'
        ],
        [
            'text' => 'Change Password',
            'route'  => 'users.edit_password',
        ],
        [
            'text' => 'Logout',
            'route'  => 'sessions.destroy',
        ],
        
    ],
    
];