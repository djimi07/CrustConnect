<?php
use App\Http\Controllers\AuthController ;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PizzasController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CookController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('connexion');
});


Route::get('/home',   function(){ return view('welcome'); })->middleware('is_user')->name('home');



Route::get('/login', [AuthController::class,'showForm'])->name('login');
Route::post('/login', [AuthController::class,'login']);
Route::get('/register', [RegisterController::class,'showForm'])->name('register');
Route::post('/register', [RegisterController::class,'store']);

Route::get('/logout', [AuthController::class,'logout'])->name('logout')->middleware('auth');

Route::get('/admin', function(){ return view('admin.home'); })->middleware('auth')->middleware('is_admin')->name('admin');
Route::get('/admin/pizzas_gestion', function(){ return view('admin.pizzas_gestion'); })->middleware('auth')->middleware('is_admin')->name('pizzas_gestion');
Route::get('/admin/add_pizzas', function(){ return view('admin.add_pizzas'); })->middleware('auth')->middleware('is_admin')->name('add_pizzas');
Route::post('/admin/add_pizzas', [PizzasController::class, 'add_pizzas'])->middleware('auth')->middleware('is_admin');
Route::get('/admin/list_pizzas', [PizzasController::class, 'list_pizzas'])->middleware('auth')->middleware('is_admin')->name('list_pizzas');
Route::get('/admin/change_pizza/{id}', [PizzasController::class, 'change_pizzas'])->middleware('auth')->middleware('is_admin')->name('change')->where('id', '^[0-9]{1,}$');
Route::post('/admin/change_pizza/{id}', [PizzasController::class, 'change_pizzas_post'])->middleware('auth')->middleware('is_admin')->where('id', '^[0-9]{1,}$');
Route::get('/admin/delete_pizza/{id}', [PizzasController::class, 'delete_pizza'])->middleware('auth')->middleware('is_admin')->where('id', '^[0-9]{1,}$');

Route::get('/change_password', function(){ return view('change_password'); })->middleware('auth')->name('change_password');
Route::post('/change_password', [AuthController::class, 'change_password'])->middleware('auth');
Route::get('/pizzas_list', [PizzasController::class, 'pizzas_pagination'])->middleware('auth')->name('pizzas_list');
Route::get('/add_to_cart/{id}', [CartController::class, 'add_to_cart'])->middleware('auth');
Route::get('/cart', [CartController::class, 'cart'])->middleware('auth')->name('cart');
Route::post('/change_quantity/{id}', [CartController::class, 'change_quantity'])->middleware('auth');
Route::get('/delete_from_cart/{id}', [CartController::class, 'delete_from_cart'])->middleware('auth');
Route::get('/confirm_cart', [CommandeController::class, 'confirm_cart'])->middleware('auth');
Route::get('/mes_commandes', [CommandeController::class, 'mes_commandes'])->middleware('auth')->name('mes_commandes');

Route::get('/cook',  function(){ return view('cook.home'); })->middleware('auth')->middleware('is_cook')->name('cook');
Route::get('/cook/liste_commandes',  [CookController::class, 'liste_commandes'])->middleware('auth')->middleware('is_cook')->name('liste_commandes');
Route::get('/cook/liste_commandes/{id}',  [CookController::class, 'details_commande'])->middleware('auth')->middleware('is_cook');
Route::get('/cook/liste_commandes/{id}/{etat}',  [CookController::class, 'maj_etat'])->middleware('auth')->middleware('is_cook');