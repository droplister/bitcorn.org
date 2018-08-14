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
     * The attributes that are appended.
     *
     * @var array
     */
    protected $appends = [
        'issuance_normalized',
    ];

    /**
     * Issuance Normalized
     *
     * @return string
     */
    public function getIssuanceNormalizedAttribute()
    {
        return normalizeQuantity($this->issuance, $this->divisible);
    }

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