<?php

namespace App;

use App\Events\TxCreatedEvent;
use Illuminate\Database\Eloquent\Model;

class Tx extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'txs';

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => TxCreatedEvent::class,
    ];

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
       'confirmed_at',
    ];

    /**
     * The attributes that are dates.
     *
     * @var array
     */
    protected $dates = [
        'confirmed_at',
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

    /**
     * First or Create Tx
     *
     * @param  array  $data
     * @return \App\Tx
     */
    public static function firstOrCreateTx($data)
    {
        return static::firstOrCreate([
            'tx_hash' => $data['tx_hash'],
        ],[
            'tx_index' => $data['tx_index'],
            'status' => $data['status'],
            'block_index' => $data['block_index'],
            'source' => $data['source'],
            'destination' => $data['destination'],
            'asset' => $data['asset'],
            'quantity' => $data['quantity'],
            'memo' => $data['memo'],
            'memo_hex' => $data['memo_hex'],
        ]);
    }
}