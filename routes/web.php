<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
route::get('/', [HomeController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');

route::get('/view_kategorija', [AdminController::class, 'view_kategorija']);

route::post('/dodaj_kategoriju', [AdminController::class, 'dodaj_kategoriju']);

route::get('/obrisi_kategoriju/{id}', [AdminController::class, 'obrisi_kategoriju']);

route::get('/view_artikl', [AdminController::class, 'view_artikl']);

route::post('/dodaj_artikl', [AdminController::class, 'dodaj_artikl']);

route::get('/show_artikl', [AdminController::class, 'show_artikl']);

route::get('/obrisi_artikl/{id}', [AdminController::class, 'obrisi_artikl']);

route::get('/uredi_artikl/{id}', [AdminController::class, 'uredi_artikl']);

route::post('/izmjeni_artikl/{id}', [AdminController::class, 'izmjeni_artikl']);

route::get('/detalji_artikla/{id}', [HomeController::class, 'detalji_artikla']);

route::post('/dodaj_kosara/{id}', [HomeController::class, 'dodaj_kosara']);

route::get('/pokazi_kosaru', [HomeController::class, 'pokazi_kosaru']);

route::get('/obrisi_kosara/{id}', [HomeController::class, 'obrisi_kosara']);

route::get('/naruci', [HomeController::class, 'naruci']);

route::get('/narudzba', [AdminController::class, 'narudzba']);

route::get('/odobreno/{id}', [AdminController::class, 'odobreno']);

route::get('/odbijeno/{id}', [AdminController::class, 'odbijeno']);

route::get('/posalji_mail/{id}', [AdminController::class, 'posalji_mail']);

route::post('/posalji_korisniku_email/{id}', [AdminController::class, 'posalji_korisniku_email']);

route::get('/search_order', [AdminController::class, 'search_order']);

route::post('/komentiraj/{id}', [HomeController::class, 'komentiraj']);

route::get('/svi_produkti', [HomeController::class, 'svi_produkti']);

route::get('/pretraga', [HomeController::class, 'pretraga']);

route::get('/korisnici', [AdminController::class, 'korisnici']);

route::get('/posalji_mail2/{id}', [AdminController::class, 'posalji_mail2']);

route::post('/posalji_korisniku_email2/{id}', [AdminController::class, 'posalji_korisniku_email2']);

route::get('/obrisi_korisnika/{id}', [AdminController::class, 'obrisi_korisnika']);

route::get('/komentari', [AdminController::class, 'komentari']);

route::get('/obrisi_komentar/{id}', [AdminController::class, 'obrisi_komentar']);