<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'type', 'key', 'project_id', 'description'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function screen()
    {
        return $this->belongsTo(Screen::class);
    }
}
