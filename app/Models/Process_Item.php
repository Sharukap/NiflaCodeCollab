<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process_Item extends Model
{
    use HasFactory;
    protected $table = 'process_items';

    protected $fillable = [
        'form_type_id',
        'form_id',
        'requst_organization',
        'activity_organization',
        'activity_user_id',
        'remark',
        'prerequisite',
        'prerequsite_id',
        'created_by_user_id',
        'status_id',
    ];

    protected $attributes = [
        'prerequisite' => 0,
        'remark' => 0,
        'status_id' => 1,
        'requst_organization' => 0,
    ];

    public function form_type()
    {
        return $this->belongsTo('App\Models\Form_Type');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function prerequsite_id()
    {
        return $this->belongsTo('App\Models\Process_Item');
    }

    public function activity_organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }

    public function activity_user_id()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function requst_organization()
    {
        return $this->belongsTo('App\Models\Organization','id');
    }

    public function created_by_user_id()
    {
        return $this->belongsTo('App\Models\User');
    }
}
