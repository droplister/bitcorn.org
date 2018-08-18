<?php

namespace App;

use Cache;
use App\Traits\Touchable;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use Touchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'asset_id',
        'positions',
        'block_index',
        'decided_at',
    ];

    /**
     * The attributes that are dates.
     *
     * @var array
     */
    protected $dates = [
        'decided_at',
    ];

    /**
     * Election Asset
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    /**
     * Election Candidates
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    /**
     * Election Event
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Election Votes
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function votes()
    {
        return $this->hasManyThrough(Vote::class, Candidate::class);
    }

    /**
     * Was Elected
     * 
     * @return boolean
     */
    public function wasElected($user_id)
    {
        return $this->candidates()->elected()
            ->where('user_id', '=', $user_id)
            ->exists();        
    }

    /**
     * Active
     */
    public function scopeActive($query)
    {
        $block_index = Cache::get('block_index') - config('bitcorn.confirmations');

        return $query->whereNull('decided_at')->where('block_index', '>', $block_index);
    }

    /**
     * Undecided
     */
    public function scopeUndecided($query)
    {
        $block_index = Cache::get('block_index') - config('bitcorn.confirmations');

        return $query->whereNull('decided_at')->where('block_index', '<=', $block_index);
    }
}