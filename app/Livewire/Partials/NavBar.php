<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;


class NavBar extends Component
{
    public $currentDate;
    public $hijriDate;
    public $prayerTimes;

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
        $this->currentDate = Carbon::now()->format('d-m-Y');
        $this->hijriDate = $this->getHijriDate($this->currentDate);
        $this->fetchPrayerTimes();
        
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
     
    public function render()
    {
        return view('livewire.partials.nav-bar');
    }
}