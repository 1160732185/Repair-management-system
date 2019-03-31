<?php



/*Auth::routes();*/
/*Route::get('/', 'HomeController@index')->name('home');*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'Auth\LoginController@show')->name('loginPage');
Route::get('/register', 'Auth\RegisterController@show')->name('registerPage');
Route::get('/main', 'UserController@index')->name('main');
Route::get('/i_want_repair', 'MainController@repair')->name('i_want_repair');
Route::get('/i_want_inquire', 'MainController@inquire')->name('i_want_inquire');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/home', 'Auth\LogoutController@logout')->name('logout');
Route::post('/confirm', 'MainController@confirm')->name('confirm');
Route::get('/i_want_inquire/ing', 'MainController@ing')->name('ing');
Route::get('/i_want_inquire/evaluate', 'MainController@evaluate')->name('evaluate');
Route::post('/i_want_inquire/evaluate', 'MainController@evaluate_post');
Route::get('/i_want_inquire/done', 'MainController@done')->name('done');
Route::get('/information/{id}', 'MainController@information')->name('information')->where('id', '[0-9]+');
Route::post('/equipment_location', 'MainController@equlocation');
Route::post('/equipment_user', 'MainController@equuser');
Route::get('/e_my_state', 'EngineerController@state');
Route::get('/e_change_state', 'EngineerController@change');
Route::get('/e_state_rest', 'EngineerController@rest');
Route::get('/e_state_work', 'EngineerController@work');
Route::get('/e_my_work', 'EngineerController@check');
Route::get('/e_check/ing', 'EngineerController@ing');
Route::get('/e_check/done', 'EngineerController@done');
Route::post('/e_confirm', 'DitributorController@confirm');
Route::get('/evaluate', 'UserController@evaluate');
Route::get('/trial', 'UserController@trial');
Route::post('/e_complete', 'EngineerController@complete');