<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent ;
use App\Http\Livewire\ShopComponent ;
use App\Http\Livewire\CartComponent ;
use App\Http\Livewire\CheckoutComponent ;
use App\Http\Livewire\AboutComponent ;
use App\Http\Livewire\ContactComponent ;




Route :: get('/', HomeComponent::class );
Route :: get('/shop', ShopComponent::class );
Route :: get('/cart', CartComponent::class );
Route :: get('/checkout', CheckoutComponent::class );
Route :: get('/about', AboutComponent::class );
Route :: get('/contact', ContactComponent::class );

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
