<?php

use Illuminate\Support\Facades\Route;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Staff;
use App\Models\User;

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
    return view('welcome');
});

Route::get('/create_user', function() {
    $user = new User;
    $user->name = 'Sunny';
    $user->email = 'Sunny@gmail.com';
    $user->password = '123455';
    $user->save();
    return "User Created";
});
Route::get('/create_staff', function() {
    $user = new Staff;
    $user->name = 'Sunny';
    $user->save();
    return "Staff Created";
});
Route::get('/create_product', function() {
    $user = new Product;
    $user->name = 'Laravel Course';
    $user->save();
    return "Product Created";
});

Route::get('/create_staff_image', function () {
    $staff = Staff::findOrFail(1);
    $staff->photos()->create(['path' => 'Sabir.jpg']);
    return "Staff with image created";
});

Route::get('/create_product_image', function () {
    $staff = Product::findOrFail(1);
    $staff->photos()->create(['path' => 'Laravel.jpg']);
    return "Product with image created";
});

Route::get('/read_staff_image', function () {
    $staff = Staff::findOrFail(1);
    foreach($staff->photos as $photo){
        return $photo;
    }
});
Route::get('/read_product_image', function () {
    $product = Product::findOrFail(1);
    foreach($product->photos as $photo){
        return $photo;
    }
});

Route::get('/update_staff_image', function () {
    $staff = Staff::findOrFail(1);
    // $staff->photos()->update(['path' => 'New.jpg']);
    foreach($staff->photos as $photo){
        $photo->path = "NewOne.jpg";
        $photo->update();
        return "Image Updated";
    }
});

Route::get('/update_product_image', function () {
    $product = Product::findOrFail(1);
    // $product->photos()->update(['path' => 'New.jpg']);
    foreach($product->photos as $photo){
        $photo->path = "NewOne.jpg";
        $photo->update();
        return "Image Updated";
    }
});

Route::get('/delete_staff_image', function () {
    $staff = Staff::findOrFail(1);
    $staff->photos()->delete();
    return "Image Deleted";
});
Route::get('/delete_product_image', function () {
    $product = Product::findOrFail(1);
    $product->photos()->delete();
    return "Image Deleted";
});