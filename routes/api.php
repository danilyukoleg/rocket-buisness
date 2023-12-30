<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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


Route::post("/nn1", function (Request $request) {
	$nn1 = DB::table("tickets")
			->select("nn1")
			->where("nn1", "LIKE", "%" . $request->input("nn1") . "%")
			->limit(5)
			->get();
	return response()->json(collect($nn1)->unique());
});

Route::post("/nn2", function (Request $request) {
	$nn2 = DB::table("tickets")
		->select("nn2")
		->where("nn2", "LIKE", "%" . $request->input("nn2") . "%")
		->limit(5)
		->get();
	return response()->json(collect($nn2)->unique());
});

Route::post("/cities", function () {
	$cities = DB::table("tickets")
		->select("nn1", "nn2")
		->get();
	return $cities;
});
