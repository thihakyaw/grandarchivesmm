<?php

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

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

Route::get('/random-meme', function (Request $request) {
    $assets = Cache::get(File::FILES_CACHE_NAME);

    return response()->json([
        'data' => [
            'image' => $assets[rand(0, Cache::get(File::FILES_CACHE_COUNT) - 1)]
        ],
        'message' => 'Random meme generated.'
    ], Response::HTTP_OK);
});
