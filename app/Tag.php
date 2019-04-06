<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'project_id', 'screen_id', 'theme_id', 'type', 'key', 'value', 'description'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function screen()
    {
        return $this->belongsTo(Screen::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
