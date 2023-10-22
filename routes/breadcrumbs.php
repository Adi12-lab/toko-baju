<?php
// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Product;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('/', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > produk
Breadcrumbs::for('produk', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('List Produk', route('products'));
});

// Home > Kategori
Breadcrumbs::for('kategori', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('List Kategori', route('categories'));
});

Breadcrumbs::for("produkview", function(BreadcrumbTrail $trail, Product $product ) {
    $trail->parent("produk");
    $trail->push($product->name, route("productView", $product->slug));
});

