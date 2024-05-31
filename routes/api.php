<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/upload-image", function (Request $request) {
    if ($request->hasFile("image")) {
        $imagePath = $request->file('image')->store('images', 'public');
        return response()->json(["path" => $imagePath, "status" => 200]);
    } else {
        return response()->json(['message' => "image field is required", "status" => 500]);
    }
});
