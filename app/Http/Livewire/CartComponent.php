<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart ;
class CartComponent extends Component
{   
    ///Update card quantiy 

    public function increaseQuantity($rowId){
        
        $product = Cart::get($rowId);
        $qty = $product->qty + 1 ;
        
        Cart::update($rowId , $qty) ;
    }
    public function decreaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1 ;
        Cart::update($rowId , $qty) ;
    }
    ///Delete product from cart

    public function destroy($rowId){
        Cart::remove($rowId);
        session()->flash('success_message','Item has been removed');
    }

    /// All seleted product will be destoryed
    public function destroyall(){
        Cart::destroy();
        session()->flash('success_message','All Selected Product has been Removed');
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
