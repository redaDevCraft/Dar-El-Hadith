<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\news;

class Home extends Component
{
    public $news;
    public $currentSlide = 0;

    public function mount()
    {
        $this->news = news::all();
    }

    public function changeSlide($index)
    {
        if ($index < 0) {
            $index = count($this->news) - 1;
        } elseif ($index >= count($this->news)) {
            $index = 0;
        }

        $this->currentSlide = $index;
    }

    public function render()
    {
        return view('livewire.home');
    }
}
