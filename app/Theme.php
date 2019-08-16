<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'project_id', 'name'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function screens()
    {
        return $this->hasMany(Screen::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
