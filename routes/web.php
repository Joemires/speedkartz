<?php


use Illuminate\Support\Facades\Auth;

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

Route::get('', 'HomeController@index')->name('home');

Route::group(['prefix' => 'account'], function () {

    Route::get('', function () {
        return view('account');
    })->name('login');
    // Authentication Routes...
    // $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login')->name('post-login');
    $this->post('logout', 'Auth\LoginController@logout')->name('logout');
    
    // Registration Routes...
    // $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'Auth\RegisterController@register')->name('post-register');
    
    // Password Reset Routes...
    // $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    // $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'Auth\ResetPasswordController@reset');
});

// Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'author'], function () {
    $this -> get('/home', function() {
        return view('admin.home');
    })->name('dashboard.home');
    Route::group(['prefix' => 'product'], function () {
        $this -> match(['get', 'post'], '/add', 'ProductController@index')->name('product.add');
    });

    Route::group(['prefix' => 'category'], function () {
        $this -> get('list', 'CategoryController@index')->name('product.category');
        $this -> match(['get', 'post'], 'add', 'CategoryController@add')->name('product.category.add');
    });

    Route::group(['prefix' => 'subcategory'], function () {
        $this -> get('list', 'SubcategoryController@index')->name('product.subcategory');
        $this -> match(['get', 'post'], 'add', 'SubcategoryController@add')->name('product.subcategory.add');
    });
});