<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Models\History;

class HistoryPage extends Component
{
    public $history;
    public function mount()
    {
        $this->history = History::all();
    }

    public function render()
    {
        return view('livewire.partials.history-page');
    }
}
