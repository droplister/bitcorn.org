<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'issuance',
        'divisible',
    ];

    /**
     * Asset Election
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function election()
    {
        return $this->hasOne(Election::class);
    }

    /**
     * Asset Causes
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function causes()
    {
        return $this->hasMany(Cause::class);
    }
}