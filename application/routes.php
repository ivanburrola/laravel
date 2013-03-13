<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', function()
{
	return View::make('home.index');
});

/**
Clientes
*/
//Route::controller('clientes');
Route::get('clientes', array('as' => 'clientes', 'uses' => 'clientes@index'));
Route::get('clientes/new', array('as'=> 'new_cliente', 'uses' => 'clientes@new'));
Route::post('clientes/create', array('before' => 'csrf','uses' => 'clientes@create'));
Route::get('cliente/(:num)', array('as' => 'cliente', 'uses' => 'clientes@view'));
Route::get('cliente/(:num)/edit', array('as' =>'edit_cliente', 'uses' => 'clientes@edit'));

Route::get('authors', array('as'=> 'authors', 'uses'=>'authors@index'));
Route::get('author/(:any)', array('as' => 'author', 'uses' => 'authors@view'));
Route::get('authors/new', array('as'=> 'new_author', 'uses' => 'authors@new'));
Route::post('authors/create', array('before' => 'csrf','uses'=>'authors@create'));
Route::get('author/(:any)/edit', array('as' => 'edit_author', 'uses' => 'authors@edit'));
Route::put('author/update', array('before' => 'csrf', 'uses'=> 'authors@update'));
Route::delete('author/delete', array('before' => 'csrf','uses' => 'authors@destroy'));


Route::get('/', function(){
    // this is our list of posts
    // lets get our posts and eager load the
    // author
    $posts = Post::with('author')->all();
    return View::make('pages.home')
            ->with('posts', $posts);
});

Route::get('view/(:num)', function($post){
    // this is our single view
    $post = Post::find($post);

    return View::make('pages.full')
        ->with('post', $post);
});

Route::get('admin', array('before' => 'auth', 'do' => function(){
    // show the creat new post form
    $user = Auth::user();
    return View::make('pages.new')->with('user', $user);
}));

Route::post('admin', array('before' => 'auth', 'do' => function(){
    // handle the create new post form
    $new_post =  array(
        'title' => Input::get('title'),
        'body' => Input::get('body'),
        'author_id' => Input::get('author_id')
    );
    
    $rules = array('title' => 'required|min:3|max:128',
                    'body' => 'required');
    // make the validator
    $v = Validator::make($new_post, $rules);

    if ($v->fails())
    {
        // redirect back to the form with
        // errors, input and our currently
        //logged in user
        return Redirect::to('admin')
                ->with('user', Auth::user())
                ->with_errors($v)
                ->with_input();
    }

    // create the new post
    $post = new Post($new_post);
    $post->save();

    return Redirect::to('view/' . $post->id);
}));

Route::get('login', function(){
    // show the login form
    return View::make('pages.login');
});

Route::post('login', function(){
    // handle the login form

    $userdata = array(
        'username' => Input::get('username'),
        'password' => Input::get('password')
    );

    if ( Auth::attempt($userdata))
    {
        return Redirect::to('admin');
    }
    else {
        return Redirect::to('login')
                    ->with('login_errors', true);
    }
});

Route::get('logout', function(){
    // logout form the system
    Auth::logout();
    return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});
