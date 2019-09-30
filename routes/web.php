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


Route::auth();
Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');


Route::get('/', 'HomeController@index')->name('index');
Route::get('product/{id}', 'HomeController@product')->name('product');
Route::get('/payment', 'HomeController@payment')->name('payment');
Route::get('/about_us', 'HomeController@about_us')->name('about_us');
Route::get('/contact_us', 'HomeController@contact_us')->name('contact_us');
Route::get('/terms_conditions', 'HomeController@terms_conditions')->name('terms_conditions');
Route::get('/returns_exchanges', 'HomeController@returns_exchanges')->name('returns_exchanges');
Route::get('/faqs', 'HomeController@faqs')->name('faqs');
Route::get('/shipping_delivery_policy', 'HomeController@shipping_delivery_policy')->name('shipping_delivery_policy');
Route::get('/privacy_policy', 'HomeController@privacy_policy')->name('privacy_policy');
Route::get('/confirm_payment', 'HomeController@confirm_payment')->name('confirm_payment');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/blog_post', 'HomeController@blog_post')->name('blog_post');
Route::get('/quotes', 'HomeController@quotes')->name('quotes');
Route::get('/events', 'HomeController@events')->name('events');

Route::get('/get_sessoin_vam', 'HomeController@get_sessoin_vam')->name('get_sessoin_vam');
Route::get('/get_sessoin_vam2', 'HomeController@get_sessoin_vam2')->name('get_sessoin_vam2');

Route::post('/post_subscribe','HomeController@post_subscribe');


Route::post('post_contact', 'HomeController@post_contact');

Route::get('contact_success', 'HomeController@contact_success');

Route::get('vampireday/', 'HomeController@vampireday')->name('vampireday');
Route::get('/vampireday/form', 'HomeController@vampireday_form')->name('vampireday_form');
Route::post('vampireday/config_form', 'VamsController@config_form');
Route::get('vampireday/thank_you', 'VamsController@thank_you');
Route::post('api_event_status/', 'EventsController@api_event_status');
Route::post('post_confirm_payment', 'HomeController@post_confirm_payment');
Route::get('confirm_payment_success/{id}', 'HomeController@confirm_payment_success');


Route::group(['middleware' => ['UserRole:manager|employee|customer']], function() {

  Route::get('/user_profile', 'ProfileController@user_profile')->name('user_profile');
  Route::get('/buy_history', 'ProfileController@buy_history')->name('buy_history');
  Route::get('/user_point', 'ProfileController@user_point')->name('user_point');
  Route::get('/payment_history', 'ProfileController@payment_history')->name('payment_history');
  Route::get('/events_history', 'ProfileController@events_history')->name('events_history');

  Route::get('/payment_success', 'ProfileController@payment_success')->name('payment_success');
  Route::post('/submit_product/{id}', 'ProfileController@submit_product')->name('submit_product');

});
Route::group(['middleware' => ['UserRole:manager|employee']], function() {

    Route::get('admin/dashboard', 'DashboardController@dashboard');
    Route::get('admin/users', 'StudentController@index');
    Route::resource('admin/events', 'EventsController');
    Route::resource('admin/employee', 'EmployeeController');
    Route::get('admin/events/destroy_del/{id}', 'EventsController@destroy_del');
    Route::resource('admin/products', 'ProductController');
    Route::get('admin/options/destroy_del_gallery/{id}', 'ProductController@destroy_del_gallery');
    Route::post('admin/add_gallery/{id}', 'ProductController@add_gallery');

    Route::resource('admin/options', 'OptionsController');
    Route::post('admin/add_item/{id}', 'OptionsController@add_item');
    Route::get('admin/options/destroy_del_item/{id}', 'OptionsController@destroy_del_item');
    Route::get('admin/options/destroy_option/{id}', 'OptionsController@destroy_option');
    Route::get('admin/vampire_admin', 'VamsController@vampire_admin');

    Route::resource('admin/order_admin', 'OrdersController');

    Route::get('admin/contact', 'ContactController@index');
    Route::post('api_contact_status', 'ContactController@api_contact_status');

    Route::post('api_vam_status', 'VamsController@api_vam_status');

    Route::post('api_slide_status', 'SlideshowController@api_slide_status');
    Route::get('admin/slide_del/{id}', 'SlideshowController@slide_del');
    Route::post('api_pay_status', 'PaymentsController@api_pay_status');

    Route::resource('admin/pay_admin', 'PaymentsController');
    Route::resource('admin/slide', 'SlideshowController');
    Route::get('admin/del_pay/{id}', 'PaymentsController@del_pay');


    Route::get('admin/search_event1', 'VamsController@search_event1');
    Route::get('admin/search_vam', 'VamsController@search_vam');

    Route::get('admin/event1', 'VamsController@event1');
    Route::post('api_event1_status', 'VamsController@api_event1_status');
    Route::post('api_event1_day_status', 'VamsController@api_event1_day_status');


});
