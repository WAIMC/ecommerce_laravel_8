<?php
    return [
        [
            'label' => 'Dashboard',
            'route' => 'admin.index',
            'icon' => 'fa-home'
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
            'route'=>'customer_management.index',
            'icon'=>'fa-users',
            'items'=>[
                [
                    'label'=>'List Customer',
                    'route'=>'customer_management.index',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ],
        [
            'label'=>'Blog Management',
            'route'=>'admin.index',
            'icon'=>'fa-blog',
            'items'=>[
                [
                    'label'=>'List Blog',
                    'route'=>'admin.index',
                    'icon'=>'fa-circle nav-icon'
                ]
            ]
        ]
    ];
?>