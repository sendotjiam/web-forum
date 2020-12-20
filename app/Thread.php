<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'subject_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function replies() {
        return $this->hasMany(Reply::class);
    }
}
