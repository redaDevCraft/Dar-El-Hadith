<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Models\History;
use App\Models\news;

class HistoryPage extends Component
{
    public $history;
    public $featuredNews;

    public $news;
    public function mount()
    {
        $this->history = History::all();
        $this->featuredNews = news::latest()->take(5)->get(); // Fetch 3 latest items


    }

    public function incrementViews($newsId)
    {
        $newsItem = News::find($newsId);

        if ($newsItem) {
            $newsItem->incrementViewCount();

            return redirect()->route('news.show', ['id' => $newsItem->id]);
        }
    }
   

    public function render()
    {
        return view('livewire.partials.history-page');
    }
}