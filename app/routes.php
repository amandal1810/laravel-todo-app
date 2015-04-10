<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
Route::get('/', function()
{
	//return View::make('hello');
	return View::make('home');
});


Route::get('/', function()
{
	Schema::create('tasks', function($table)
	{
		$table->increments('id');
		$table->string('title');
		$table->text('body');
		$table->integer('user_id');
		$table->boolean('done');
		$table->timestamps();
	});
});

Route::get('/', function()
{
$task = new Task;
$task->title = 'Eating breakfast';
$task->body = 'Remember to buy bread, egg and milk.';
$task->save();
});
*/

Route::model('task','Task');

Route::get('/about', function()
{
	return View::make('about');
});
Route::get('/contact', function()
{
	//return View::make('hello');
	return View::make('contact');
});

Route::post('contact', function()
{
	$data = Input::all();
	$rules = array(
		'subject' => 'required',
		'message' => 'required'
	);
	$validator = Validator::make($data, $rules);
	if($validator->fails()) {
		return Redirect::to('contact')->withErrors($validator)->withInput();
	}
	return 'Your message has been sent';
});
/*
Route::get('/db/op1',function()
{
	$task = Task::find(1);
	return $task->title;
});
*/
Route::get('/','TasksController@home');
Route::get('/create','TasksController@create');
Route::post('/create', 'TasksController@saveCreate');
Route::get('/edit/{task}','TasksController@edit');
Route::post('/edit', 'TasksController@doEdit');
Route::get('/delete/{task}','TasksController@delete');
Route::post('/delete','TasksController@doDelete');

Route::get('/task/{id}','TasksController@show');