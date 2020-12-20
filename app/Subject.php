<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasManyThread;

class Subject extends Model
{
    use HasManyThread;
}
