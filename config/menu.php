<?php
    return [
        [
            'label' => 'Dashboard',
            'route' => 'admin.index',
            'icon' => 'fa-home'
        ],
        [
            'label'=>'Decentralize Management',
            'route'=>'decentralize.index',
            'icon'=>'fa-address-card',
            'items'=>[
                [
                    'label'=>'List Decentralize',
                    'route'=>'decentralize.index',
                    'icon'=>'fa-circle nav-icon'
                ],
            ]
        ],
        [
            'label'=>'Roles Management',
            'route'=>'role.index',
            'icon'=>'fa-shield-alt',
            'items'=>[
                [
                    'label'=>'List Roles',
                    'route'=>'role.index',
                    'icon'=>'fa-circle nav-icon'
                ],
                [
                    'label'=>'Add Roles',
                    'route'=>'role.create',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label'=>'Category Management',
            'route'=>'category.index',
            'icon'=>'fa-list-alt',
            'items'=>[
                [
                    'label'=>'List Category',
                    'route'=>'category.index',
                    'icon'=>'fa-circle nav-icon'
                ],
                [
                    'label'=>'Add Category',
                    'route'=>'category.create',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label'=>'Product Management',
            'route'=>'product.index',
            'icon'=>'fa-project-diagram',
            'items'=>[
                [
                    'label'=>'List Product',
                    'route'=>'product.index',
                    'icon'=>'fa-circle nav-icon'
                ],
                [
                    'label'=>'Add Product',
                    'route'=>'product.create',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label'=>'Variant Product Management',
            'route'=>'variantProduct.index',
            'icon'=>'fa-calendar',
            'items'=>[
                [
                    'label'=>'List Variant Product',
                    'route'=>'variantProduct.index',
                    'icon'=>'fa-circle nav-icon'
                ],
                [
                    'label'=>'Add Variant Product',
                    'route'=>'variantProduct.create',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label'=>'Review Management',
            'route'=>'review.index',
            'icon'=>'fa-comments',
            'items'=>[
                [
                    'label'=>'List Review',
                    'route'=>'review.index',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label'=>'Order Management',
            'route'=>'order.index',
            'icon'=>'fa-shopping-cart',
            'items'=>[
                [
                    'label'=>'List Order',
                    'route'=>'order.index',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label'=>'Banner Management',
            'route'=>'banner.index',
            'icon'=>'fa-image',
            'items'=>[
                [
                    'label'=>'List Banner',
                    'route'=>'banner.index',
                    'icon'=>'fa-circle nav-icon'
                ],
                [
                    'label'=>'Add Banner',
                    'route'=>'banner.create',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label'=>'Customer Management',
            'route'=>'cusMan.index',
            'icon'=>'fa-users',
            'items'=>[
                [
                    'label'=>'List Customer',
                    'route'=>'cusMan.index',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label'=>'Setting Link Management',
            'route'=>'settingLink.index',
            'icon'=>'fa-cogs',
            'items'=>[
                [
                    'label'=>'List Setting Link',
                    'route'=>'settingLink.index',
                    'icon'=>'fa-circle nav-icon'
                ],
                [
                    'label'=>'Add Setting Link',
                    'route'=>'settingLink.create',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label'=>'Blog Management',
            'route'=>'blog.index',
            'icon'=>'fa-blog',
            'items'=>[
                [
                    'label'=>'List Blog',
                    'route'=>'blog.index',
                    'icon'=>'fa-circle nav-icon'
                ],
                [
                    'label'=>'Add Blog',
                    'route'=>'blog.create',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ]
    ];
?>