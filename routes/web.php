<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


if (Auth::check()) {
    return redirect(route('profile.index', Auth::getUser()->nickname));
} else {
    // Welcome page
    Route::get('/', function () {
        return view('start/welcome');
    })->name('welcome');

    // Rules page
    Route::get('rules', function () {
        return view('start/rules');
    })->name('rules');

    // Register page
    Route::get('register', function () {
        return view('start/register');
    })->name('register');

    // Login page
    Route::get('login', function () {
        return view('start/login');
    })->name('login');
}

// Logout page
Route::get('logout', function () {
    Auth::logout();
    return redirect(route('welcome'));
})->name('logout');


Route::post('register', [\App\Http\Controllers\Start\RegisterController::class, 'save']);
Route::post('login', [\App\Http\Controllers\Start\LoginController::class, 'login']);


// Profile routes
Route::group(['namespace' => 'Profile', 'middleware' => 'auth', 'prefix' => 'profile'], function () {
    Route::get('/{nickname}', 'IndexController')->name('profile.index');

    // Statistic route
    Route::group(['namespace' => 'Statistic', 'prefix' => '{nickname}/statistic'], function () {
        Route::get('/', 'IndexController')->name('profile.statistic.index');
    });

    // Balance route
    Route::group(['namespace' => 'Balance', 'prefix' => 'balance'], function () {
        Route::get('/{nickname}', 'IndexController')->name('profile.balance.index');

        // Balance store
        Route::post('/', 'StoreController')->name('profile.balance.store');
    });


});

// Admin Routes
Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'IndexController')->name('admin.index');

    // Users Routes
    Route::group(['namespace' => 'Users', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.users.index');
        // Category update
        Route::post('/{user}/update', 'UpdateController')->name('admin.users.update');
    });

    // Posts Routes
    Route::group(['namespace' => 'Posts', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController')->name('admin.posts.index');
        // Category delete
        Route::get('/{post}/delete', 'DeleteController')->name('admin.posts.delete');
        // Category restore
        Route::get('/{post}/restore', 'RestoreController')->withTrashed()->name('admin.posts.restore');
    });

    // Category Routes
    Route::group(['namespace' => 'BlogCategory', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.categories.index');
        // Category create page
        Route::get('/create', 'CreateController')->name('admin.categories.create');
        Route::post('/', 'StoreController')->name('admin.categories.store');
        // Category restore
        Route::get('/{category}/restore', 'RestoreController')->withTrashed()->name('admin.categories.restore');
        // Category delete
        Route::get('/{category}/delete', 'DeleteController')->name('admin.categories.delete');
        // Category update
        Route::post('/{category}/update', 'UpdateController')->withTrashed()->name('admin.categories.update');
    });

    // Rubrics Routes
    Route::group(['namespace' => 'Rubrics', 'prefix' => 'rubrics'], function () {
        Route::get('/', 'IndexController')->withTrashed()->name('admin.rubrics.index');
        // Create Rubric
        Route::post('/', 'StoreController')->name('admin.rubrics.store');
        // Update Rubric
        Route::post('/{rubric}/update', 'UpdateController')->withTrashed()->name('admin.rubrics.update');
        // Delete Rubric
        Route::get('/{rubric}/delete', 'DeleteController')->withTrashed()->name('admin.rubrics.delete');
        // Restore Rubric
        Route::get('/{rubric}/restore', 'RestoreController')->withTrashed()->name('admin.rubrics.restore');
    });

    // Topic Routes
    Route::group(['namespace' => 'Topics', 'prefix' => 'topics'], function () {
        Route::get('/', 'IndexController')->name('admin.topics.index');
        // Delete topic
        Route::get('/{topic}/delete', 'DeleteController')->name('admin.topics.delete');
        // Restore topic
        Route::get('/{topic}/restore', 'RestoreController')->name('admin.topics.restore');
    });


    // Products route
    Route::group(['namespace' => 'Products', 'prefix' => 'products'], function () {
        Route::get('/', 'IndexController')->name('admin.products.index');

        // Delete route
        Route::get('/{product}/delete', 'DeleteController')->name('admin.products.delete');

        // Restore route
        Route::get('/{product}/restore', 'RestoreController')->withTrashed()->name('admin.products.restore');
    });


    // ShopCategory route
    Route::group(['namespace' => 'ShopCategory', 'prefix' => 'shop-category'], function() {
        Route::get('/', 'IndexController')->name('admin.shop-category.index');
        // Create shop category
        Route::post('/', 'StoreController')->name('admin.shop-category.store');
        // Update category
        Route::post('{ProductCategory}/update', 'UpdateController')->withTrashed()->name('admin.shop-category.update');
        // Delete category
        Route::get('{ProductCategory}/delete', 'DeleteController')->withTrashed()->name('admin.shop-category.delete');
        // Restore category
        Route::get('{ProductCategory}/restore', 'RestoreController')->withTrashed()->name('admin.shop-category.restore');
        // Show category product
    });
});

