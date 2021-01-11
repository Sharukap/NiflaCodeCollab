<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crime_report extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by_user_id',
        'crime_type_id',
        'description',
        'action_taken',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    

    
    
    public function Crime_type()
    {
        return $this->belongsTo('App\Models\Crime_type');
    }

    public function Taken_action()
    {
        return $this->belongsTo('App\Models\Taken_action');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}