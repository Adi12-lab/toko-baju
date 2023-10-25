<?php
// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Category;
use App\Models\Product;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('/', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > produk
Breadcrumbs::for('product', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('List Product', route('products'));
});

// Home > Kategori
Breadcrumbs::for('category', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('List Category', route('categories'));
});

Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('About Us', route('categories'));
});

Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('Contact us', route('categories'));
});

Breadcrumbs::for("produkview", function(BreadcrumbTrail $trail, Product $product ) {
    $trail->parent("product");
    $trail->push($product->name, route("product.view", $product->slug));
});

Breadcrumbs::for("categoryproducts", function(BreadcrumbTrail $trail, Category $category ) {
    $trail->parent("category");
    $trail->push("Category {$category->name}", route("category.products", $category->slug));
});

