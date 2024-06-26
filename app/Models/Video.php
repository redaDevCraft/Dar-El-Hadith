<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Video extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'url',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}