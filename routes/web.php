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

// GET DOMAINs

Route::domain('www.babcasa.com')->group(function (){
    Route::get('/', function () {
        return view('welcome');
    });
   

});

Route::domain('staff.babcasa.com')->group(function (){
    Route::get('/', function () {
        return view('welcome');
    });
   
    
});

Route::domain('partner.babcasa.com')->group(function (){
    Route::get('/test', 'ProductController@index'); 
    
    Route::get('/register', 'auth\PartnerRegisterController@showRegisterForm'); 
    Route::get('/sign-in', 'Auth\PartnerLoginController@showLoginForm');
    Route::get('/', 'PartnerController@dashboard');
    Route::get('/logout', 'Auth\PartnerLoginController@logout');
    Route::get('/password', 'Auth\PartnerForgotPasswordController@showLinkRequestForm');
    Route::get('{partner}/password/reset/{token}', 'auth\PartnerResetPasswordController@showResetForm');
    Route::get('security', 'PartnerController@security');
    Route::get('settings', 'PartnerController@edit');

     //client finale gestion support routes start 
     Route::prefix('support')->group(function() {
         Route::get('ticket','ClaimController@index');
        Route::get('/','SubjectController@index');
        Route::prefix('{subject}')->group(function() {
            Route::prefix('ticket')->group(function() {
                Route::get('create','ClaimController@create');
            });
        });
    });
   

});




// POST DOMAINs
Route::domain('www.babcasa.com')->group(function (){

    Route::post('/', function () {
        return view('welcome');
    }); 

    
});

Route::domain('partner.babcasa.com')->group(function (){

    Route::post('register', 'auth\PartnerRegisterController@store')->name('pqrtner.register.submit'); 
    Route::post('/sign-in', 'Auth\PartnerLoginController@login');
    Route::delete('partner/{partner}/deactivate', 'PartnerController@destroy');
    Route::post('password/email', 'auth\PartnerForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'auth\PartnerResetPasswordController@reset');
    Route::delete('{partner}/security/{session}', 'PartnerController@sessionDestroy');
    Route::post('{partner}/settings/update', 'PartnerController@update');

      //client finale gestion support routes start 
    Route::prefix('support')->group(function() {
        Route::prefix('{subject}')->group(function() {
            Route::prefix('ticket')->group(function() {
                Route::post('create','ClaimController@store');
            });
        });
    });

});

Route::domain('staff.babcasa.com')->group(function (){

    Route::post('/', function () {
        return view('welcome');
    });


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');






// UI

Route::domain('partner.babcasa.com')->group(function (){


    Route::get('/', function () {
        return view('system.backoffice.partner.dashboard');
    }); 

    Route::get('/login', function () { 
        return view('system.backoffice.partner.login');
    }); 

    Route::get('/password/email', function () { 
        return view('system.backoffice.partner.password.email');
    }); 

    Route::get('/reset', function () { 
        return view('system.backoffice.partner.password.reset');
    }); 

    Route::get('/log', function () { 
        return view('system.backoffice.partner.log');
    }); 

    Route::get('/settings', function () { 
        return view('system.backoffice.partner.settings');
    }); 

    Route::get('/claims', function () { 
        return view('claims.backoffice.partner.index');
    }); 
    Route::get('/claims/create', function () { 
        return view('claims.backoffice.partner.create');
    }); 
    Route::get('/claims/show', function () { 
        return view('claims.backoffice.partner.show');
    }); 
    Route::get('/subjects', function () { 
        return view('subjects.backoffice.partner.index');
    }); 


}); 

Route::domain('staff.babcasa.com')->group(function (){

    Route::get('/', function () {
        return view('system.backoffice.staff.dashboard');
    }); 

    Route::get('/login', function () { 
        return view('system.backoffice.staff.login');
    });  

    Route::get('/security', function () {
        return view('system.backoffice.staff.security');
    }); 

    Route::get('/password/email', function () { 
        return view('system.backoffice.staff.password.email');
    }); 

    Route::get('/reset', function () { 
        return view('system.backoffice.staff.password.reset');
    }); 

    Route::get('/log', function () { 
        return view('system.backoffice.staff.log');
    }); 

    Route::get('/settings', function () { 
        return view('system.backoffice.staff.settings');
    });
    Route::get('/profile', function () { 
        return view('system.backoffice.staff.profile');
    }); 


    Route::get('/staff', function () { 
        return view('staff.backoffice.index');
    }); 
    Route::get('/staff/create', function () { 
        return view('staff.backoffice.create');
    }); 
    Route::get('/staff/show', function () { 
        return view('staff.backoffice.show');
    }); 

    Route::get('/partner', function () { 
        return view('partners.backoffice.index');
    }); 
    Route::get('/partner/create', function () { 
        return view('partners.backoffice.create');
    }); 
    Route::get('/partner/show', function () { 
        return view('partners.backoffice.show');
    }); 

    Route::get('/clients/business', function () { 
        return view('clients_business.backoffice.index');
    }); 
    Route::get('/clients/business/create', function () { 
        return view('clients_business.backoffice.create');
    }); 
    Route::get('/clients/business/show', function () { 
        return view('clients_business.backoffice.show');
    }); 

    Route::get('/clients/particular', function () { 
        return view('clients_particular.backoffice.index');
    }); 
    Route::get('/clients/particular/create', function () { 
        return view('clients_particular.backoffice.create');
    }); 
    Route::get('/clients/particular/show', function () { 
        return view('clients_particular.backoffice.show');
    }); 

    Route::get('/categories', function () { 
        return view('categories.backoffice.index');
    }); 
    Route::get('/categories/create', function () { 
        return view('categories.backoffice.create');
    }); 
    Route::get('/categories/show', function () { 
        return view('categories.backoffice.show');
    }); 

    Route::get('/claims', function () { 
        return view('claims.backoffice.staff.index');
    }); 
    Route::get('/claims/create', function () { 
        return view('claims.backoffice.staff.create');
    }); 
    Route::get('/claims/show', function () { 
        return view('claims.backoffice.staff.show');
    }); 

    Route::get('/tags', function () { 
        return view('tags.backoffice.staff.index');
    }); 
    Route::get('/tags/create', function () { 
        return view('tags.backoffice.staff.create');
    }); 
    Route::get('/tags/show', function () { 
        return view('tags.backoffice.staff.show');
    }); 

    Route::get('/details', function () { 
        return view('details.backoffice.staff.index');
    }); 
    Route::get('/details/create', function () { 
        return view('details.backoffice.staff.create');
    }); 
    Route::get('/details/show', function () { 
        return view('details.backoffice.staff.show');
    }); 

    Route::get('/currencies', function () { 
        return view('currencies.backoffice.staff.index');
    }); 
    Route::get('/currencies/create', function () { 
        return view('currencies.backoffice.staff.create');
    }); 
    Route::get('/currencies/show', function () { 
        return view('currencies.backoffice.staff.show');
    }); 

    Route::get('/reasons', function () { 
        return view('reasons.backoffice.staff.index');
    }); 
    Route::get('/reasons/create', function () { 
        return view('reasons.backoffice.staff.create');
    }); 
    Route::get('/reasons/show', function () { 
        return view('reasons.backoffice.staff.show');
    }); 

    Route::get('/countries', function () { 
        return view('countries.backoffice.staff.index');
    }); 
    Route::get('/countries/create', function () { 
        return view('countries.backoffice.staff.create');
    }); 
    Route::get('/countries/show', function () { 
        return view('countries.backoffice.staff.show');
    }); 


}); 





