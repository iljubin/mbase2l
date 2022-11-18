<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

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
// Route::get('/sites/all/modules/mbase2/frontend-dist/{subpath}', function ($subpath) {
// 	$newPath = 'http://host.docker.internal:8082/sites/all/modules/mbase2/frontend-dist/' . $subpath;

// 	return Cache::get('proxy_' . str_replace('/', '', $subpath), function () use ($newPath) {
// 		$response = Http::get($newPath);
// 		return response($response->body())
// 			->header(
// 				'Content-Type',
// 				$response->header('Content-Type')
// 			);
// 	}, 60);
// })->where('subpath', '.*');

// Route::get('/api/mbase2/{subpath}', function ($subpath) {
// 	$newPath = 'http://host.docker.internal:8082/api/mbase2/' . $subpath;

// 	$response = Http::get($newPath);
// 	return response($response->body())
// 		->header(
// 			'Content-Type',
// 			$response->header('Content-Type')
// 		);
// })->where('subpath', '.*');

Route::middleware(['web'])->group(
	function () {

		Route::get('/', [Controller::class, 'index'])->name('home');

		Route::get('/test', function () {
			$user = \App\Models\User::where('id', 1)->first();
			return $user->group;
		});

		Route::get('admin/custom/bears-biometry-animal-handlings/create',
			[\App\Http\Controllers\BearsBiometryAnimalHandlingController::class, 'index'])
			->name('platform.bearsBiometryAnimalHandlings.create');

		Route::get('locale/{locale}', function ($locale) {

			session(['locale' => $locale]);
			App::setLocale($locale);

			return redirect()->route('home');
		})->name('locale.change');
	}
);

require __DIR__ . '/auth.php';
