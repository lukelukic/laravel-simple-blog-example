<?php

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

/*
    Rute u kojima svaka predstavlja jednu fizicku stranicu
*/
Route::get("/", "FrontendController@index")->name("home");
Route::get("/posts/{id}", "FrontendController@single")->name("single");
Route::get("/gallery", "FrontendController@gallery")->name('gallery');
Route::get("/login", "FrontendController@showLoginForm")->name("loginForm");
Route::get("/register", "FrontendController@showRegisterForm")->name('registerForm');
/*
    Rute za upravljanje komentarima
*/
Route::post("/comments/{postId}", "CommentsController@postComment")->name("postComment");
Route::post("/comments/{commentId}/edit", "CommentsController@editComment")->name("editComment");
Route::get("/comments/{commentId}/delete", "CommentsController@deleteComment")->name("deleteComment");
Route::get("/comments/{commentId}/show", "CommentsController@show")->name("showComment");

/*
    Rute za registraciju, logovanje i odjavu
*/
Route::post("/do-login", "LoginController@login")->name("login");
Route::post("/do-register", "LoginController@register")->name("register");
Route::get("/logout", "LoginController@logout")->name("logout");

/*
    Admin rute - mogu da se koriste Resource rute, u tom slučaju generišu se get, post, patch i delete zahtevi
*/

Route::group(['middleware' => 'admin'], function(){
    Route::get("/admin/users", "Admin\UsersController@index")->name("users.index");
    Route::get("/admin/users/create", "Admin\UsersController@create")->name("users.create");
    Route::get("/admin/users/{id}", "Admin\UsersController@show")->name("users.show");
    Route::post("/admin/users", "Admin\UsersController@store")->name("users.store");
    Route::post("/admin/users/{id}/update", "Admin\UsersController@update")->name("users.update");
    Route::get("/admin/users/{id}/delete", "Admin\UsersController@destroy")->name("users.delete");

    Route::get("/admin/navigation", "Admin\NavigationController@index")->name("navigation.index");
    Route::get("/admin/navigation/create", "Admin\NavigationController@create")->name("navigation.create");
    Route::get("/admin/navigation/{id}", "Admin\NavigationController@show")->name("navigation.show");
    Route::post("/admin/navigation", "Admin\NavigationController@store")->name("navigation.store");
    Route::post("/admin/navigation/{id}/update", "Admin\NavigationController@update")->name("navigation.update");
    Route::get("/admin/navigation/{id}/delete", "Admin\NavigationController@destroy")->name("navigation.delete");

    Route::get("/admin/posts", "Admin\PostController@index")->name("posts.index");
    Route::get("/admin/posts/create", "Admin\PostController@create")->name("posts.create");
    Route::get("/admin/posts/{id}", "Admin\PostController@show")->name("posts.show");
    Route::post("/admin/posts", "Admin\PostController@store")->name("posts.store");
    Route::post("/admin/posts/{id}/update", "Admin\PostController@update")->name("posts.update");
    Route::get("/admin/posts/{id}/delete", "Admin\PostController@destroy")->name("posts.delete");

    Route::get("/admin/gallery", "Admin\GalleryController@index")->name("gallery.index");
    Route::get("/admin/gallery/create", "Admin\GalleryController@create")->name("gallery.create");
    Route::get("/admin/gallery/{id}", "Admin\GalleryController@show")->name("gallery.show");
    Route::post("/admin/gallery", "Admin\GalleryController@store")->name("gallery.store");
    Route::post("/admin/gallery/{id}/update", "Admin\GalleryController@update")->name("gallery.update");
    Route::get("/admin/gallery/{id}/delete", "Admin\GalleryController@destroy")->name("gallery.delete");

    Route::get("/admin/roles", "Admin\RoleController@index")->name("roles.index");
    Route::get("/admin/roles/create", "Admin\RoleController@create")->name("roles.create");
    Route::get("/admin/roles/{id}", "Admin\RoleController@show")->name("roles.show");
    Route::post("/admin/roles", "Admin\RoleController@store")->name("roles.store");
    Route::post("/admin/roles/{id}/update", "Admin\RoleController@update")->name("roles.update");
    Route::get("/admin/roles/{id}/delete", "Admin\RoleController@destroy")->name("roles.delete");

    Route::get("/admin/social", "Admin\SocialNetworkController@index")->name("social.index");
    Route::get("/admin/social/create", "Admin\SocialNetworkController@create")->name("social.create");
    Route::get("/admin/social/{id}", "Admin\SocialNetworkController@show")->name("social.show");
    Route::post("/admin/social", "Admin\SocialNetworkController@store")->name("social.store");
    Route::post("/admin/social/{id}/update", "Admin\SocialNetworkController@update")->name("social.update");
    Route::get("/admin/social/{id}/delete", "Admin\SocialNetworkController@destroy")->name("social.delete");
});

