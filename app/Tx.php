<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tx extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'tx_index',
       'block_index',
       'tx_hash',
       'status',
       'source',
       'destination',
       'asset',
       'quantity',
       'memo',
       'memo_hex',
    ];

    /**
     * Tx Cause
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cause()
    {
        return $this->hasOne(Cause::class);
    }

    /**
     * Tx Pledge
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pledge()
    {
        return $this->hasOne(Pledge::class);
    }

    /**
     * Tx Vote
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vote()
    {
        return $this->hasOne(Vote::class);
    }

    /**
     * Pledge Txs
     */
    public function scopePledges($query)
    {
        return $query->has('pledge')->doesntHave('cause', 'vote');
    }

    /**
     * Payout Txs
     */
    public function scopePayouts($query)
    {
        return $query->has('cause')->doesntHave('pledge', 'vote');
    }

    /**
     * Pledge Txs
     */
    public function scopeVotes($query)
    {
        return $query->has('vote')->doesntHave('cause', 'pledge');
    }
}