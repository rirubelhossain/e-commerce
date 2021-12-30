<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent ;
use App\Http\Livewire\ShopComponent ;
use App\Http\Livewire\CartComponent ;
use App\Http\Livewire\CheckoutComponent ;
use App\Http\Livewire\AboutComponent ;
use App\Http\Livewire\ContactComponent ;
use App\Http\Livewire\DetailsComponent ;
use App\Http\Livewire\User\UserDashboardComponent ;
use App\Http\Livewire\Admin\AdminDashboardComponent ;
use App\Http\Livewire\SearchComponent ;
use App\Http\Livewire\CategoryComponent ;



Route :: get('/', HomeComponent::class );
Route :: get('/shop', ShopComponent::class );
Route :: get('/cart', CartComponent::class )->name('product.cart');
Route :: get('/checkout', CheckoutComponent::class);
Route :: get('/about', AboutComponent::class );
Route :: get('/contact', ContactComponent::class );
Route :: get('/product/{slug}', DetailsComponent::class )->name('product.details');
Route :: get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');
Route :: get('search', SearchComponent ::class)->name('product.search');



// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// User or Customer Middleware
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route :: get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
}); 


// For Admin
Route::middleware(['auth:sanctum', 'verified' , 'authadmin'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
}); 












