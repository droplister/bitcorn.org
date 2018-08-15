<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'candidate_id',
        'tx_id',
        'address',
        'amount',
    ];

    /**
     * The attributes that are appended.
     *
     * @var array
     */
    protected $appends = [
        'amount_normalized',
    ];

    /**
     * Amount Normalized
     *
     * @return string
     */
    public function getAmountNormalizedAttribute()
    {
        return normalizeQuantity($this->amount, $this->candidate->election->asset->divisible);
    }

    /**
     * Vote Candidate
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    /**
     * Vote Tx
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tx()
    {
        return $this->belongsTo(Tx::class);
    }

    /**
     * First or Create Vote
     *
     * @param  \App\Candidate  $candidate
     * @param  \App\Tx  $tx
     * @param  array  $data
     * @return \App\Vote
     */
    public static function firstOrCreateVote($candidate, $tx, $data)
    {
        return static::firstOrCreate([
            'candidate_id' => $candidate->id,
            'tx_id' => $tx->id,
        ],[
            'address' => $data['source'],
            'amount' => $data['quantity'],
        ]);
    }
}