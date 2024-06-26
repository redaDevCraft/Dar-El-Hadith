<?php

namespace App\Filament\Resources\VideoResource\Pages;

use App\Filament\Resources\VideoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVideo extends CreateRecord
{
    protected static string $resource = VideoResource::class;
    
        protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

     protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        if (isset($data['url'])) {
            $url = $data['url'];
            $videoId = $this->extractYouTubeVideoId($url);
            $data['url'] = $videoId;
        }

        return $data;
    }

      protected function extractYouTubeVideoId($url)
    {
        $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
        preg_match($pattern, $url, $matches);

        if (isset($matches[1])) {
            return $matches[1];
        }

        return null; 
    }

}