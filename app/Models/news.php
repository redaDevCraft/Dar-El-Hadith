<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'images',
        'user_id',
        'views',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

        public function incrementViewCount()
    {
        $this->increment('views');
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
    
}