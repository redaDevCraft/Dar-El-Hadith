<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;


class NavBar extends Component
{
    public $currentDate;
    public $hijriDate;

    public function mount()
    {
        $this->currentDate = Carbon::now()->format('d-m-Y');
        $this->hijriDate = $this->getHijriDate($this->currentDate);
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
     
    public function render()
    {
        return view('livewire.partials.nav-bar');
    }
}