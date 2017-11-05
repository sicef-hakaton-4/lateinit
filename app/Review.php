<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends BaseModel
{
    protected $fillable = ['review', 'application_id', 'rate'];
}
