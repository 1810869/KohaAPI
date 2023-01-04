<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => ['json.response']], function () { 
    
    //POST: Insert new data into post table
    // Route::post('create', 'App\Http\Controllers\PostController@store'); 
    //POST: Insert new data into lts_api_post_test table
    Route::post('create', 'App\Http\Controllers\PostController@NewRecord'); 
    //GET: Display borrower list from borrower table
    Route::get('patrons', 'App\Http\Controllers\PostController@BorrowerList'); 
    //GET: Display borrower attribute from borrower_attributes table
    Route::get('patrons/attribute', 'App\Http\Controllers\PostController@BorrowerAttrib');  
    //GET: Display borrower issues from the table issues
    Route::get('patrons/checkouts', 'App\Http\Controllers\PostController@Issue');
    //GET: Display result based on column name and borrowernumber 
    Route::get('patrons/{columnname}/{borrowernumber}', 'App\Http\Controllers\PostController@SearchBorrowers');
    //GET: Display borrower accountlines
    Route::get('account/{id}', 'App\Http\Controllers\PostController@accountlines');
    //POST: Update record
    Route::post('update/{id}/{columnname}/{value}', 'App\Http\Controllers\PostController@updateBorrower'); 

    
});
