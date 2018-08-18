<?php

namespace App;

use App\Events\PledgeCreatedEvent;
use Illuminate\Database\Eloquent\Model;

class Pledge extends Model
{
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => PledgeCreatedEvent::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cause_id',
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
        return normalizeQuantity($this->amount, $this->cause->asset->divisible);
    }

    /**
     * Pledge Cause
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cause()
    {
        return $this->belongsTo(Cause::class);
    }

    /**
     * Pledge Tx
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tx()
    {
        return $this->belongsTo(Tx::class);
    }

    /**
     * First or Create Pledge
     *
     * @param  \App\Cause  $cause
     * @param  \App\Tx  $tx
     * @param  array  $data
     * @return \App\Pledge
     */
    public static function firstOrCreatePledge($cause, $tx, $data)
    {
        return static::firstOrCreate([
            'cause_id' => $cause->id,
            'tx_id' => $tx->id,
        ],[
            'address' => $data['source'],
            'amount' => $data['quantity'],
        ]);
    }
}