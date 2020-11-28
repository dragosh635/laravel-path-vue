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

Route::post( '/categories/upsert', [ \App\Http\Controllers\CategoryController::class, 'upsert' ] );
Route::delete( '/categories/{category}', [ \App\Http\Controllers\CategoryController::class, 'destroy' ] );
Route::get( '/categories/{category}/items', [ \App\Http\Controllers\CategoryController::class, 'items' ] );

Route::post( '/menu-items/add', [ \App\Http\Controllers\MenuItemController::class, 'store' ] );
Route::get( '/menu-items/{menuItem}', function ( \App\Models\MenuItem $menuItem ) {
    return $menuItem;
} );

Route::post( '/menu-items/{menuItem}', [ \App\Http\Controllers\MenuItemController::class, 'update' ] );

Route::post( '/add-image', function ( Request $request ) {
    $file = $request->file( 'file' );
    $dir  = 'public/images';
    $path = $file->store( $dir );

    return str_replace( "$dir/", '', $path );
} );


