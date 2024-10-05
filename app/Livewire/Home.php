<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\news;
use App\Models\Video;
use Carbon\Carbon;

class Home extends Component
{
    use WithPagination;

    public $news;
    public $videos;
    public $hasMoreNews = true;
    public $hasMoreVideos = true;
    public $featuredNews;
    public $page = 1; // Track the current page
    public $currentSlide = 0;
    public $currentDate;

    public function mount()
    {
        $this->news = collect();
        $this->featuredNews = News::latest()->take(3)->get(); // Fetch 3 latest items
        $this->currentDate = Carbon::now()->format('d-m-Y');
        $this->loadMore();
        $this->loadVideos();
        $this->checkIfMoreNews();
        $this->checkIfMoreVideos();
    }

    public function loadVideos()
    {
        $this->videos = Video::orderBy('created_at', 'desc')->take(1)->get();
    }

    public function loadMoreVids()
    {
        $moreVideos = Video::orderBy('created_at', 'desc')
            ->skip(count($this->videos))
            ->take(1)
            ->get();
        $this->checkIfMoreVideos();

        $this->videos = $this->videos->concat($moreVideos);
    }

    public function checkIfMoreVideos()
    {
        $this->hasMoreVideos = $this->videos->count() < Video::count();
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

    public function loadMore()
    {
        $newsItems = News::latest()->inRandomOrder()
            ->paginate(4, ['*'], 'page', $this->page);
        $this->checkIfMoreNews();
        $this->news = $this->news->concat($newsItems->items()); // Concatenate new items
        $this->page++;
    }

    public function checkIfMoreNews()
    {
        $this->hasMoreNews = $this->news->count() < News::count();
    }

    public function incrementViews($newsId)
    {
        // Find the news article by ID
        $newsItem = News::find($newsId);

        // Check if the news item exists
        if ($newsItem) {
            // Increment the views count
            $newsItem->incrementViewCount();

            // Redirect to the news detail page (adjust the route as needed)
            return redirect()->route('news.show', ['id' => $newsItem->id]);
        }
    }

    public function render()
    {
        return view('livewire.home');
    }
}