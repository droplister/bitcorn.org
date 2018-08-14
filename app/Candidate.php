<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'election_id',
        'user_id',
        'memo',
        'content',
        'votes_total',
        'elected',
    ];

    /**
     * The attributes that are appended.
     *
     * @var array
     */
    protected $appends = [
        'votes_total_normalized',
    ];

    /**
     * Votes Total Normalized
     *
     * @return string
     */
    public function getVotesTotalNormalizedAttribute()
    {
        return normalizeQuantity($this->votes_total, $this->election->asset->divisible);
    }

    /**
     * Candidate Election
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    /**
     * Candidate User
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Election Votes
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * Elected Candidates
     */
    public function scopeElected($query)
    {
        return $query->where('elected', '=', 1);
    }
}