<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Models\news;

class NewsDetail extends Component
{
    public $news;
    public $featuredNews;

    public function mount($id)
    {
        $this->news = news::find($id);
        $this->featuredNews = news::latest()->where('id', '!=', $id)->take(5)->get(); // Fetch 3 latest items


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
        return view('livewire.partials.news-detail');
    }
}