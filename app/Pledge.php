<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pledge extends Model
{
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
}