<?php

namespace App\Traits;
use App\Thread;

trait HasManyThread{
    public function threads() {
        return $this->hasMany(Thread::class);
    }
}