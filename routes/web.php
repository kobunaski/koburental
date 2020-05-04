<?php

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

Route::group(['prefix' => 'admin', 'middleware' => 'adminValidation'], function (){
    Route::get('home', 'HomeController@index');

    Route::group(['prefix' => 'role'], function(){
        Route::get('view', 'RoleController@view');

        Route::get('add', 'RoleController@getAdd');
        Route::post('add', 'RoleController@postAdd');

        Route::get('edit/{id}', 'RoleController@getEdit');
        Route::post('edit/{id}', 'RoleController@postEdit');

        Route::get('delete/{id}', 'RoleController@getDelete');
    });

    Route::group(['prefix' => 'user'], function(){
        Route::get('view', 'UserController@view');

        Route::get('add', 'UserController@getAdd');
        Route::post('add', 'UserController@postAdd');

        Route::get('edit/{id}', 'UserController@getEdit');
        Route::post('edit/{id}', 'UserController@postEdit');

        Route::get('delete/{id}', 'UserController@getDelete');
    });

    Route::group(['prefix' => 'manufacture'], function(){
        Route::get('view', 'ManufactureController@view');

        Route::get('add', 'ManufactureController@getAdd');
        Route::post('add', 'ManufactureController@postAdd');

        Route::get('edit/{id}', 'ManufactureController@getEdit');
        Route::post('edit/{id}', 'ManufactureController@postEdit');

        Route::get('delete/{id}', 'ManufactureController@getDelete');
    });

    Route::group(['prefix' => 'payment_type'], function(){
        Route::get('view', 'PaymenttypeController@view');

        Route::get('add', 'PaymenttypeController@getAdd');
        Route::post('add', 'PaymenttypeController@postAdd');

        Route::get('edit/{id}', 'PaymenttypeController@getEdit');
        Route::post('edit/{id}', 'PaymenttypeController@postEdit');

        Route::get('delete/{id}', 'PaymenttypeController@getDelete');
    });

    Route::group(['prefix' => 'pickup_location'], function(){
        Route::get('view', 'PickupLocationController@view');

        Route::get('add', 'PickupLocationController@getAdd');
        Route::post('add', 'PickupLocationController@postAdd');

        Route::get('edit/{id}', 'PickupLocationController@getEdit');
        Route::post('edit/{id}', 'PickupLocationController@postEdit');

        Route::get('delete/{id}', 'PickupLocationController@getDelete');
    });

    Route::group(['prefix' => 'vehicle_type'], function(){
        Route::get('view', 'VehicleTypeController@view');

        Route::get('add', 'VehicleTypeController@getAdd');
        Route::post('add', 'VehicleTypeController@postAdd');

        Route::get('edit/{id}', 'VehicleTypeController@getEdit');
        Route::post('edit/{id}', 'VehicleTypeController@postEdit');

        Route::get('delete/{id}', 'VehicleTypeController@getDelete');
    });

    Route::group(['prefix' => 'vehicle'], function(){
        Route::get('view', 'VehicleController@view');

        Route::get('add', 'VehicleController@getAdd');
        Route::post('add', 'VehicleController@postAdd');

        Route::get('edit/{id}', 'VehicleController@getEdit');
        Route::post('edit/{id}', 'VehicleController@postEdit');

        Route::get('delete/{id}', 'VehicleController@getDelete');
    });

    Route::group(['prefix' => 'vehicle_detail'], function(){
        Route::get('view', 'VehicleDetailController@view');

        Route::get('add/{id}', 'VehicleDetailController@getAdd');

        Route::post('add/{id}', 'VehicleDetailController@postAdd');

        Route::post('edit/{id}', 'VehicleDetailController@postEdit');
    });

    Route::group(['prefix' => 'feedback'], function(){
        Route::get('view', 'FeedbackController@view');
    });
});

Route::get('/home', 'ClientController@view');
Route::get('/index', 'ClientController@view');
Route::get('/', function(){
    return redirect('home');
});


Route::get('about', 'ClientController@about');
Route::get('contact', 'ClientController@contact');
Route::post('contact', 'ClientController@postContact');
Route::get('success', 'BookingController@getSuccess');

//Route::get('profile', 'UserController@viewProfileClient');
//Route::post('profile/{id}', 'UserController@postProfileClient');

Route::group(['prefix' => 'profile', 'middleware' => 'checkloginMiddleware'], function (){
    Route::get('/', 'UserController@viewProfileClient');

    Route::get('/verify-email/{id}', 'UserController@verifyEmail');

    Route::get('/edit', 'UserController@getEditProfileClient');
    Route::post('/edit/{id}', 'UserController@postEditProfileClient');

    Route::get('/view/order/all', 'BookingController@viewOrder');
    Route::get('/view/order/pending', 'BookingController@viewOrderPending');
    Route::get('/view/order/pending-payment', 'BookingController@viewOrderPendingPayment');
    Route::get('/view/order/processing', 'BookingController@viewOrderProcessing');
    Route::get('/view/order/completed', 'BookingController@viewOrderCompleted');
    Route::get('/view/order/declined', 'BookingController@viewOrderDeclined');
});

Route::group(['prefix' => 'vehicle'], function (){
    Route::get('/', 'VehicleController@viewClient');
    Route::get('/detail/{id}', 'VehicleController@viewDetailClient');

    Route::post('/feedback/{id}', 'FeedbackController@addFeedback');
    Route::get('/feedback/delete/{id}', 'FeedbackController@deleteFeedback');

    Route::group(['prefix' => 'booking', 'middleware' => 'checkloginMiddleware'], function (){
        Route::get('{id}', 'BookingController@detailConfirm');
        Route::post('{id}', 'BookingController@postConfirm');
    });
});

Route::group(['prefix' => 'order', 'middleware' => 'staffValidation'], function(){
    Route::get('confirm/{id}', 'BookingController@confirmOrder');
    Route::get('decline/{id}', 'BookingController@declineOrder');

});

Route::get('order/payment/{id}', 'BookingController@paymentOrder');
Route::get('payment/success', 'PaymentController@paymentOrderSuccess');

Route::group(['prefix' => 'article'], function (){
    Route::get('/', 'ArticleController@viewClient');
});

Route::group(['prefix' => 'login'], function (){
    Route::post('/', 'UserController@postLogin');
});

Route::group(['prefix' => 'email'], function (){
    Route::get('/verify/{id}', 'UserController@getVerifyEmail');
});

Route::group(['prefix' => 'signup'], function (){
    Route::post('/', 'UserController@postSignup');
});

Route::group(['prefix' => 'logout'], function (){
    Route::get('/', 'UserController@getLogout');
});


Route::group(['prefix' => 'error'], function (){
    Route::get('/','ClientController@errorMiddleware');
    Route::get('/login', 'ClientController@errorLogin');
});

Route::get('test', 'HomeController@test');


