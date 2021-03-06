<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart ;
//use WithPagination;
use App\Models\Category ;
class ShopComponent extends Component
{   /// Here are two properties which is sorting and pagesizing 
   // use WithPagination ;    
   public $sorting ;
   public $pagesize ;

   public function mount()
   {
       $this->sorting = "default";
       $this->pagesize = 12;
   }

    public function store($probuct_id , $product_name , $product_price)
    {
        Cart::add($probuct_id , $product_name , 1 , $product_price )->associate('App\Models\Product');
        session()->flash('success_message' , 'Item added in Cart') ;
        return redirect()->route('product.cart') ;
    }  
  //  use WithPagination ;
    public function render()
    {   

       ///price sorting and asc or desc order condition here 
       if($this->sorting == "date")
       {
           $products = Product::orderBy('created_at', 'DESC')->paginate($this->pagesize);
       }
       else if($this->sorting == "price")
       {
           $products = Product::orderBy('regular_price', 'ASC')->paginate($this->pagesize);
       }
       else if($this->sorting == "price-desc")
       {
           $products = Product::orderBy('regular_price', 'DESC')->paginate($this->pagesize);
       }
       else{
           $products = Product::paginate($this->pagesize);
       }

        //$products = Product::paginate(12);
        /// Just for test
        $popular_products = Product::inRandomOrder()->limit(4)->get();/// Just used her
        //
        // $category = $this->param('category');
        // $this['scopeCategory'] = Gallery::where('category', $category)->paginate(12);
        return view('livewire.shop-component',['products'=>$products,'popular_products'=>$popular_products])->layout('layouts.base');
    }
}