//Blog routes
Route::group(['namespace' => 'Blog', 'middleware' => 'auth', 'prefix' => 'blog'], function() {

    // Post routes
    Route::group(['namespace' => 'Posts', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController')->name('blog.posts.index');
        Route::get('{post}', 'ShowController')->withTrashed()->name('blog.posts.show');

        // Author routes
        Route::group(['namespace' => 'Author', 'prefix' => 'author'], function () {
            Route::get('/{nickname}', 'ShowController')->name('blog.posts.author.show');
        });

    });

    // Category routes
    Route::group(['namespace' => 'Category', 'prefix' => 'category'], function () {
        Route::get('/', 'IndexController')->name('blog.category.index');
        // View category post
        Route::get('{category}', 'ShowController')->withTrashed()->name('blog.category.show');
    });

    // MyBlog routes
    Route::group(['namespace' => 'MyBlog', 'prefix' => 'myblog'], function () {
        Route::get('/', 'IndexController')->name('blog.myblog.index');
        // Edit post
        Route::get('{post}/update', 'EditController')->name('blog.myblog.edit');
        Route::post('{post}', 'UpdateController')->name('blog.myblog.update');
        // Delete post
        Route::get('delete/{post}', 'DeleteController')->name('blog.myblog.delete');
        // Create post
        Route::get('create', 'CreateController')->name('blog.myblog.create');
        Route::post('/', 'StoreController')->name('blog.myblog.store');
    });

    // Favorite routes
    Route::group(['namespace' => 'Favorite', 'prefix' => 'favorite'], function () {
        Route::get('/', 'IndexController')->name('blog.favorite.index');
        // Create favorite
        Route::get('{post}/create', 'CreateController')->name('blog.favorite.create');
        // Delete favorite
        Route::get('{post}/delete', 'DeleteController')->name('blog.favorite.delete');
    });

    // Delete routes
    Route::group(['namespace' => 'Deleted', 'prefix' => 'deleted'], function () {
        Route::get('/', 'IndexController')->name('blog.deleted.index');
        // Show deleted post
        Route::get('/{post}', 'ShowController')->withTrashed()->name('blog.deleted.show');
        // Restore deleted post
        Route::get('/{post}/restore', 'RestoreController')->withTrashed()->name('blog.deleted.restore');
    });

    // Draft routes
    Route::group(['namespace' => 'Draft', 'prefix' => 'draft'], function () {
        Route::get('/', 'IndexController')->name('blog.draft.index');
        // Create draft
        Route::post('/store', 'StoreController')->name('blog.draft.store');
        // Draft update
        Route::get('{post}/update', 'UpdateController')->name('blog.draft.update');
    });
});

