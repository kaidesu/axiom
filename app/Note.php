<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body'];

    public function path()
    {
        return "/notebooks/{$this->notebook->id}/notes/{$this->id}";
    }

    public function notebook()
    {
        return $this->belongsTo(Notebook::class);
    }
}
