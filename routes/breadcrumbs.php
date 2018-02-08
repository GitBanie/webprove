<?php

// Home
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('post.index'));
});

Breadcrumbs::register('post', function ($breadcrumbs, $post) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push($post->title, route('post.show', $post));
});

// Create
Breadcrumbs::register('create', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('New post', route('post.create'));
});
