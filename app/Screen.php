<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    protected $fillable = [
        'project_id', 'theme_id', 'name'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
