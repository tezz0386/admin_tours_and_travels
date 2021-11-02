<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('setting.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Setting', route('setting.index'));
});

Breadcrumbs::for('setting.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Create', route('setting.create'));
});
Breadcrumbs::for('category.index', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Category List', route('category.index'));
});
Breadcrumbs::for('category.create', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Category Create', route('category.create'));
});
Breadcrumbs::for('category.edit', function(BreadcrumbTrail $trail, $category){
	$trail->parent('category.index');
	$trail->push($category->slug, route('category.create', $category));
});

Breadcrumbs::for('category.show', function(BreadcrumbTrail $trail, $category){
	$trail->parent('category.index');
	$trail->push($category->slug, route('category.show', $category));
});

Breadcrumbs::for('destination.index', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Destination List', route('destination.index'));
});
Breadcrumbs::for('destination.create', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Destination Create', route('destination.create'));
});

Breadcrumbs::for('destination.show', function(BreadcrumbTrail $trail, $destination){
	$trail->parent('destination.index');
	$trail->push($destination->slug, route('destination.show', $destination));
});

Breadcrumbs::for('destination.edit', function(BreadcrumbTrail $trail, $destination){
	$trail->parent('destination.index');
	$trail->push($destination->slug, route('destination.edit', $destination));
});

Breadcrumbs::for('package.index', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Package List', route('package.index'));
});

Breadcrumbs::for('package.create', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Package Create', route('package.create'));
});

Breadcrumbs::for('package.edit', function(BreadcrumbTrail $trail, $package){
	$trail->parent('package.index');
	$trail->push($package->slug, route('package.edit', $package));
});

Breadcrumbs::for('package.show', function(BreadcrumbTrail $trail, $package){
	$trail->parent('package.index');
	$trail->push($package->slug, route('package.show', $package));
});

Breadcrumbs::for('package_category.index', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Package Category List', route('package_category.index'));
});

Breadcrumbs::for('package_category.create', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Package Category Create', route('package_category.create'));
});

Breadcrumbs::for('package_category.edit', function(BreadcrumbTrail $trail, $packageCategory){
	$trail->parent('package_category.index');
	$trail->push($packageCategory->slug, route('package_category.edit', $packageCategory));
});

Breadcrumbs::for('package_category.show', function(BreadcrumbTrail $trail, $packageCategory){
	$trail->parent('package_category.index');
	$trail->push($packageCategory->slug, route('package_category.show', $packageCategory));
});


Breadcrumbs::for('charge.index', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Charge Setup', route('charge.index'));
});
Breadcrumbs::for('charge.edit', function(BreadcrumbTrail $trail, $charge){
	$trail->parent('charge.index');
	$trail->push($charge->title, route('charge.edit', $charge));
});

Breadcrumbs::for('banner.index', function(BreadcrumbTrail $trail){
	$trail->parent('setting.index');
	$trail->push('Banners List', route('banner.index'));
});


Breadcrumbs::for('banner.edit', function(BreadcrumbTrail $trail, $banner){
	$trail->parent('banner.index');
	$trail->push('Edit', route('banner.edit', $banner));
});

Breadcrumbs::for('page.index', function(BreadcrumbTrail $trail){
	$trail->parent('setting.index');
	$trail->push('Page List', route('page.index'));
});

Breadcrumbs::for('page.create', function(BreadcrumbTrail $trail){
	$trail->parent('setting.index');
	$trail->push('Page Create', route('page.create'));
});

Breadcrumbs::for('page.edit', function(BreadcrumbTrail $trail, $page1){
	$trail->parent('page.index');
	$trail->push($page1->title, route('page.edit', $page1));
});

Breadcrumbs::for('page.show', function(BreadcrumbTrail $trail, $page1){
	$trail->parent('page.index');
	$trail->push($page1->title, route('page.show', $page1));
});



Breadcrumbs::for('member.index', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Members List', route('member.index'));
});
Breadcrumbs::for('member.create', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Member Create', route('member.create'));
});

Breadcrumbs::for('member.edit', function(BreadcrumbTrail $trail, $member){
	$trail->parent('member.index');
	$trail->push($member->slug, route('member.edit', $member));
});

Breadcrumbs::for('member.show', function(BreadcrumbTrail $trail, $member){
	$trail->parent('member.index');
	$trail->push($member->slug, route('member.show', $member));
});


Breadcrumbs::for('blog.create', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Create', route('blog.create'));
});
Breadcrumbs::for('blog.index', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Blog List', route('blog.index'));
});
Breadcrumbs::for('blog.edit', function(BreadcrumbTrail $trail, $blog){
	$trail->parent('blog.index');
	$trail->push($blog->slug, route('blog.edit', $blog));
});
Breadcrumbs::for('blog.show', function(BreadcrumbTrail $trail, $blog){
	$trail->parent('blog.index');
	$trail->push($blog->slug, route('blog.show', $blog));
});
Breadcrumbs::for('testimonial.index', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Testimonial List', route('testimonial.index'));
});
Breadcrumbs::for('testimonial.create', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Create', route('testimonial.create'));
});

Breadcrumbs::for('testimonial.edit', function(BreadcrumbTrail $trail, $testimonial){
	$trail->parent('testimonial.index');
	$trail->push($testimonial->name, route('testimonial.edit', $testimonial));
});

Breadcrumbs::for('faq.index', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('FAQ List', route('faq.index'));
});
Breadcrumbs::for('faq.create', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Create', route('faq.create'));
});

Breadcrumbs::for('activity.index', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Activity List', route('activity.index'));
});
Breadcrumbs::for('activity.edit', function(BreadcrumbTrail $trail, $activity){
	$trail->parent('activity.index');
	$trail->push($activity->slug, route('activity.edit', $activity));
});
Breadcrumbs::for('activity.create', function(BreadcrumbTrail $trail){
	$trail->parent('activity.index');
	$trail->push('Create', route('activity.create'));
});

Breadcrumbs::for('faq.edit', function(BreadcrumbTrail $trail, $faq){
	$trail->parent('faq.index');
	$trail->push($faq->question, route('faq.edit', $faq));
});


Breadcrumbs::for('getTest', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push(route('getTest'));
});





?>