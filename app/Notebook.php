<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];

    public function path()
    {
        return "/notebooks/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class)->orderBy('updated_at', 'desc');
    }

    public function addNote($attributes)
    {
        return $this->notes()->create($attributes);
    }
}
