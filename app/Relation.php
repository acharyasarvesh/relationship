<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $fillable = [
        'user_id', 'relative_id', 'relation_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function relative()
    {
        return $this->belongsTo('App\User');
    }

    public function relationship()
    {
        return $this->belongsTo('App\Relationship', 'relation_id');
    }
}
