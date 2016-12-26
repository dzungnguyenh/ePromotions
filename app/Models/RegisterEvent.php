<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class RegisterEvent extends Model
{
    /**
     * The table register event with the model.
     *
     * @var string
     */
    protected $table = 'register_events';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'user_id',
        'event_id',
    ];

    /**
     * Create relationship to model Event
     *
     * @return Relationship
     */
    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }
}
