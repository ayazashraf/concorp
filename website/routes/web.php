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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/','WelcomeController@index');
Auth::routes();

Route::get('/login/admin', 'Auth\AdminLoginController@showLoginForm');
Route::get('/login/tenant', 'Auth\LoginController@showUserLoginForm')->name('login');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/tenant', 'Auth\RegisterController@showUserRegisterForm');

Route::post('/login/admin', 'Auth\AdminLoginController@login');
Route::post('/login/tenant', 'Auth\LoginController@userLogin');
Route::post('/login', 'Auth\LoginController@userLogin')->name('login');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/tenant', 'Auth\RegisterController@create');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'AdminController@index');
Route::get('/tenant', 'DataController@profile')->middleware('auth')->name('tenant');
Route::get('/tenant/edit', 'DataController@profile_edit')->middleware('auth')->name('tenant.edit');
Route::post('/tenant/update', 'DataController@profile_update')->middleware('auth')->name('tenant.update');

Route::get('/tenant/payments', 'DataController@tenantpayment')->middleware('auth')->name('payments');
Route::get('/tenant/documents', 'DataController@tenantdocument')->middleware('auth')->name('documents');
Route::get('/tenant/report', 'DataController@tenantreport')->middleware('auth')->name('tenant.report');
Route::get('/tenant/vehicle', 'DataController@tenantvehicle')->middleware('auth')->name('vehicles');

