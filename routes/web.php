<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\User;

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

//protected $redirectTo = '/';

Route::get('/', function () {
    if( request()->has('publication_date')){
        $posts = App\Post::where('created_at', request('publication_date'))->paginate(5);
    }
    else{
        //$posts = App\Post::get();
        $posts = App\Post::paginate(5);
    }
    return view('welcome')->with('posts',$posts);
});

//protected
Route::get('home', function () {
    if( request()->has('publication_date')){
        $posts = App\Post::where('created_at', request('publication_date'))->paginate(5);
    }
    else{
        //$posts = App\Post::get();
        $posts = App\Post::paginate(5);
    }
    return view('home')->with('posts',$posts);
})->middleware('verified');

Route::get('posts', function () {
    //$posts = App\Post::get();
    $posts = App\Post::paginate(5);
    return view('home')->with('posts',$posts);
})->middleware('verified');


Route::group(['middleware' => ['permission:destroy_posts']], function () {
    Route::delete('posts/{id}/destroy', 'API\PostsController@destroy')->name('posts.destroy');
});


Route::get('posts/{id}','API\PostsController@show');
Route::delete('posts/{id}','API\PostsController@destroy');



Route::get('createPost', function () {
    return view('posts.create');
})->middleware('verified')->name('create.post');

Route::post('store', 'API\PostsController@store')->name('posts.store');

Route::get('/importData', function() {
   
    $json = json_decode(file_get_contents('https://sq1-api-test.herokuapp.com/posts'), true);

    foreach ($json as $obj)  
    {
        foreach ($obj as $key => $value) 
        {
            $insertArr[Str::slug($key,'_')] = $value;
            $insertArr[Str::slug($key,'_')]['system_created'] = 'admin';
        }
		DB::table('posts')->insert($insertArr);
    }
    
	dd("Finished adding data in posts table");
   
});

Auth::routes();

Auth::routes(['verify' => true]);
