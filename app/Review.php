<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends BaseModel
{
    protected $fillable = ['body', 'application_id', 'rate'];
}
