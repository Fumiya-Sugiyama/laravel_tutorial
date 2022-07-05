<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // 自動採番
    protected $guarded = ['id'];
}
