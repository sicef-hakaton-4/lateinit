<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileQuestion extends BaseModel
{
    protected $hidden = ['test_id'];

    protected $fillable = ['test_id', 'task'];
}
