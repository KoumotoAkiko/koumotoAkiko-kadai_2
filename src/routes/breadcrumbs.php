<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Models\Product;

//第１階層　商品一覧
Breadcrumbs::for('products',function(BreadcrumbsTrail $trail){
    $trail->push('商品一覧',route('products'));

});

//第２階層　商品詳細
Breadcrumbs::for('edit',function(BreadcrumbTrail $trail, $product){
    $trail->parent('products');
    $trail->push($product->name, route('edit',$product));
});