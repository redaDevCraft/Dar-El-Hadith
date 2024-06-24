<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\news;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;


class Home extends Component
{
    use WithPagination;

    public $news;
    public $featuredNews;
    public $page = 1; // Track the current page
    public $currentSlide = 0;
    public $prayerTimes;
    public $currentDate;
    public $hijriDate;
    public $prayerLabels= [
            'Fajr' => 'الفجر',
            'Dhuhr' => 'الظهر',
            'Asr' => 'العصر',
            'Maghrib' => 'المغرب',
            'Isha' => 'العشاء',
            'Imsak' => 'الإمساك',
            'Sunrise' => 'الشروق',
            'Sunset' => 'الغروب',
            'Midnight' => 'منتصف الليل',
            'Firstthird' => 'الثلث الأول',
            'Lastthird' => 'الثلث الأخير',

        ];



    public function mount()
    {
        $this->news = collect(); 
        $this->featuredNews = news::latest()->take(3)->get(); // Fetch 3 latest items
        $this->currentDate = Carbon::now()->format('d-m-Y');
        $this->fetchPrayerTimes();
        $this->hijriDate = $this->getHijriDate($this->currentDate);
        $this->prayerLabels;
        $this->loadMore(); // Load the initial set of news items

    }

     public function getHijriDate($date)
    {
        $response = Http::get("http://api.aladhan.com/v1/gToH/{$date}");
        if ($response->successful()) {
            $hijri = $response['data']['hijri'];
            $hijriDate = Carbon::createFromFormat('d-m-Y', "{$hijri['day']}-{$hijri['month']['number']}-{$hijri['year']}");
            $hijriDate->addDays(1);
            return $hijriDate->format('d-m-Y') . " {$hijri['month']['ar']}";
        }
        return null;
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

      public function fetchPrayerTimes()
    {
        $currentDate = Carbon::now();
        $month = $currentDate->month;
        $day = $currentDate->day;
        $year = $currentDate->year;

        $response = Http::get('http://api.aladhan.com/v1/calendarByCity', [
            'city' => 'Tlemcen',
            'country' => 'Algeria',
            'method' => 19,
            'month' => $month,
            'year' => $year
        ]);

        if ($response->successful()) {
            $data = $response->json()['data'];
            $this->prayerTimes = collect($data)->firstWhere('date.gregorian.day', $day);
        } else {
            $this->prayerTimes = null;
        }
    }
    
      public function loadMore()
    {
        $newsItems = news::latest()->inRandomOrder()
        ->paginate(4, ['*'], 'page', $this->page); // Fetch 5 latest items per page
        $this->news = $this->news->concat($newsItems->items()); // Concatenate new items
        $this->page++; 
    }

    public function render()
    {
        return view('livewire.home');
    }
}