<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'card',
        'approve',
        'deny',
    ];

    /**
     * User
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}