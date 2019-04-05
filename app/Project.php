<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
       'user_id', 'name', 'description', 'secret_key', 'default_theme_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function team_members()
    {
        return $this->hasMany(User::class);
    }

    public function themes()
    {
        return $this->hasMany(Theme::class);
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