// Forum Routes
Route::group(['namespace' => 'Forum', 'middleware' => 'auth', 'prefix' => 'forum'], function () {

    // Rubric Route
    Route::group(['namespace' => 'Rubric', 'prefix' => 'rubric'], function () {
        Route::get('/', 'IndexController')->name('forum.rubric.index');

        Route::get('/{rubric}', 'ShowController')->name('forum.rubric.show');
    });

    // Topic Route
    Route::group(['namespace' => 'Topic', 'prefix' => 'topic'], function () {
        Route::get('/','IndexController')->name('forum.topic.index');
        // Show Topic
        Route::get('/{topic}', 'ShowController')->name('forum.topic.show');
        // Create message
        Route::post('/{topic}', 'StoreController')->name('forum.topic.store');
        // Change topic status
        Route::get('/{topic}/close', 'StatusController@close')->name('forum.topic.close');
        Route::get('/{topic}/open', 'StatusController@open')->name('forum.topic.open');

        // Topic Route
        Route::group(['namespace' => 'Author', 'prefix' => 'author'], function() {
           Route::get('/{nickname}', 'IndexController')->name('forum.topic.author.index');
        });
    });

    // MyTopic Route
    Route::group(['namespace' => 'MyTopic', 'prefix' => 'mytopic'], function () {
        Route::get('/', 'IndexController')->name('forum.mytopic.index');
        // Create topic
        Route::get('/create', 'CreateController')->name('forum.mytopic.create');
        Route::post('/store', 'StoreController')->name('forum.mytopic.store');
    });

});


// Shop routes
Route::group(['namespace' => 'Shop', 'middleware' => 'auth' ,'prefix' => 'shop'], function () {

    // Product route
    Route::group(['namespace' => 'Product', 'prefix' => 'product'], function () {
        Route::get('/', 'IndexController')->name('shop.product.index');

        // Show product route
        Route::get('/{product}/show', 'ShowController')->name('shop.product.show');

        // Author product
        Route::group(['namespace' => 'Author', 'prefix' => 'author'], function () {
            Route::get('/{nickname}', 'IndexController')->name('shop.product.author.index');
        });
    });

    // Category route
    Route::group(['namespace' => 'Category', 'prefix' => 'category'], function () {
       Route::get('/', 'IndexController')->name('shop.category.index');
       // Shop category post
        Route::get('/{category_id}', 'ShowController')->name('shop.category.show');
    });


    // myCard route
    Route::group(['namespace' => 'MyCard', 'prefix' => 'mycard'], function () {
        Route::get('/', 'IndexController')->name('shop.mycard.index');
        // Сreate form
        Route::get('/create', 'CreateController')->name('shop.mycard.create');
        // Store route
        Route::post('/', 'StoreController')->name('shop.mycard.store');
        // Edit route
        Route::get('/{product}/edit', 'EditController')->name('shop.mycard.edit');
        // Update route
        Route::post('/{product}/update', 'UpdateController')->name('shop.mycard.update');
    });

    // favorite product route
    Route::group(['namespace' => 'Favorite', 'prefix' => 'favorite'], function() {
       Route::get('/', 'IndexController')->name('shop.favorite.index');
       // Crete favorite
        Route::get('/{product}/create', 'CreateController')->name('shop.favorite.create');
        // Delete favorie
        Route::get('/{product}/delete', 'DeleteController')->name('shop.favorite.delete');
    });


    // card route
    Route::group(['namespace' => 'Card', 'prefix' => 'card'], function() {
        Route::get('/', 'IndexController')->name('shop.card.index');

        // Store card
        Route::get('/{product}/store', 'StoreController')->name('shop.card.store');
        // Remove product in card
        Route::get('/{order}/delete', 'DeleteController')->name('shop.card.delete');
        // Update product in card
        Route::post('/{order}/update', 'UpdateController')->name('shop.card.update');
    });

    // order route
    Route::group(['namespace' => 'Order', 'prefix' => 'order'], function() {
        Route::get('/', 'IndexController')->name('shop.order.index');

        // Store route
        Route::post('/store', 'StoreController')->name('shop.order.store');
        // delete route
        Route::get('{order}/delete', 'DeleteController')->name('shop.order.delete');
    });


    // seller route
    Route::group(['namespace' => 'Seller', 'prefix' => 'seller'], function () {
        Route::get('/', 'IndexController')->name('shop.seller.index');

        // Status update route
        Route::post('/{order}/update', 'UpdateController')->name('shop.seller.update');
    });
});
