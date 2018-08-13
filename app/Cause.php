<?php

namespace App;

use Carbon\Carbon;
use App\Traits\Touchable;
use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    use Touchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'asset_id',
        'user_id',
        'tx_id',
        'title',
        'subtitle',
        'content',
        'image_url',
        'address',
        'memo',
        'target',
        'pledged',
        'released',
        'ended_at',
        'approved_at',
        'released_at',
    ];

    /**
     * The attributes that are dates.
     *
     * @var array
     */
    protected $dates = [
        'ended_at',
        'approved_at',
        'released_at',
    ];

    /**
     * The attributes that are appended.
     *
     * @var array
     */
    protected $appends = [
        'name',
        'days_left',
        'progress',
    ];

    /**
     * Cause Name
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return "{$this->title}: {$this->subtitle}";
    }

    /**
     * Days Left
     *
     * @return string
     */
    public function getDaysLeftAttribute()
    {
        return $this->ended_at->diffInDays(Carbon::now());
    }

    /**
     * Progress %
     *
     * @return string
     */
    public function getProgressAttribute()
    {
        return number_format($this->pledged / $this->target * 100, 0);
    }

    /**
     * Cause Asset
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    /**
     * Cause Pledges
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pledges()
    {
        return $this->hasMany(Pledge::class);
    }

    /**
     * Cause Tx
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tx()
    {
        return $this->belongsTo(Tx::class);
    }

    /**
     * Cause User
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Approved Causes
     */
    public function scopeApproved($query)
    {
        return $query->whereNotNull('approved_at');
    }

    /**
     * Pending Approval
     */
    public function scopePendingApproval($query)
    {
        return $query->whereNull('approved_at');
    }

    /**
     * Active Causes
     */
    public function scopeActive($query)
    {
        return $query->approved()->where('ended_at', '>=', Carbon::now()->toDateString());
    }

    /**
     * Ended Causes
     */
    public function scopeEnded($query)
    {
        return $query->approved()->where('ended_at', '<', Carbon::now()->toDateString());
    }

    /**
     * Funded Causes
     */
    public function scopeFunded($query)
    {
        return $query->approved()->whereNotNull('released_at');
    }

    /**
     * Popular Causes
     */
    public function scopePopular($query)
    {
        return $query->approved()->withCount('pledges')->orderBy('pledges_count', 'desc');
    }
}