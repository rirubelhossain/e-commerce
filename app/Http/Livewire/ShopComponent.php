<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{   
    use WithPagination ;
    public function render()
    {   
        $products = Product::paginate(12);
        /// Just for test
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        return view('livewire.shop-component',['products'=>$products])->layout('layouts.base');
    }
}
