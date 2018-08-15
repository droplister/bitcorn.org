<?php

namespace App;

use App\Election;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'location',
        'image_url',
        'twitter_url',
        'website_url',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * User Causes
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function causes()
    {
        return $this->hasMany(Cause::class);
    }

    /**
     * Is Admin
     * 
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->id === 1;
    }

    /**
     * Is Board
     * 
     * @return boolean
     */
    public function isBoard()
    {
        $last_election = Election::latest('decided_at')->first();

        return $last_election ? $last_election->candidates()->elected()->where('user_id', '=', $this->is)->exists() : false;
    }
}
