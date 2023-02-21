<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        
        'event_organizer_id',
        'category_id',
        'title',
        'slug',
        'image',
        'tags',
        'city',
        'location',
        'link',
        'start_datetime',
        'end_datetime',
        'time_zone',
        'language',
        'description',
    ];
}
