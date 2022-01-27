<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HomeSlider;
use Carbon\Carbon;
class AdminAddHomeSliderComponent extends Component
{   
    use WithFileUploads;

    public $title ;
    public $subtitle ;
    public $image ;
    public $status ;
    public $price ;
    public $link ;

    public function mount(){
        $this->status = 0 ;
    }

    public function addSlide(){
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $imagename = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('sliders', $imagename);
        $slider->image = $imagename;
        $slider->link = $this->link;
        $slider->price = $this->price;
        $slider->status = $this->status;

        $slider->save();
        session()->flash('message', 'Slider has been created successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}