Route::prefix('admin')->group(function() {

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');    
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');    
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('logout');        

    Route::prefix('admins')->group(function() {        
        Route::get('/create', 'AdminController@create')->name('admins.create');
        Route::get('/destroy/{id}', 'AdminController@destroy')->name('admins.destroy');
        Route::get('/show/{admin}', 'AdminController@show')->name('admins.show');
        Route::get('/edit/{admin}', 'AdminController@edit')->name('admins.edit');
        Route::put('/update/{admin}', 'AdminController@update')->name('admins.update');
        Route::post('/store', 'AdminController@store')->name('admins.store');
        Route::get('/search','AdminController@search');
        Route::get('/', 'AdminController@index')->name('admin.home');
    });

    // Admin pages routes
    Route::prefix('pages')->group(function() {
        Route::get('/create', 'PageController@create')->name('page.create');
        Route::get('/destroy/{id}', 'PageController@destroy')->name('page.destroy');
        Route::get('/show/{page}', 'PageController@show')->name('page.show');
        Route::get('/edit/{page}', 'PageController@edit')->name('page.edit');
        Route::put('/update/{page}', 'PageController@update')->name('page.update');
        Route::post('/store', 'PageController@store')->name('page.store');                    
        Route::get('/search','PageController@search')->name('page.search');
        Route::get('/removeimage','PageController@removeImage')->name('page.removeImage');     
        Route::get('/', 'PageController@index')->name('page.home');        
    });    

    // Admin blogs routes
    Route::prefix('blogs')->group(function() {
        Route::get('/create', 'BlogController@create')->name('blogs.create');
        Route::get('/destroy/{id}', 'BlogController@destroy')->name('blogs.destroy');
        Route::get('/show/{blog}', 'BlogController@show')->name('blogs.show');
        Route::get('/edit/{blog}', 'BlogController@edit')->name('blogs.edit');
        Route::put('/update/{blog}', 'BlogController@update')->name('blogs.update');
        Route::post('/store', 'BlogController@store')->name('blogs.store');   
        Route::get('/search','BlogController@search')->name('blogs.search');    
        Route::get('/removeblogimage','BlogController@removeImage')->name('blog.removeImage');         
        Route::get('/', 'BlogController@index')->name('blogs.home');                  
    });
    
    

    // Admin Tenants routes
    Route::prefix('users')->group(function() {
        Route::get('/create', 'UserController@create')->name('users.create');
        Route::get('/destroy/{id}', 'UserController@destroy')->name('users.destroy');
        Route::get('/show/{user}', 'UserController@show')->name('users.show');
        Route::get('/edit/{user}', 'UserController@edit')->name('users.edit');
        Route::put('/update/{user}', 'UserController@update')->name('users.update');
        Route::post('/store', 'UserController@store')->name('users.store');            
        Route::get('/search','UserController@search')->name('users.search');        
        Route::get('/{user}/reset','UserController@sendResetEmail')->name('users.reset');        
        Route::get('/', 'UserController@index')->name('users.home');        
         
    });   

     // Admin Tenants routes
     Route::prefix('testimonials')->group(function() {
        Route::get('/create', 'TestimonialController@create')->name('testimonials.create');
        Route::get('/destroy/{id}', 'TestimonialController@destroy')->name('testimonials.destroy');
        Route::get('/show/{testimonial}', 'TestimonialController@show')->name('testimonials.show');
        Route::get('/edit/{testimonial}', 'TestimonialController@edit')->name('testimonials.edit');
        Route::post('/update/{testimonial}', 'TestimonialController@update')->name('testimonials.update');
        Route::post('/store', 'TestimonialController@store')->name('testimonials.store');            
        Route::get('/search','TestimonialController@search')->name('testimonials.search');
        Route::get('/', 'TestimonialController@index')->name('testimonials.home');        
        
    });    

    // Admin Property routes
    Route::prefix('properties')->group(function() {
        Route::get('/create', 'BusinessController@create')->name('business.create');
        Route::get('/destroy/{id}', 'BusinessController@destroy')->name('business.destroy');  
        Route::get('/edit/{business}', 'BusinessController@edit')->name('business.edit');
        Route::put('/update/{business}', 'BusinessController@update')->name('business.update');
        Route::post('/store', 'BusinessController@store')->name('business.store');            
        Route::get('/search','BusinessController@search')->name('business.search');
        Route::get('/{business}/items', 'BusinessController@getItems')->name('business.items');
        
        Route::get('/photos/{business}','BusinessPhotoController@index')->name('photo.home');
        Route::get('/photos/destroy/{photo}','BusinessPhotoController@destroy')->name('photo.destroy');
        Route::get('/photos/edit/{business}','BusinessPhotoController@edit')->name('photo.edit');
        Route::get('/photos/create/{business}','BusinessPhotoController@create')->name('photo.create');
        Route::post('/photos/store/{business}','BusinessPhotoController@store')->name('photo.store');
        Route::get('/photos/search','BusinessPhotoController@search')->name('photo.search');                    
        
        Route::get('/videos/{business}','BusinessVideoController@index')->name('video.home');
        Route::get('/videos/destroy/{id}','BusinessVideoController@destroy')->name('video.destroy');
        Route::get('/videos/edit/{business}','BusinessVideoController@edit')->name('video.edit');
        Route::get('/videos/search','BusinessVideoController@search')->name('video.search');

        Route::get('/units/create/{business}', 'BusinessItemController@create')->name('item.create');
        Route::get('/units/{business}','BusinessItemController@index')->name('item.home');
        Route::post('/units/store/{business}','BusinessItemController@store')->name('item.store');
        Route::get('/units/destroy/{id}','BusinessItemController@destroy')->name('item.destroy');
        Route::get('/units/edit/{item}','BusinessItemController@edit')->name('item.edit');
        Route::put('/units/update/{item}', 'BusinessItemController@update')->name('item.update');
        Route::get('/units/search','BusinessItemController@search')->name('item.search');
                

        Route::get('/', 'BusinessController@index')->name('business.home');        

    });        

    // Admin Inquiries routes
    Route::prefix('inquiries')->group(function() {
        Route::get('/', 'InquiryController@index')->name('admin.inquiries.home');
        Route::get('/show/{inquiry}', 'InquiryController@show')->name('admin.inquiries.show');        
    }); 

    // Admin Appointments routes
    Route::prefix('appointments')->group(function() {
        Route::get('/', 'AppointmentController@index')->name('admin.appointments.home');
        Route::get('/show/{appointment}', 'AppointmentController@show')->name('admin.appointments.show');        
    }); 

     // Admin Reports routes
    Route::prefix('reports')->group(function() {
        Route::get('/', 'ReportController@index')->name('admin.reports.home');
        Route::get('/show/{report}', 'ReportController@show')->name('admin.reports.show');        
    }); 

     // Admin contacts routes
    Route::prefix('contacts')->group(function() {
        Route::get('/', 'ContactController@index')->name('admin.contacts.home');
        Route::get('/show/{contact}', 'ContactController@show')->name('admin.contacts.show');        
    }); 

     // Admin Leases routes
     Route::prefix('leases')->group(function() {
        Route::get('/', 'DocumentController@index')->name('admin.leases.home');
        Route::get('/destroy/{id}', 'DocumentController@destroy')->name('admin.leases.destroy');
        Route::get('/show/{document}', 'DocumentController@show')->name('admin.leases.show');        
        Route::get('/create','DocumentController@create')->name('admin.leases.create');        
        Route::post('/store', 'DocumentController@store')->name('admin.leases.store');            
    }); 

     // Admin User Leases routes
     Route::prefix('user')->group(function() {
        Route::get('/leases/{user}', 'UserDocumentController@index')->name('user.leases');
        Route::get('/payments/{user}', 'PaymentController@index')->name('user.payments');
        Route::get('/vehicles/{user}', 'VehicleController@index')->name('user.vehicles');
    });    
    
     // Admin Suscriptions routes
     Route::prefix('suscriptions')->group(function() {
        Route::get('/', 'SubscriptionController@index')->name('admin.suscriptions.home');        
    }); 

});
Route::get('admin/photos/assigntoitem','BusinessPhotoController@assignToItem');     
Route::get('admin/photos/assignToBusiness','BusinessPhotoController@assignToBusiness');     

