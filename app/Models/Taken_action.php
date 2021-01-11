<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taken_action extends Model
{
    use HasFactory;

    public function Crime_type()
    {
        return $this->belongsTo('App\Models\Crime_type');
    }
}
