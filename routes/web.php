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

Route::get('/home', 'HomeController@home')->name('home');

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

Route::post('/api/vam_id', 'VamsController@vam_id')->name('vam_id');
Route::post('/api/api_vam_status', 'VamsController@post_vam_status');

Route::get('/join_content_his', 'ContenthisController@join_content_his')->name('join_content_his');


Route::get('/unlock_events_shared/{id}', 'HomeController@unlock_events_shared')->name('unlock_events_shared');

Route::get('/unlock_events', 'Unlock1Controller@unlock_events')->name('unlock_events');




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

  Route::get('/thx_join_events', 'ContenthisController@thx_join_events')->name('thx_join_events');

  Route::post('/add_photo_events', 'ContenthisController@add_photo_events')->name('add_photo_events');
  Route::get('/user_profile', 'ProfileController@user_profile')->name('user_profile');
  Route::get('/buy_history', 'ProfileController@buy_history')->name('buy_history');
  Route::get('/user_point', 'ProfileController@user_point')->name('user_point');
  Route::get('/payment_history', 'ProfileController@payment_history')->name('payment_history');
  Route::get('/events_history', 'ProfileController@events_history')->name('events_history');

  Route::get('/payment_success', 'ProfileController@payment_success')->name('payment_success');

  Route::post('/submit_product/{id}', 'ProfileController@submit_product')->name('submit_product');

});
Route::group(['middleware' => ['UserRole:manager|employee']], function() {



  Route::post('admin/add_product_user', 'StudentController@add_product_user');
  Route::get('admin/del_product_user/{id}', 'StudentController@del_product_user');
  Route::post('admin/add_point_user', 'StudentController@add_point_user');



  Route::get('admin/vampire_add/create', 'VamsController@vampire_add');
  Route::post('admin/post_add_vam', 'VamsController@post_add_vam');

  Route::get('/admin/up_point', 'UppointController@up_point')->name('up_point');
  Route::post('admin/edit_up_poiunt/{id}', 'UppointController@edit_up_poiunt');


  Route::get('/admin/unlock_events', 'Unlock1Controller@unlock_admin')->name('unlock_admin');
  Route::post('admin/unlock_admin_post/', 'Unlock1Controller@unlock_admin_post');
  Route::get('/admin/unlock_events_creat', 'Unlock1Controller@unlock_events_creat')->name('unlock_events_creat');
  Route::post('admin/unlock_item_post/', 'Unlock1Controller@unlock_item_post');
  Route::get('/admin/edit_item_unlock/{id}', 'Unlock1Controller@edit_item_unlock')->name('edit_item_unlock');
  Route::post('admin/post_edit_item_unlock/{id}', 'Unlock1Controller@post_edit_item_unlock');
  Route::get('/admin/del_item_unlock/{id}', 'Unlock1Controller@del_item_unlock')->name('del_item_unlock');



    Route::get('admin/search_student', 'StudentController@search_student');

    Route::get('admin/del_rfid/{id}', 'StudentController@del_rfid');

    Route::get('admin/dashboard', 'DashboardController@dashboard');
    Route::get('admin/vam_json', 'DashboardController@vam_json');
    Route::get('admin/vam_json2', 'DashboardController@vam_json2');



    Route::post('admin/add_rfid_user', 'StudentController@add_rfid_user');
    Route::get('admin/user_data/{id}', 'StudentController@user_data');

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


    Route::get('admin/search_event1', 'MeventsController@search_event2');
    Route::get('admin/search_vam', 'VamsController@search_vam');

    Route::get('admin/event1', 'MeventsController@event1');
    Route::post('api_event1_status', 'VamsController@api_event1_status');
    Route::post('api_event1_day_status', 'VamsController@api_event1_day_status');

    Route::post('api_item_unlock_status', 'Unlock1Controller@api_item_unlock_status');

    Route::post('api_event2_status', 'MeventsController@api_event2_status');
    Route::post('add_qty2_photo', 'MeventsController@add_qty2_photo');


});
