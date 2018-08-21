<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'image_url',
        'event_url',
        'scheduled_at',
    ];

    /**
     * The attributes that are dates.
     *
     * @var array
     */
    protected $dates = [
        'scheduled_at',
    ];

    /**
     * The attributes that are appended.
     *
     * @var array
     */
    protected $appends = [
        'day',
        'month',
        'date',
    ];

    /**
     * Event Day
     *
     * @return string
     */
    public function getDayAttribute()
    {
        return $this->scheduled_at->format('d');
    }

    /**
     * Event Month
     *
     * @return string
     */
    public function getMonthAttribute()
    {
        return $this->scheduled_at->format('M');
    }

    /**
     * Event Date
     *
     * @return string
     */
    public function getDateAttribute()
    {
        return $this->scheduled_at->format('Y/m/d');
    }

    /**
     * Upcoming Events
     */
    public function scopeUpcoming($query)
    {
        return $query->where('scheduled_at', '>', Carbon::yesterday()->toDateString())->oldest('scheduled_at');
    }
}