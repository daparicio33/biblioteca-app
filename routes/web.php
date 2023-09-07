<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes(['register'=>false]);
Route::get('/',[HomeController::class,'index'])->name('index');

Route::get('/book/{id}',[HomeController::class,'show_book'])->name('show_book')->middleware('auth');
Route::get('/programas',[HomeController::class,'programas'])->name('programas');
Route::get('/programas/show-book-programas/{id}',[HomeController::class,'show_book_programas'])
->name('show_book_programas');
Route::post('/book/search',[HomeController::class,'search_book'])->name('search_book');
Route::get('/panel',[HomeController::class,'index_panel'])->name('panel.index')->middleware('auth');
/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
Route::resource('dash', UserController::class);
Route::get('/dashboard/books/getbook/{id}',[BookController::class,'getbook'])->name('dashboard.books.getbook');

Route::get('/dashboard/authors/api',[AuthorController::class,'get'])->name('dashboard.authors.api.get');
Route::post('/dashboard/authors/api',[AuthorController::class,'save'])->name('dashboard.author.api.save');

Route::get('/dashboard/publishers/api',[PublisherController::class,'get'])->name('dashboard.publishers.api.get');
Route::post('/dashboard/publishers/api',[PublisherController::class,'save'])->name('dashboard.publishers.api.save');

Route::get('/dashboard/categories/api',[CategorieController::class,'get'])->name('dashboard.categories.api.get');
Route::post('/dashboard/categories/api',[CategorieController::class,'save'])->name('dashboard.categories.api.save');

Route::get('/dashboard/tags/api',[TagController::class,'get'])->name('dashboard.tags.api.get');
Route::post('/dashboard/tags/api',[TagController::class,'save'])->name('dashboard.tags.api.save');


Route::resource('/dashboard/books',BookController::class)->names('dashboard.books');
Route::resource('/dashboard', DashboardController::class)->names('dashboard');
Route::resource('/dashboard/authors',AuthorController::class)->names('dashboard.authors');
Route::resource('/dashboard/categories',CategorieController::class)->names('dashboard.categories');
Route::resource('/dashboard/tags',TagController::class)->names('dashboard.tags');
Route::resource('/dashboard/publishers',PublisherController::class)->names('dashboard.publishers');
/* Route::get('/api',function(){
    $url = 'https://www.etnassoft.com/api/v1/get/?id=10195'; // Reemplaza con la URL correcta

    // Inicializar la solicitud cURL
    $ch = curl_init($url);

    // Establecer opciones para la solicitud cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Realizar la solicitud GET y obtener la respuesta
    $response = curl_exec($ch);

    // Verificar si hubo algún error en la solicitud
    if(curl_errno($ch)) {
        $error = curl_error($ch);
        // Manejar el error según sea necesario
    } else {
        // Procesar la respuesta JSON
        $data = json_decode($response, true);


        // Hacer lo que necesites con los datos del JSON
        // Por ejemplo, imprimir el contenido del JSON
        dd($data);
    }

    // Cerrar la conexión cURL
    curl_close($ch);
}); */