Route::get('/getBusinesses','DataController@businessList')->name('businesslist');
Route::get('/getTestimonials','DataController@testmonialList')->name('testimonialslist');

Route::view('/management-services/garbage-grass-snow','garbage')->name('garbage');
Route::view('/management-services/ice-control','icecontrol')->name('ice.control');
Route::view('/management-services','managementservices')->name('management.services');
Route::view('/management-services/full-management','fullmanagement')->name('management.services');
Route::view('/management-services/snow-removal','snowremoval')->name('snow.removal');
Route::view('/management-services/pest-management','pestmanagement')->name('pest.management');
Route::view('/management-services/repair-renovation','repairrenovation')->name('repair.renovation');
Route::view('/management-services/appliances-repair','appliancesrepair')->name('appliances.repair');
Route::view('/about','about')->name('about');
Route::view('/services','services')->name('services');
Route::view('/about/faqs','faqs')->name('faqs');
Route::view('/contact','contact')->name('contact');
Route::view('/residents/leases','leases')->name('leases');
Route::view('/residents/valley-waste-sorting-guides','wastesorting')->name('waste.sorting');

Route::get('/blogs','DataController@blogsList')->name('blogs');
Route::get('/blogs/{blog}','DataController@blogdetail')->name('blog.detail');
Route::get('/residents/report-maintenance','DataController@report')->name('report');
Route::post('/residents/submitreport','DataController@submitreport')->name('report.submit');

Route::get('/feedback/create','DataController@feedback')->name('feedback.write');
Route::post('/feedback/submit','DataController@submitfeedback')->name('feedback.submit');

Route::get('/appointment/book','DataController@bookappointment')->name('book.appiontment');
Route::post('/appointment/submit','DataController@submitappointment')->name('appointment.submit');

Route::get('/vehicle/add','DataController@createvehicle')->name('create.vehicle');
Route::post('/vehicle/submit','DataController@submitvehicle')->name('vehicle.submit');

Route::get('/lease/upload','DataController@createlease')->name('create.lease');
Route::post('/document/submit','DataController@submitdocument')->name('document.submit');

Route::get('/payment/upload','DataController@createpayment')->name('create.payment');
Route::post('/payment/submit','DataController@submitpayment')->name('payment.submit');

Route::post('/contact/submit','DataController@submitcontact')->name('contact.submit');

Route::get('/cities/wolfville','DataController@propertyList')->name('list.property');
Route::post('/cities/wolfville','DataController@searchproperty')->name('search.property');

Route::post('/booking/inquiry','DataController@bookinginquiry')->name('booking.inquiry');

Route::get('/rentals/{name}','DataController@rentals')->name('rentals');

Route::get('/email','EmailController@sendEmail')->name('emailtest');

Route::post('/subscription','DataController@subscription')->name('subscription');

Route::get('/testimonials','DataController@testimonialsList')->name('testimonials');