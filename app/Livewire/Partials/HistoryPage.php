<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Models\History;
use App\Models\news;

class HistoryPage extends Component
{
    public $history;
    public $news;
    public function mount()
    {
        $this->history = History::all();
        $this->news = news::orderBy('created_at', 'desc')
        ->limit(5)
        ->get();

    }

   

    public function render()
    {
        return view('livewire.partials.history-page');
    }
}