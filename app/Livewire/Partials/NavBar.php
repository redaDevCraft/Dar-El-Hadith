<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;


class NavBar extends Component
{
   
    public function mount()
    {
        
      
    }

   

     
     
    public function render()
    {
        return view('livewire.partials.nav-bar');
    }
}