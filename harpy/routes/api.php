<?php

use App\Models\Post;

Route::get('/posts', function () {
    return \App\Models\Post::all()->makeHidden([
        'created_at',
        'updated_at',
    ]);
});

Route::get('/posts/{id}', function ($id) {
    return \App\Models\Post::findOrFail($id)->makeHidden([
        'created_at',
        'updated_at',
    ]);
});