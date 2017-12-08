<?php
return array(
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/index/$1/$2',
    'category/([0-9]+)' => 'catalog/index/$1',

    'product/([0-9]+)' => 'product/view/$1',

    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
//        'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/checkout' => 'cart/checkout',
    'cart' => 'cart/index',

    'registration' => 'user/registration',
    'login' => 'user/login',
    'logout' => 'user/logout',

    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    'admin/products/delete/([0-9]+)' => 'adminProducts/delete/$1',
    'admin/products/update/([0-9]+)' => 'adminProducts/update/$1',
    'admin/products/create' => 'adminProducts/create',
    'admin/products' => 'adminProducts/index',

    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/create' => 'adminCategory/create',
    'admin/category' => 'adminCategory/index',

    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    'admin' => 'admin/index',


    'about' => 'site/about',
    '' => 'site/index',
);