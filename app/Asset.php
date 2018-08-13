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
        'name',
        'issuance',
        'divisible',
    ];

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