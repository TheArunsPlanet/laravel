    <?php

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\DashboardController;

    // Public pages
    Route::get('/', function () { return view('welcome'); })->name('welcome');

    // Auth routes

    Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.submit');

    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register')->name('register.submit');

    Route::post('/logout', 'logout')->name('logout');
    });

    Route::middleware('auth')->controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');

        Route::get('/create', 'create')->name('create');    
        Route::post('/create', 'store')->name('create.store');

        Route::get('/posts', 'posts')->name('posts');
        Route::get('/posts/{post}/edit', 'edit')->name('posts.edit');

        Route::put('/posts/{post}/edit', 'update')->name('posts.update');
        Route::delete('/posts/{post}/delete', 'destroy')->name('posts.destroy');
    });

