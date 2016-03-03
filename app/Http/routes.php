<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function () {
Route::get('/', function () {
    return view('welcome');
});
//Route::group(['middleware' => ['web']], function () {
//Route::get('site/extern/{name?}', function () {    return view('external');})->name('extern');
Route::get('site/extern/{name?}', 'PagesController@show_external')->name('extern');
//});

Route::get('/loggedin', 'HomeController@loggedin')->name('loggedin');
Route::get('/services', 'PagesController@services')->name('services');
Route::get('/terms', 'PagesController@terms')->name('terms');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::get('/home', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::get('blog', ['as' => 'blog', 'uses' => 'PagesController@contact']);
Route::get('/contact', ['as' => 'contact', 'uses' => 'PagesController@contact']);
Route::post('/contact', ['as' => 'contact', 'uses' => 'ContactController@store']);
//Route::get('posts/entry/{name?}', 'posts\PostsController@showposts')->name('showcat_posts');
Route::get('posts/subentry/{name?}', 'PagesController@show_subentry')->name('showsubcat_posts');
Route::get('posts/entry/{name?}', 'PagesController@show_entry')->name('showcat_posts');
Route::get('image/delete/{id?}','ImageController@destroy2');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------

|
*/

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin'), function () {
Route::get('/', ['as' => 'adminhome', 'uses' => 'AdminPagesController@home']);
Route::get('schools/create', 'SchoolsController@create')->name('add_school');
Route::post('schools/create', 'SchoolsController@store')->name('create_school');
Route::get('schools/{id?}/edit', 'SchoolsController@edit')->name('edit_school');
Route::post('schools/{id?}/edit','SchoolsController@update')->name('update-school');
Route::get('schools/{id?}/editprofile', 'SchoolsController@editSchoolProfile')->name('edit_school_profile');
Route::post('schools/{id?}/editprofile','SchoolsController@updateSchoolProfile')->name('update_school_profile');
        
Route::get('faculties/create', 'FacultiesController@create')->name('add_faculty');
Route::post('faculties/create', 'FacultiesController@store')->name('create_faculty');
Route::get('faculties/{id?}/edit', 'FacultiesController@edit')->name('edit_faculty');
Route::post('faculties/{id?}/edit', 'FacultiesController@update')->name('update_faculty');

Route::get('courses/create0', 'CoursesController@pre_create')->name('add_course_prepage');
Route::post('courses/create0', 'CoursesController@pre_create2')->name('add_course_prepage2');
Route::get('courses/{id?}/create', 'CoursesController@create')->name('add_course');
Route::post('courses/{id?}/create', 'CoursesController@store')->name('create_course');
Route::get('courses/{id?}/edit', 'CoursesController@edit')->name('edit_course');
Route::post('courses/{id?}/edit', 'CoursesController@update')->name('update_course');



//Route::get('categories', 'CategoriesController@index')->name('category_home');
});

Route::get('/schools', 'Admin\SchoolsController@index')->name('schoolshome');
Route::get('/school/{id?}', 'Admin\SchoolsController@show')->name('showschool');

Route::get('posts/create', 'posts\PostsController@create')->name('add_post');
Route::post('posts/create', 'posts\PostsController@store')->name('create_post');
Route::get('posts/{id?}', 'posts\PostsController@show')->name('showpost');
Route::get('posts/{id?}/preview', 'posts\PostsController@showpreview')->name('showpreview');
Route::get('posts/{id?}/edit', 'posts\PostsController@edit');
Route::post('posts/{id?}/edit','posts\PostsController@update');
Route::get('allposts', 'posts\PostsController@index')->name('showposts');

Route::get('/applicants', [ 'as' => 'applicants', 'uses' => 'ApplicantController@index']);
Route::get('application/create', 'ApplicantController@create')->name('apply');
Route::post('application/create', 'ApplicantController@store');
/////////////////////////////////////////////////////////////////////

Route::get('user/{user}', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'UserController@index',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);

Route::get('/users', [ 'as' => 'user.index', 'uses' => 'users\UsersController@index']);
//Route::post('/userprofile/{name?}','ContactController@sendEmailtoUser');
//Route::get('/usersprofile', 'Admin\SchoolsController@index')->name('userprofile');
Route::get('/userprofile/{name?}', 'users\UsersController@show')->name('userprofile');
Route::post('/userprofile/{name?}','ContactController@sendEmailtoUser');
Route::get('users/{id?}/edit', 'users\UsersController@edit')->name('useredit');
Route::post('users/{id?}/edit','users\UsersController@update')->name('userupdate');


Route::get('posts/userposts/{posttype?}', 'posts\PostsController@showMyPosts')->name('mypost');
Route::get('posts/user/mydrafts', 'posts\PostsController@showMyDrafts')->name('mydraft');
//Route::get('posts/user/mycomments', 'PostsController@showComments')->name('mycomments');

/////////////////////////////////////////////////////////////

Route::get('postsdrafts', 'posts\PostsController@showdrafts')->name('showdrafts');
Route::post('posts/{id?}', 'CommentsController@newComment')->name('comment');

Route::get('/faculties', 'Admin\FacultiesController@index')->name('facultieshome');
Route::get('/faculties/{id?}', 'Admin\FacultiesController@show')->name('showfaculty');

Route::get('/courses', 'Admin\CoursesController@index')->name('courseshome');
Route::get('/courses/{id?}', 'Admin\CoursesController@show')->name('showcourse');


    //
//});

/*
|--------------------------------------------------------------------------
| Register/Login Routes
|--------------------------------------------------------------------------

|
*/

//Route::get('/register', 'Auth\AuthController@getRegister')->name('register');
//Route::post('/register', 'Auth\AuthController@postRegister');
////Route::get('register/verify/{activationCode}', [
////    'as' => 'confirmation_path',
////    'uses' => 'Auth\AuthController@confirm'
////]);
//
//Route::get('/login', 'Auth\AuthController@getLogin')->name('login');
//Route::post('/login', 'Auth\AuthController@postLogin');
////Route::post('users/login', 'Auth\SessionsController@postLogin');
//Route::get('/logout', 'Auth\AuthController@getLogout')->name('logout');

/*
|--------------------------------------------------------------------------
| Post Routes
|--------------------------------------------------------------------------

|
*/

/*
|--------------------------------------------------------------------------
| Blog Routes
|--------------------------------------------------------------------------

|
*/

/*
|--------------------------------------------------------------------------
| General menu Routes
|--------------------------------------------------------------------------

|
*/
//Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', ['as' => 'home', 'uses' => 'PagesController@home']);
    

    //Route::get('/home', 'HomeController@index');
});
