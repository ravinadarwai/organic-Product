<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/home', function () {
//     return view('home');
// });
Route::get('/home',[UserController::class,'show'])->name('home');

Route::middleware(['auth'])->group(function () {


   

    Route::get('/about',[UserController::class,'about'])->name('about');

    Route::get('/showAll', [UserController::class, 'showAll'])->name('showAll');  

    Route::get('/contact', [UserController::class, 'contact'])->name('contact');
    Route::post('/contact', [UserController::class, 'send']);

    
    Route::get('/finalorder', [Controller::class, 'finalorder'])->name('finalorder');

    Route::get('/myorder', [UserController::class, 'myorder'])->name('myorder');
    Route::post('/update-order-status', [Controller::class, 'updateStatus'])->name('update.order.status');





    
    Route::get('/blog', [UserController::class, 'blog'])->name('blog');


    Route::post('/add-to-cart', [Controller::class, 'addToCart'])->name('cart.add');
    Route::get('/showcart', [Controller::class, 'showcart'])->name('showcart');

    Route::put('/cart/{id}', [Controller::class, 'update'])->name('cart.update');
    Route::get('/cart/{id}', [Controller::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/delete-all', [Controller::class, 'deleteAll'])->name('cart.deleteAll');

    Route::post('/updateaddress', [Controller::class, 'updateaddress'])->name('updateaddress');
Route::get('/placeorder', [Controller::class, 'placeorder'])->name('placeorder');
Route::post('/place-order',[ Controller::class, 'placeorderr'])->name('place.order');
Route::post('/order', [Controller::class, 'order'])->name('order');


Route::post('/wishlist', [Controller::class, 'wishlist'])->name('wishlist');
Route::get('/wishlistget', [Controller::class, 'wishlistget'])->name('wishlistget');
Route::delete('wishlist/destroy/{id}', [Controller::class, 'destroyW'])->name('wishlist.destroy');


Route::get('/buynow/{type}/{id}', [Controller::class, 'buynow'])->name('buynow');

    });
    //________________________________Auth controller______________________;
    
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');




    //________________________________User controller______________________;




//________________________________Admin controller______________________;


   Route::get('/blogadd', [AdminController::class, 'create'])->name('blogadd');
   Route::post('/blogadd', [AdminController::class, 'store'])->name('blog.store');
   Route::get('bloglist', [AdminController::class, 'bloglist'])->name('bloglist');


    Route::get('/vege', [AdminController::class, 'addVegetableForm'])->name('vege');
    Route::post('/vege', [AdminController::class, 'storeVegetable']);
    Route::get('vegelist', [AdminController::class, 'vegelist'])->name('vegelist');
    Route::delete('/admin/vegetables/{id}', [AdminController::class, 'destroy'])->name('vegetables.destroy');
    Route::get('/admin/vegetables/{id}/edit', [AdminController::class, 'edit'])->name('vegetables.edit');
    Route::put('/admin/vegetables/{id}', [AdminController::class, 'update'])->name('vegetables.update');
      


   Route::get('/fruit', [AdminController::class, 'fruit'])->name('fruit');
   Route::post('/fruitstore', [AdminController::class, 'fruitstore'])->name('fruitstore');
   Route::get('fruitlist', [AdminController::class, 'fruitlist'])->name('fruitlist');
   Route::delete('/admin/fruit/{id}', [AdminController::class, 'destroyfr'])->name('fruit.destroy');
   Route::get('/admin/fruit/{id}/edit', [AdminController::class, 'editfr'])->name('fruit.edit');
   Route::put('/admin/fruit/{id}', [AdminController::class, 'updatefr'])->name('fruit.update');
      


   Route::post('/fishtore', [AdminController::class, 'fishtore'])->name('fishtore');
   Route::get('/fish', [AdminController::class, 'fish'])->name('fish');
   Route::get('fishlist', [AdminController::class, 'fishlist'])->name('fishlist');
   Route::delete('/admin/fish/{id}', [AdminController::class, 'destroyF'])->name('fish.destroy');
   Route::get('/admin/fish/{id}/edit', [AdminController::class, 'editF'])->name('fish.edit');
   Route::put('/admin/fish/{id}', [AdminController::class, 'updateF'])->name('fish.update');



Route::post('/trendystore', [AdminController::class, 'trendystore'])->name('trendystore');
Route::get('/trendy', [AdminController::class, 'trendy'])->name('trendy');
Route::get('trendylist', [AdminController::class, 'trendylist'])->name('trendylist');
Route::delete('/admin/trendy/{id}', [AdminController::class, 'destroyT'])->name('trendy.destroy');
Route::get('/admin/trendy/{id}/edit', [AdminController::class, 'editT'])->name('trendy.edit');
Route::put('/admin/trendy/{id}', [AdminController::class, 'updateT'])->name('trendy.update');


Route::post('/dairystore', [AdminController::class, 'dairystore'])->name('dairystore');
Route::get('/dairy', [AdminController::class, 'dairy'])->name('dairy');
Route::get('dairylist', [AdminController::class, 'dairylist'])->name('dairylist');
Route::delete('/admin/dairy/{id}', [AdminController::class, 'destroyD'])->name('dairy.destroy');
Route::get('/admin/dairy/{id}/edit', [AdminController::class, 'editD'])->name('dairy.edit');
Route::put('/admin/dairy/{id}', [AdminController::class, 'updateD'])->name('dairy.update');


Route::get('/add-meta-data', [AdminController::class, 'createForm'])->name('add-meta-data');
Route::post('/add-meta-data', [AdminController::class, 'storee'])->name('meta-data.storee');
Route::get('metalist', [AdminController::class, 'metalist'])->name('metalist');

Route::get('/meta/{id}/edit',[AdminController::class, 'editmeta'])->name('meta.edit');
Route::put('/meta/{id}', [AdminController::class, 'updatemeta'])->name('meta.update');
Route::delete('/meta/{id}', [AdminController::class, 'destroymeta'])->name('meta.destroy');
