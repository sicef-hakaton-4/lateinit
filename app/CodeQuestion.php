<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeQuestion extends BaseModel
{
    protected $hidden = ['test_id'];

    protected $fillable = ['task'];
}
