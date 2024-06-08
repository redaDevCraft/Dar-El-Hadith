<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Models\news;

class NewsDetail extends Component
{
    public $news;
    public $additionalNews;

    public function mount($id)
    {
        $this->news = news::find($id);
        $this->additionalNews = news::where('id', '!=', $id)
        ->latest('created_at')
        ->limit(5)
        ->get();

    }

    public function render()
    {
        return view('livewire.partials.news-detail');
    }
}